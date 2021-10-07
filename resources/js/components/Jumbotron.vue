<template>
   
    <header class="container-jumbo">
   
        <div class="text-center bg-image">
   
            <div class="mask">
    
                <div class="d-flex justify-content-center align-items-center h-100">
    
                    <div class="text-white">
        
                        <h1 class="mb-3" :class="(Active === false) ? 'active' : 'not-active'">BoolBnB</h1>
        
                        <h4 class="mb-3" :class="(Active === false) ? 'active' : 'not-active'">La migliore piattaforma per appartamenti</h4>
        
                        <a class="btn btn-outline-light btn-lg" href="#"  :class="(Active === false) ? '' : 'not-active'" @click="Active = !Active">Cerca</a>
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

    .container-jumbo {

        min-height: 400px;

    }
    
    .bg-image {
        background-image: url('img/house2.jpg');
        background-position: center;
        background-attachment: fixed;
        background-size: cover;
        height: 800px;
        width: 100%;

        
    }

    .active {
            display: block;    
                
        }

        .not-active {
            display: none;

        }

    .mask{
        background-color: rgba(0, 0, 0, 0.6);
        height: 100%;
        width: 100%;    
    }

</style>
