<template>
  <div class="container-src">


    <SearcPage/>



  </div>
</template>

<script>

  import SearcPage from '../components/SearcPage';

export default {
  name: 'Src',

  components: {

    SearcPage

  },

  data(){
    return{
      apiUrl: 'http://localhost:8000/api/apartments/',
      apartment: []
    }
  },
  mounted(){
    axios.get(this.apiUrl + this.$route.params.slug)
          .then(response => {
            this.apartment = response.data.results;
          })
          .catch();
  }
}
</script>

<style lang="scss" scoped>
 
</style>