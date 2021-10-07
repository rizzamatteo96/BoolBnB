<template>
  <div class="stile-map">
        <div :id="'map'"></div>
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
      apiSecond : '.JSON?key=K3xnfxcXAODvZopP0scVRnmjNxjruLUo'
    }
  },
  mounted(){
    const apiKey = 'K3xnfxcXAODvZopP0scVRnmjNxjruLUo';
    const map = tt.map({
      key: apiKey,
      container: 'map',
      center: [4.876935, 52.360306],
      zoom: 13
    });
  },
  methods: {
    findMap(){
      let src = this.apiFirst + this.location + this.apiSecond;
      console.log(this.location);
      axios.get(src, {
        headers: {"Access-Control-Allow-Origin": "*"}
      })
          .then(response => {
            console.log(response);
          })
          .catch(e => {
            console.log(e);
          });
    }
  }
}
</script>

<style lang="scss" scoped>
  .stile-map{
    width: 500px; 
    height: 500px;

    #map{
      width: 100%;
      height: 100%;
    }
  }
</style>