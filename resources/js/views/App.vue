<template>
  <div>
    <Header/>
    <HeaderCopy/>

    <!-- <Main/> -->

    <div class="container">
      <router-view></router-view>
    </div>
  </div>


</template>

<script>
//import Header from '../components/Header';
import HeaderCopy from '../components/HeaderCopy';


export default {
  name: 'App',
  components: {
    //Header,
    HeaderCopy
  }
}
</script>

<style lang="scss" scoped>

</style>