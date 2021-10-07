<template>
  <div class="container mt-5">
  <h1>ciao sono home</h1>
    <div class="row justify-content-around">
      <div class="card col-5 mb-3" v-for="apartment in apartments" :key="apartment.id">
        <!-- <img src="..." class="card-img-top" alt="..."> -->
        <div class="card-body">
          <h5 class="card-title">{{apartment.title}}</h5>
          <p class="card-text">{{apartment.city}}</p>
          <router-link :to="{ name: 'apartment-details', params: {slug : apartment.slug} }" class="btn btn-primary">Visualizza dettagli</router-link>             
        </div>
      </div>
      <router-link :to="{name: 'mappe'}" class="btn btn-primary">Visualizza mappa</router-link>             
    </div>
  </div>
</template>

<script>
export default {
    name: 'Home',
      data(){
        return {
        apiUrl: 'http://localhost:8000/api/apartments',
        apartments: []
        }
    },
    created(){
        this.chiamataApi();
    },
    methods: {
        chiamataApi(){
        axios.get(this.apiUrl)
             .then(response => {
              console.log(response.data.results);
              this.apartments = response.data.results;
            })
             .catch(e => {
              console.log(e);
            });
    }
  }
}
</script>

<style scoped lang="scss">

</style>