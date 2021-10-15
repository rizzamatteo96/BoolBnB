<template>
  <div class="stile-map">
        <div :id="'map'"></div>
        <div id="test"></div>
        <input type="text" v-model="location">
        <a @click="findMap" class="btn btn-primary">cerca mappa</a>
    </div>
</template>

<script>
export default {
  name: 'Mappe',
  data(){
    return {
      location : '',
      apiFirst : 'https://api.tomtom.com/search/2/geocode/',
      apiSecond : '.JSON?key=',
      apiKey : 'K3xnfxcXAODvZopP0scVRnmjNxjruLUo',
      lat : '52.360306',
      lon : '4.876935'
    }
  },
  mounted(){
    this.loadMap();
    this.searchBox();
  },
  methods: {
    findMap(){
      var search = document.querySelector('input.tt-search-box-input').value;
      let src = this.apiFirst + search + this.apiSecond + this.apiKey;
      // console.log(search);

      axios.get(src)
          .then(response => {
            console.log(response.data.results[0].position.lat);
            this.lat = response.data.results[0].position.lat;
            this.lon = response.data.results[0].position.lon;
            // console.log(this.lat, this.lon);
          })
          .catch(e => {
            console.log(e);
          })
          .finally(this.loadMap(this.lat, this.lon));
    },
    loadMap(){
      setTimeout(() => {
        const map = tt.map({
          key: this.apiKey,
          container: 'map',
          center: [this.lon, this.lat],
          zoom: 18
        });
      }, 1000);      
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
        document.getElementById('test').append(searchBoxHTML);
        document.querySelector('input.tt-search-box-input').name = 'address';
        document.querySelector('input.tt-search-box-input').id = 'search-input-for-coordinates';
        document.querySelector('input.tt-search-box-input').placeholder = 'Indirizzo';
    }
  }
}
</script>

<style lang="scss" scoped>
  .stile-map{
    margin-top: 100px;
    width: 500px; 
    height: 500px;

    #map{
      width: 100%;
      height: 100%;
    }
  }
</style>