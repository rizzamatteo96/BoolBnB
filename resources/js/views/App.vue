<template>
  <div class="app">
    <!-- <HeaderVecchio/> -->

    <Header/>
    <Jumbotron/>
    <Sponsor/>








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
//import Sponsor from '../components/Sponsor';




export default {
  name: 'App',
  components: {
    //HeaderVecchio,
    Header,
    Jumbotron,
    //Sponsor
  }
}
</script>

<style lang="scss">

  @import '../../sass/commons';



</style>