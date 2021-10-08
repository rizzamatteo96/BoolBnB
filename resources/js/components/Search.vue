<template>
  
    <div class="container-search">

        <div class="container-form">
            
            <label for="">Dove</label>
            <input class="city" type="text" placeholder="Scrivi la citta" v-model="citySrc">

            <!-- <label for="">Check-in</label>
            <input type="date">

            <label for="">Check-out</label>
            <input type="date">

            <label for="">Adulti</label>
            <input type="number"> -->

            <!-- <button type="button" class="btn btn-outline-light">Cerca</button> -->
            <router-link :to="{ name: 'src', params: {slug : citySrc} }" class="btn btn-outline-light">Cerca</router-link>

        </div>
    
    </div>

</template>


<script>

export default {

    name: 'Search',
    data(){
        return{
            citySrc : ''
        }
    }

}

</script>

<style lang="scss" scoped>

    .container-search {
        height: 300px;
        width: 100%;
        
        .container-form {
            text-align: center;
            padding: 30px;
            width: 100%;

            .city {
                width: 100%;
            }

            label{
                display: block;
            }

            input {
                padding: 10px;
                border-radius: 20px;
                border:  none;
                display: block;
                margin: 10px auto;
                height: 40px;
            }

        }
      
    }

    // PARTE RESPONSIVE
    @media (max-width: 968px) {

        .city {
            width: 300px;
        }

    }

</style>