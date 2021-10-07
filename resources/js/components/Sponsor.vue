
<template>

    <div class="container-sponsor">

        <h2 class="title-sponsor">Appartamenti in vetrina</h2>

        <VueSlickCarousel class="cont-caro" v-bind="settings">

            <div class="box" v-for="(apartment, i) in 10" :key="i">

                <img class="container-box--img" src="img/house.jpg" alt="">

                <div class="container-description" >

                    <h2 class="container-description--title"> Titolo casa</h2>

                    <span class="container-description--price">Prezzo: 90€</span>

                </div>

                <span class="container-box--adress">Via</span>

            </div>
        
        </VueSlickCarousel>
      
    </div>

</template>


<script>

    import VueSlickCarousel from 'vue-slick-carousel'
    import 'vue-slick-carousel/dist/vue-slick-carousel.css'
    import 'vue-slick-carousel/dist/vue-slick-carousel-theme.css'

    export default {

        name: 'Sponsor',

        data() {

            return {

                // npm impostazioni carousel
                settings: {

                    "infinite": true,
                    "slidesToShow": 3,
                    "slidesToScroll": 1,
                    "autoplay": true,
                    "arrows": false,
                    "speed": 8000,
                    "autoplaySpeed": 2000,
                    "responsive": [
                        
                        {
                            "breakpoint": 968,

                            "settings": {
                                "slidesToShow": 1,
                                "arrows": false,  
                            }

                        }

                    ]
          
                },

                //API appartamenti
                apiUrl: 'http://localhost:8000/api/apartments',

                apartments: []
                
            }

        },
        
        created(){

            this.chiamataApi();

        },

        methods: {
            chiamataApi(){
                axios.get(this.apiUrl)
                        .then(response => {
                        console.log(response.data.results);
                        this.apartments = response.data.results;
                        })
                        .catch(e => {
                        console.log(e);
                });
            }
        },

        components: { 

            VueSlickCarousel 

        }

    }

</script>


<style lang="scss" scoped>

    @import '../../sass/_variables.scss';


    .container-sponsor {
        padding: 150px 50px 50px 50px;
        width: 90%;
        height: 700px;
        margin: 0 auto;

        .title-sponsor {
            text-align: center;
            font-size: 40px;
        }

        .cont-caro {
            width: 100%;
            margin: 0 auto;
            display: flex;
        
            .box {
                padding: 50px;

                .container-box--img {
                    width: 100%;
                    height: 250px;
                    border-radius: 10px;
                    box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;

                }

                .container-description {
                    display: block;
                    align-items: center;
                    justify-content: space-between;

                }

            } 

        }   

    }

    // PARTE RESPONSIVE
    @media (max-width: 968px) {

        .container-sponsor {
            padding: 5px;
            width: 100%;
      
        }

    }




</style>