<template>
  
    <div class="container-search">

        <div class="container-form">
            
            <label class="title-search" for="search-input-for-coordinates">Dove</label>

            <div id="search-field"></div>
            
            <!-- add filters button -->
            <button class="btn mt-3 btn-outline-light" @click="viewFilters = !viewFilters">
                Visualizza filtri
                <i class="fas fa-chevron-right ml-1" :class="viewFilters ? 'd-none' : 'd-inline-block'"></i>
                <i class="fas fa-chevron-down ml-1" :class="viewFilters ? 'd-inline-block' : 'd-none'"></i>
            </button>

            <!-- Inizio Filtri -->
            <div class="container-filter" :class="viewFilters ? 'ms_d-flex' : 'd-none'">

                <div class="filter">

                    <label class="title-filter" for="">Numero di stanze</label>

                    <button class="button-filter" @click="rooms!=0 ? rooms-- : '' ">-</button>

                    <output class="number-range" v-text="rooms"></output>

                    <button class="button-filter" @click="rooms++">+</button>

                </div>

                
                <div class="filter">
                
                    <label class="title-filter" for="">Numero posti letto</label>
                
                    <button class="button-filter" @click="beds!=0 ? beds-- : '' ">-</button>
                
                    <output class="number-range" v-text="beds"></output>
                
                    <button class="button-filter" @click="beds++">+</button>
                
                </div>

                
                <div class="filter">
                
                    <label class="title-filter" for="radius">
                        Raggio: 
                        <output class="number-distance" v-text="distance"></output>
                        Km
                    </label>
                
                    <input class="filter-range" id="radius" type="range" min="1" max="25" step="1" v-model="distance">
                
                </div>

            </div>

            <div class="container-services container" :class="viewFilters ? 'ms_d-flex' : 'd-none'">
                
                <div class="row">
                    <div class="col-12 col-md-4 col-lg-3 text-left" v-for="service in services" :key="service.id">
                    
                        <input type="checkbox" @click="servicesCheck(service.id)" :id="service.slug" :value="service.id">
                
                        <label :for="service.slug">{{service.name}}</label>
                    
                    </div>
                </div>

            </div>
            <!-- Fine Filtri -->

            <!-- <label for="">Check-in</label>
            <input type="date">

            <label for="">Check-out</label>
            <input type="date">

            <label for="">Adulti</label>
            <input type="number"> -->

            <div @click="loadCoordinate" class="btn mt-3 btn-outline-light">Cerca</div>


        </div>
        
        <h2 class="title-search">Appartamenti nella zona di: </h2>

        <div class="box-container row" v-if="!loading">

            <div class="col-12 col-md-6 col-lg-4 p-4" v-for="apartment in apartments" :key="apartment.id">
                <div class="box">

                    <div class="container-box--img">
                        <img :src="apartment.image" :alt="apartment.title">
                    </div>

                    <div class="container-description">

                        <h2 class="container-description--title">{{apartment.title}}</h2>

                        <!-- <p class="container-description--price">Prezzo: {{apartment.daily_price}} €</p> -->
                        <p class="container-description--price">Citta: {{apartment.city}}</p>
                        <p class="container-box--address">Indirizzo: {{apartment.address}}, {{apartment.house_num}}</p>

                    </div>

                    <router-link :to="{ name: 'apartment-details', params: {slug : apartment.slug} }" @click.native="scrollToTop()" class="btn btn-outline-light">Visualizza dettagli</router-link>

                </div>
            </div>


            <div class="col-4" v-if="(apartments.length % 2) == 0"></div>
            <div class="col-4" v-if="(apartments.length % 2) == 0"></div>


        </div>

        <div class="text-center mt-5" v-else>
            <!-- <div class="spinner-grow" role="status">
                <span class="sr-only">Loading...</span>
            </div> -->

            <img class="loading-logo" src="/img/boolbeb-white.png" alt="BoolBnb">


        </div>



    </div>

</template>

<script>

    import router from "../router";

    export default {

        name: 'SearcPage',

        data(){

            return{
                distance : 25,
                beds : 1,
                rooms : 1,
                servicesList : '',
                apiUrl : 'http://localhost:8000/api/apartments/',
                apiServices : 'http://localhost:8000/api/apartments/services',
                apartments : [],
                services : [],
                citySrc : '',
                filters : '',
                servicesFilters : [],
                oldInput: '',
                apiKey : 'K3xnfxcXAODvZopP0scVRnmjNxjruLUo',
                apiFirst : 'https://api.tomtom.com/search/2/geocode/',
                apiSecond : '.JSON?key=',
                apiThird : 'https://api.tomtom.com/search/2/reverseGeocode/',
                loading : true,
                viewFilters : false
            }

        },

        mounted(){

            this.chiamataApi();
            this.getOldSearchInput();

        },

        methods: {
            
            getOldSearchInput(){
                let coordinates = this.$route.params.slug;
                coordinates = coordinates.replaceAll('_', '.');
                // console.log(coordinates);
                let oldSrc = this.apiThird + coordinates + this.apiSecond + this.apiKey;
                // console.log(oldSrc);
                axios.get(oldSrc)
                .then(response => {
                    // console.log(response.data.addresses[0].address.municipality);
                    this.oldInput = response.data.addresses[0].address.municipality;
                    // console.log(this.oldInput);
                    this.searchBox();
                })
                .catch(e => {
                    console.log(e);
                })
            },
          
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
                    // console.log(response);
                    this.apartments = response.data.results;
                    this.loading = false;
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
                document.querySelector('input.tt-search-box-input').name = 'address';
                document.querySelector('input.tt-search-box-input').id = 'search-input-for-coordinates';
                document.querySelector('input.tt-search-box-input').value = this.oldInput;
                // console.log(this.oldInput);

            },

            loadCoordinate(){
                var srcLoc = document.querySelector('input.tt-search-box-input').value;
                // console.log(srcLoc);
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

                // console.log(this.servicesFilters);
            },
            scrollToTop() {
                window.scrollTo(0,0);
            }
        }
    }
        
</script>

<style lang="scss" scoped>

    .ms_d-flex{
        display: flex;
    }

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
                height: 100%;
                // width: 400px;
                box-shadow: rgba(0, 0, 0, 0.178) 1.5px 3px 3px 1.5px;
                margin: 20px 0px;
                border-radius: 20px;
                text-align: center;
                // min-height: 650px;

                .container-box--img {
                    width: 100%;
                    height: 250px;
                    line-height: 250px;
                    // height: 30%;
                    // border-radius: 10px;

                    img {
                        max-height: 250px;
                        width: 100%;
                        border-radius: 10px;
                        box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
                        vertical-align: middle;
                    }
                }

                .container-description {
                    display: block;
                    // height: calc(100% - 30%);
                    text-align: center;
                    margin-top: 20px;
                    // word-wrap: break-word;
                    
                    .container-description--title{
                        height: 70px;
                        display: -webkit-box;
                        -webkit-box-orient: vertical;
                        -webkit-line-clamp: 2;
                        white-space: normal;
                        overflow: hidden;
                        text-overflow: ellipsis;
                    }
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

                    width: calc(100% / 3);

                    .title-filter {
                        display: block;
                        // position: fixed;
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
                        width: 20px;
                    }

                    .number-distance {
                        width: 20px;
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

    .loading-logo{
        height: 50px;
        animation: logoLoading 1s infinite;
    }

    @keyframes logoLoading {
        0% {transform: scale(1);}
        50% {transform: scale(2);}
        100% {transform: scale(1);}
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
                        width: 100%;
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