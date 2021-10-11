<template>
   
    <header class="container-jumbo">
   
        <div class="text-center bg-image">
   
            <div class="mask">
    
                <div class="d-flex justify-content-center align-items-center h-100">
    
                    <div class="text-white animation" :class="(Active === false) ? 'active' : 'not-active'">
                        
                        <img src="img/boolbeb.svg" class="logo-foot"  alt="">
        
                        <h4 class="mb-3 bgc-text display-5">La migliore piattaforma per appartamenti</h4>
        
                        <a class=" btn btn-outline-light btn-lg" href="#"  :class="(Active === false) ? '' : 'not-active'" @click="Active = !Active">Cerca</a>

                    </div>
                    <div class="search-container" :class="(Active === true) ? 'active' : 'not-active'">

                        <a class="btn btn-outline-light btn-lg" href="#" :class="(Active === true) ? '' : 'not-active'"  @click="Active = !Active"><i class="fas fa-times"></i></a>

                        <Search :class="(Active === true) ? 'active' : 'not-active'"/>


                    </div>
                        
    
                </div>
    
            </div>
   
        </div>


    </header>

</template>

<script>

    import Search from '../components/Search.vue'


    export default {

        name: 'Jumbotron',

        components: {

            Search

        },

        data() {
            
            return {
            
                Active: false,

            }
        
        },

    }

</script>

<style lang="scss" scoped>
    
    @import '../../sass/_variables.scss';


    .container-jumbo {
        min-height: 400px;

    }

    // @keyframes animate {

    //     from {
            
    //         left: 0px;

    //     }

    //     to {
    //         left: 100px;
            
    //     }

    // }

    // .animation {

    //     animation: animate 2s;


    // }

    .bg-image {
        background-image: url('img/house3.jpg');
        background-position: center;
        background-attachment: fixed;
        background-size: cover;
        height: 100vh;
        width: 100%;

    }

    .search-container {
        margin: 0 auto;
        width: 90%;

    }

    .bgc-text {
        color: $ColorText2
    }

    .logo-foot {
        width: 50%;
        margin: 0 auto;
    }

    .active {
            display: block;    
                
        }

        .not-active {
            display: none;

        }

    .mask{
        background-color: rgba(0, 0, 0, 0.267);
        height: 100%;
        width: 100%;    
    }

</style>
