<template>
  
    <div class="container">

        <div class="container-form">
            
            <label for="">Dove</label>
            <div id="search-field"></div>
            <!-- <input class="city" type="text" placeholder="Scrivi la citta" v-model="citySrc"> -->


            <!-- <label for="">Check-in</label>
            <input type="date">

            <label for="">Check-out</label>
            <input type="date">

            <label for="">Adulti</label>
            <input type="number"> -->

            <!-- <button type="button" class="btn btn-outline-light">Cerca</button> -->
            <!-- <router-link :to="{ name: 'src', params: {slug : citySrc} }" class="btn btn-outline-light">Cerca</router-link> -->
            <div @click="findMap" class="btn btn-outline-light">Cerca</div>


        </div>
        
        <h2>Appartamenti nella zona di: </h2>

        <div class="box-container" v-for="apartment in apartments" :key="apartment.id">

            <div class="box">

                <img class="container-box--img" :src="apartment.image" alt="">

                <div class="container-description" >

                    <h2 class="container-description--title"> Titolo {{apartment.title}}</h2>

                    <span class="container-description--price">Prezzo: {{apartment.daily_price}} €</span>
                    <span class="container-description--price">citta: {{apartment.city}}</span>

                </div>

                <span class="container-box--adress">Via: {{apartment.address}}, {{apartment.house_num}}</span>

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

    .container {

        padding-top: 100px;

        .box-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;

        }
        
        .box {
            padding: 50px;
            width: 400px;
            .container-box--img {
                width: 100%;
                height: 250px;
                border-radius: 10px;
                box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;

            }

            .container-description {
                display: flex;
                align-items: center;
                justify-content: space-around;

            }

        } 

    }

</style>