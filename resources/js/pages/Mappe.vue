<template>
  <div class="stile-map">
        <div id="mappe"></div>
    </div>
</template>

<script>
import tt from '@tomtom-international/web-sdk-maps';

export default {
  name: 'Mappe',
  created(){
    const map = tt.map({
      key: 'K3xnfxcXAODvZopP0scVRnmjNxjruLUo',
      container: 'mappe'
  });
  }
}
</script>

<style lang="scss" scoped>
  .stile-map{
    width: 100%; height: 100%; margin: 0; padding: 0;
  }
</style>