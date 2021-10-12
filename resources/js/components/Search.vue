<template>
  
    <div class="container-search">

        <div class="container-form">
            
            <label for="">Dove</label>

            <div id="search-field"></div>

            <div @click="loadCoordinate" class="btn btn-outline-light mt-3">Cerca</div>

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

        loadCoordinate(){
            var srcLoc = document.querySelector('input.tt-search-box-input').value;
            let src = this.apiFirst + srcLoc + this.apiSecond + this.apiKey;
            console.log(srcLoc);

            axios.get(src)
                .then(response => {
                    // console.log(response.data.results[0].position.lat);
                    this.lat = response.data.results[0].position.lat;
                    this.lon = response.data.results[0].position.lon;
                    this.citySrc = '';
                    this.citySrc = this.lat + ',' + this.lon;
                    this.citySrc = this.citySrc.replaceAll('.', '_');
                    console.log(this.citySrc);
                    console.log(this.lat, this.lon);
                })
                .catch(e => {
                    console.log(e);
                })
                .finally(() => {
                    router.push({ name: 'src', params: {slug : this.citySrc} });
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