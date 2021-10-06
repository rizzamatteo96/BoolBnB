<template>
  <!-- <div class="container">
    <div class="row justify-content-around">
      <div class="card col-5 mb-3" v-for="apartment in apartments" :key="apartment.id"> -->
        <!-- <img src="..." class="card-img-top" alt="..."> -->
        <!-- <div class="card-body">
          <h5 class="card-title">{{apartment.title}}</h5>
          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
          <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
        </div>
      </div>
    </div>
  </div> -->
  <div>ciao</div>
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

.container{
    background-color: blue;
}

</style>