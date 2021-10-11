<template>
  
    <div class="container-search">

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
            <div @click="findMap" class="btn btn-outline-light mt-3">Cerca</div>

        </div>
    
    </div>

</template>


<script>
import router from "../router";

export default {

    name: 'Search',
    data(){
        return{
            citySrc : '',
            apiFirst : 'https://api.tomtom.com/search/2/geocode/',
            apiSecond : '.JSON?key=',
            apiKey : 'K3xnfxcXAODvZopP0scVRnmjNxjruLUo',
        }
    },
    mounted(){
      this.searchBox();
    },
    methods: {
        findMap(){
            this.citySrc = document.querySelector('input.tt-search-box-input').value;
            router.push({ name: 'src', params: {slug : this.citySrc} });
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

    @import '../../sass/_variables.scss';

    @keyframes animate {

        from {
            
            height: 0px;
            width: 0%;

        }

        to {
            height: 300px;
            width: 100%;
        }

    }
    
    label {

            color:$ColorText2;
        }
        
    .container-search {
        height: 300px;
        width: 100%;
        animation: animate 1s;

        
        .container-form {
            margin: 0 auto;
            text-align: center;
            width: 90%;
            padding: 20px;
            border-radius: 20px;
            background-color: rgba(0, 0, 0, 0.39);
            

            .city {
                width: 100%;
            }

            label{
                display: block;
            }

           

            input {
                padding: 10px;
                border-radius: 20px;
                border:  none;
                display: block;
                margin: 10px auto;
                height: 40px;
            }

        }
      
    }

    // PARTE RESPONSIVE
    @media (max-width: 968px) {

        .city {
            width: 300px;
        }

        .container-form {

            width: auto;

        }

    }

</style>