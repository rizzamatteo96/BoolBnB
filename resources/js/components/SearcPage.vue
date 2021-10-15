<template>
  
    <div class="container-search">

        <div class="container-form">
            
            <label class="title-search" for="">Dove</label>

            <div id="search-field"></div>

            <!-- Inizio Filtri -->
            <div class="container-filter">

                <div class="filter">

                    <label class="title-filter" for="">Numero di stanze</label>

                    <button class="button-filter" @click="rooms!=0 ? rooms-- : '' ">-</button>

                    <span class="number-range" v-text="rooms"></span>

                    <button class="button-filter" @click="rooms++">+</button>

                </div>

                
                <div class="filter">
                
                    <label class="title-filter" for="">Numero posti letto</label>
                
                    <button class="button-filter" @click="beds!=0 ? beds-- : '' ">-</button>
                
                    <span class="number-range" v-text="beds"></span>
                
                    <button class="button-filter" @click="beds++">+</button>
                
                </div>

                
                <div class="filter">
                
                    <label class="title-filter" for="radius">Raggio di default </label>
                
                    <input class="filter-range" id="radius" type="range" min="0" max="50" step="1" value="0" v-model="distance">
                
                    <span v-text="distance"></span>
                
                    <label for="">Km</label>
                
                </div>

            </div>

            <div class="container-services">
                

                <ul v-for="service in services" :key="service.id">
                
                    <li>
                
                        <input type="checkbox" @click="servicesCheck(service.id)" :id="service.slug" :value="service.id">
                
                        <label :for="service.slug">{{service.name}}</label>
                
                    </li>
                
                </ul>

            </div>
            <!-- Fine Filtri -->

            <!-- <label for="">Check-in</label>
            <input type="date">

            <label for="">Check-out</label>
            <input type="date">

            <label for="">Adulti</label>
            <input type="number"> -->

            <!-- <button type="button" class="btn btn-outline-light">Cerca</button> -->
            <!-- <router-link :to="{ name: 'src', params: {slug : citySrc} }" class="btn btn-outline-light">Cerca</router-link> -->
            <div @click="loadCoordinate" class="btn mt-3 btn-outline-light">Cerca</div>


        </div>
        
        <h2 class="title-search">Appartamenti nella zona di: </h2>

        <div class="box-container row">

            <div class="col-4 p-4" v-for="apartment in apartments" :key="apartment.id">
                <div class="box m-auto">

                    <img class="container-box--img" :src="apartment.image" alt="">

                    <div class="container-description">

                        <h2 class="container-description--title">{{apartment.title}}</h2>

                        <p class="container-description--price">Prezzo: {{apartment.daily_price}} €</p>
                        <p class="container-description--price">Citta: {{apartment.city}}</p>
                        <p class="container-box--adress">Indirizzo: {{apartment.address}}, {{apartment.house_num}}</p>

                    </div>

                    <router-link :to="{ name: 'apartment-details', params: {slug : apartment.slug} }" class="btn btn-outline-light">Visualizza dettagli</router-link>

                </div>
            </div>


            <div class="col-4" v-if="(apartments.length % 2) == 0"></div>
            <div class="col-4" v-if="(apartments.length % 2) == 0"></div>


        </div>



    </div>

</template>

<script>

    import router from "../router";

    export default {

        name: 'SearcPage',

        data(){

            return{
                distance : 5,
                beds : 0,
                rooms : 0,
                servicesList : '',
                apiUrl : 'http://localhost:8000/api/apartments/',
                apiServices : 'http://localhost:8000/api/apartments/services',
                apartments : [],
                services : [],
                citySrc : '',
                filters : '',
                servicesFilters : [],
                apiKey : 'K3xnfxcXAODvZopP0scVRnmjNxjruLUo',
                apiFirst : 'https://api.tomtom.com/search/2/geocode/',
                apiSecond : '.JSON?key=',
            }

        },

        mounted(){

            this.searchBox();
            this.chiamataApi();

        },

        methods: {

            chiamataApi(){
                // prepare services list
                this.servicesList = '';
                if(this.servicesFilters){
                    this.servicesFilters.forEach((item) => {
                        this.servicesList += item + ',';
                    });

                    this.servicesList = this.servicesList.substring(',', this.servicesList.length - 1);
                }

                // prepare filter before call the apartments api
                this.filters = 'beds=' + this.beds +  ';rooms=' + this.rooms + ';distance=' + this.distance + ';services=' + this.servicesList;

                // Api to get apartments from DB
                axios.get(this.apiUrl + this.$route.params.slug + '&&' + this.filters)
                .then(response => {
                    console.log(response);
                    this.apartments = response.data.results;
                })
                .catch(e => {
                    console.log(e);
                });

                // Api to get services from DB
                axios.get(this.apiServices)
                .then(response => {
                    // console.log(response.data.results);
                    this.services = response.data.results;
                })
                .catch(e => {
                    console.log(e);
                });

            },

            searchBox(){
                var options = {
                    searchOptions: {
                        key: this.apiKey,
                        language: 'it-IT',
                        limit: 5
                    },
                    autocompleteOptions: {
                        key: this.apiKey,
                        language: 'it-IT'
                    }
                };
                var ttSearchBox = new tt.plugins.SearchBox(tt.services, options);
                var searchBoxHTML = ttSearchBox.getSearchBoxHTML();
                document.getElementById('search-field').append(searchBoxHTML);
            },

            loadCoordinate(){
                var srcLoc = document.querySelector('input.tt-search-box-input').value;
                console.log(srcLoc);
                let src = this.apiFirst + srcLoc + this.apiSecond + this.apiKey;
                // console.log(srcLoc);

                axios.get(src)

                    .then(response => {
                        this.lat = response.data.results[0].position.lat;
                        this.lon = response.data.results[0].position.lon;
                        this.citySrc = '';
                        this.citySrc = this.lat + ',' + this.lon;
                        this.citySrc = this.citySrc.replaceAll('.', '_');
                    })
                    .catch(e => {
                        console.log(e);
                    })
                    .finally(() => {
                        console.log(this.citySrc);
                        router.push({ name: 'src', params: {slug : this.citySrc} });
                        this.chiamataApi();
                    });
            },

            servicesCheck(serviceToSave){

                if(!this.servicesFilters.includes(serviceToSave)){
                    // save it if it was not present
                    this.servicesFilters.push(serviceToSave);
                } else {
                    // delete it if it was already present
                    const index = this.servicesFilters.indexOf(serviceToSave);
                    this.servicesFilters.splice(index, 1);
                }

                console.log(this.servicesFilters);
            }
        }

    }
        
</script>

<style lang="scss" scoped>

    .container-search {
        color: white;
        width: 90%;
        margin: 0px auto 70px;
        padding-top: 100px;

        .title-search {
            text-align: center;
            margin-top: 50px;
            text-transform: uppercase;
        }

        .box-container {
            display: flex;
            justify-content: space-between;
            // flex-wrap: wrap;
            width: 100%;
            margin: 0 auto;   
        
            .box {
                padding: 10px;
                // width: 400px;
                box-shadow: rgba(0, 0, 0, 0.178) 1.5px 3px 3px 1.5px;
                margin: 20px 0px;
                border-radius: 20px;
                text-align: center;
                min-height: 650px;

                .container-box--img {
                    width: 100%;
                    height: 250px;
                    border-radius: 10px;
                    box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
                }

                .container-description {
                    display: block;
                    text-align: center;
                    margin-top: 20px;
                    word-wrap: break-word;

                }
            }

        } 
        .container-form {
            background-color: rgba(0, 0, 0, 0.267);
            height: 100%;
            width: 100%; 
            padding: 20px;
            border-radius: 20px; 
            text-align: center;  

            .container-filter {
                margin-top: 20px;
                display: flex;
                justify-content: space-around;

                .filter {

                    .title-filter {
                        display: block;
                    }

                    input{
                        width: 47px;
                        height: 30px;
                        border-radius: 10px;
                        padding: 5px;
                        border: none;
                    }
                    
                    .number-range {
                        margin: 0px 20px;
                    }

                    .button-filter {
                        border-radius: 20%;
                        padding: 5px 10px;
                        border: none;
                    }

                    .filter-range {
                        line-height: middle;
                        width: 90px;
                        height: 20px;
                        vertical-align: middle;
                        margin: 0px 10px;
                    }

                }

            }

            .container-services {
                margin-top: 30px;
                display: flex;
                //justify-content: start;
                flex-flow: wrap;

                ul {
                    list-style: none;

                    li {
                        margin: 0px 20px;
                    }

                }

            }

            .title-search {
                text-transform: uppercase;
                font-size: 30px;

            }
            
        }

    }

    // PARTE RESPONSIVE
    @media (max-width: 968px) {

        .container-search {
            padding-top: 150px;

            .container-form {

                .container-filter {
                    display: block;

                    .filter {
                        margin: 20px 0px;
                    }
                }

            }

            .box-container {
                width: 90%;

                .box {
                    word-wrap: break-word;
                    width: 100%;

                }
            }

        }

            
        
        


    }

</style>