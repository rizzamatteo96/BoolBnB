<template>
  <div class="app">
    <!-- <HeaderVecchio/> -->

    <Header/>
    
    <Jumbotron/>
    
    <Sponsor/>
    
    <Banner/>

    <Footer/>








    <!-- <Main/> -->

    <!-- <div class="container">
      <router-view></router-view>
    </div> -->
  </div>


</template>

<script>
  //import HeaderVecchio from '../components/HeaderVecchio';
  import Header from '../components/Header';
  import Jumbotron from '../components/Jumbotron';
  import Sponsor from '../components/Sponsor';
  import Banner from '../components/Banner';
  import Footer from '../components/Footer.vue';

export default {
  name: 'App',
  components: {
    //HeaderVecchio,
    Header,
    Jumbotron,
    Sponsor,
    Banner,
    Footer


  }
}
</script>

<style lang="scss">

  @import '../../sass/commons';


  .app {

    background: #f6dfd8;

  }
</style>