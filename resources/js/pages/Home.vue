<template>
  <div class="container-home">

    <Jumbotron/>
    <Sponsor/>
    <Banner/>

    <!-- <div class="row justify-content-around">
      <div class="card col-5 mb-3" v-for="apartment in apartments" :key="apartment.id">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">{{apartment.title}}</h5>
          <p class="card-text">{{apartment.city}}</p>
          <router-link :to="{ name: 'apartment-details', params: {slug : apartment.slug} }" class="btn btn-primary">Visualizza dettagli</router-link>             
        </div>
      </div>
    </div> -->
  </div>
</template>

<script>

  import Jumbotron from '../components/Jumbotron';
  import Sponsor from '../components/Sponsor';
  import Banner from '../components/Banner';


  export default {

      name: 'Home',

      components: {

        Jumbotron,
        Sponsor,
        Banner

      },
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
                // console.log(response.data.results);
                this.apartments = response.data.results;
              })
              .catch(e => {
                console.log(e);
              });
          },
    }
  }
</script>

<style scoped lang="scss">

</style>