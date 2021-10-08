<template>
  <h2>src</h2>
</template>

<script>
export default {
  name: 'Src',
  data(){
    return{
      apiUrl: 'http://localhost:8000/api/apartments/',
      apartment: []
    }
  },
  mounted(){
    console.log('montata');
    axios.get(this.apiUrl + this.$route.params.slug)
          .then(response => {
            console.log(response.data.results);
            this.apartment = response.data.results;
            // console.log(response.data.results);
          })
          .catch();
  }
}
</script>

<style>
  h2{
    margin-top: 100px;
  }
</style>