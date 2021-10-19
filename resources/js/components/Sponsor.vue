
<template>

    <div class="container-sponsor">

        <h2 class="title-sponsor color-text">Appartamenti in vetrina</h2>

        <VueSlickCarousel class="cont-caro" v-bind="settings" v-if="apartments.length>0">

            <div class="box" v-for="apartment in apartments" :key="apartment.id">

                <div class="box-container">
                    
                    <div class="container-box--img">
                        <img :src="apartment.image" :alt="apartment.title">
                    </div>

                    <div class="container-description" >

                        <h2 class="color-text container-description--title">{{apartment.title}}</h2>

                        <!-- <p class="color-text container-description--price"> <span class="info-text">Prezzo: </span> {{apartment.daily_price}} €</p> -->
                        <p class="color-text container-box--adress"> <span class="info-text">Citta: </span> {{apartment.city}}</p>
                        <p class="color-text container-box--adress"> <span class="info-text">Via: </span> {{apartment.address}}, {{apartment.house_num}}</p>

                    </div>

                    <router-link :to="{ name: 'apartment-details', params: {slug : apartment.slug} }" @click.native="scrollToTop()" class="btn btn-outline-light">Visualizza dettagli</router-link>
                
                </div>

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
                    "arrows": true,
                    "speed": 2000,
                    "autoplaySpeed": 4000,
                    "responsive": [
                        
                        {
                            "breakpoint": 992,

                            "settings": {
                                "slidesToShow": 1,
                                "arrows": false,  
                            }

                        },
                        {
                            "breakpoint": 1200,

                            "settings": {
                                "slidesToShow": 2,
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
                        // console.log(response.data.results);
                        this.apartments = response.data.results;
                        })
                        .catch(e => {
                        console.log(e);
                });
            },

            scrollToTop() {
                window.scrollTo(0,0);
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
        width: 90%;
        height: 700px;
        margin: 100px auto;
        word-wrap: break-word;

        .color-text {
            color: $ColorText2;
        }

        .title-sponsor {
            text-transform: uppercase;
            text-align: center;
            font-size: 50px;
            width: 100%;
        }

        .cont-caro {
            width: 100%;
            margin: 0 auto;
            display: flex;

            .box {
                padding: 50px;
                text-align: center;

                .box-container {
                padding: 10px;
                height: 100%;
                // width: 400px;
                box-shadow: rgba(0, 0, 0, 0.178) 1.5px 3px 3px 1.5px;
                margin: 20px 0px;
                border-radius: 20px;
                text-align: center;
                }

                .container-box--img {
                    width: 100%;
                    height: 250px;
                    line-height: 250px;
                    vertical-align: middle;
                    position: relative;
                    
                    img {
                        position: absolute;
                        top: 50%;
                        transform: translateY(-50%);
                        max-height: 250px;
                        width: 100%;
                        border-radius: 10px;
                        box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
                        vertical-align: middle;
                    }
                }

                .container-description {
                    width: 100%;
                    text-align: center;
                    padding: 10px;

                    .container-description--title{
                        max-height: 70px;
                        display: -webkit-box;
                        -webkit-box-orient: vertical;
                        -webkit-line-clamp: 2;
                        white-space: normal;
                        overflow: hidden;
                        text-overflow: ellipsis;
                    }

                    .info-text {
                        font-weight: bold;
                    }

                }

            } 

        }   

    }

    // PARTE RESPONSIVE
    @media (max-width: 968px) {

        .container-sponsor {
            padding: 5px;

            .title-sponsor {
                font-size: 39px;
            }
      
        }

    }

</style>