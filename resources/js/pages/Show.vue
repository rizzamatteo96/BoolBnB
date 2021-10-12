<template>
  <div class="container">
    <div class="card">
      <div class="card-header fs-1">
        {{apartment.title}}
      </div>
      <div class="card-body">
        <p class="card-text">{{apartment.description}}</p>
        <p class="card-text">{{apartment.city}}</p>
        <p class="card-text">{{apartment.address}}</p>
      </div>
    </div>
    <Contacts />
  </div>
</template>

<script>

  import Contacts from '../components/Contacts';

export default {
  name: 'show',
  components: {
    Contacts
  },
  data(){
    return{
      apiUrl: 'http://localhost:8000/api/apartment/',
      apartment: []
    }
  },
  mounted(){
    axios.get(this.apiUrl + this.$route.params.slug)
          .then(response => {
            // console.log(response.data.results);
            this.apartment = response.data.results;
            // console.log(response.data.results);
          })
          .catch();
  }
}

</script>

<style>

</style>