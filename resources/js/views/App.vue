<template>
  <div>
    <Header/>
    <!-- <Main/> -->

    <div class="container">
      <router-view></router-view>
    </div>
  </div>


</template>

<script>
import Header from '../components/Header';

export default {
  name: 'App',
  components: {
    Header
  }
}
</script>

<style lang="scss" scoped>

</style>