<template>
  <div>
    <!-- <Header/> -->
    <!-- <Main/> -->

    <h1>test vue router</h1>

    <p>
      <router-link :to="{ name: 'home' }">Home</router-link> |
      <router-link :to="{ name: 'show' }">Show</router-link>
    </p>
    <div class="container">
      <router-view></router-view>
    </div>
  </div>


</template>

<script>
import Header from '../components/Header';
import Main from '../components/Main';

export default {
  name: 'App',
  components: {
    Header,
    Main
  }
}
</script>

<style lang="scss" scoped>

</style>