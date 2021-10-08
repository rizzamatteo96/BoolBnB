<template>
  <div class="app">

    <Header/>
    
    <main>

      <router-view></router-view>

    </main>  

    <Footer/>

  </div>

</template>

<script>
  import Header from '../components/Header';
  import Footer from '../components/Footer';

  export default {
    name: 'App',
    components: {
      Header,
      Footer

    }
  }
</script>

<style lang="scss">

  @import '../../sass/commons';
  /* width */
::-webkit-scrollbar {
  width: 5px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #000000; 
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: rgb(41, 41, 41); 
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #FF385C; 
}

  .app {

   background: linear-gradient(140deg, #ff385c, #000000);
    background-size: 400% 400%;

    -webkit-animation: AnimationName 22s ease infinite;
    -moz-animation: AnimationName 22s ease infinite;
    -o-animation: AnimationName 22s ease infinite;
    animation: AnimationName 22s ease infinite;
}

@-webkit-keyframes AnimationName {
    0%{background-position:25% 0%}
    50%{background-position:76% 100%}
    100%{background-position:25% 0%}
}
@-moz-keyframes AnimationName {
    0%{background-position:25% 0%}
    50%{background-position:76% 100%}
    100%{background-position:25% 0%}
}
@-o-keyframes AnimationName {
    0%{background-position:25% 0%}
    50%{background-position:76% 100%}
    100%{background-position:25% 0%}
}
@keyframes AnimationName {
    0%{background-position:25% 0%}
    50%{background-position:76% 100%}
    100%{background-position:25% 0%}
}

</style>