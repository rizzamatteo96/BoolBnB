<template>
  
    <div class="container-search">

        <div class="container-form">
            
            <label class="title-search" for="">Dove</label>
            <div id="search-field"></div>
            <!-- <input class="city" type="text" placeholder="Scrivi la citta" v-model="citySrc"> -->

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
                    <label class="title-filter" for="">Raggio di default </label>
                    <input class="filter-range" type="range" min="0" max="100" step="1" value="0" v-model="value">
                    <span v-text="value"></span>
                    <label for="">Km</label>
                </div>

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
            <div @click="findMap" class="btn mt-3 btn-outline-light">Cerca</div>


        </div>
        
        <h2 class="title-serach">Appartamenti nella zona di: </h2>

        <div class="box-container" >

            <div class="box" v-for="apartment in apartments" :key="apartment.id">

                <img class="container-box--img" :src="apartment.image" alt="">

                <div class="container-description" >

                    <h2 class="container-description--title"> Titolo {{apartment.title}}</h2>

                    <p class="container-description--price">Prezzo: {{apartment.daily_price}} €</p>
                    <p class="container-description--price">citta: {{apartment.city}}</p>
                    <p class="container-box--adress">Via: {{apartment.address}}, {{apartment.house_num}}</p>

                </div>


            </div>

           
        </div>

    </div>

</template>

<script>
import router from "../router";

    export default {

        name: 'SearcPage',

        data(){

            return{
                value: 0,
                beds: 0,
                rooms: 0,
                apiUrl: 'http://localhost:8000/api/apartments/',
                apartments: [],
                citySrc : '',
                apiKey : 'K3xnfxcXAODvZopP0scVRnmjNxjruLUo',
            }
        },

        mounted(){

            this.searchBox();
            this.chiamataApi();

        },

        methods: {
            chiamataApi(){
                axios.get(this.apiUrl + this.$route.params.slug)
                .then(response => {
                    this.apartments = response.data.results;
                })
                .catch();
            },
            findMap(){
                this.apartments = [];
                this.citySrc = '';
                this.citySrc = document.querySelector('input.tt-search-box-input').value;
                router.push({ name: 'src', params: {slug : this.citySrc} });
                this.chiamataApi();
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

        .title-serach {
            text-align: center;
            margin-top: 50px;
            text-transform: uppercase;

        }

        .box-container {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            width: 100%;
            margin: 0 auto;
        }
        
        .box {
            padding: 50px;
            width: 400px;
            box-shadow: rgba(0, 0, 0, 0.178) 1.5px 3px 3px 1.5px;
            margin: 20px 0px;
            border-radius: 20px;

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
            .title-search {

                text-transform: uppercase;
                font-size: 30px;

            }
        }

    }

</style>