<template>
  
    <div class="container">
        
        <h2>Appartamenti nella zona di: </h2>

        <div class="box-container" v-for="apartment in apartments" :key="apartment.id">

            <div class="box">

                <img class="container-box--img" :src="apartment.image" alt="">

                <div class="container-description" >

                    <h2 class="container-description--title"> Titolo {{apartment.title}}</h2>

                    <span class="container-description--price">Prezzo: {{apartment.daily_price}} €</span>
                    <span class="container-description--price">citta: {{apartment.city}}</span>

                </div>

                <span class="container-box--adress">Via: {{apartment.address}}, {{apartment.house_num}}</span>

            </div>

           
        </div>

    </div>

</template>

<script>

    export default {

        name: 'SearcPage',

        data(){

            return{

                apiUrl: 'http://localhost:8000/api/apartments/',
                apartments: []
            }
        },

        created(){

            this.chiamataApi();

        },

        methods: {
            chiamataApi(){
                axios.get(this.apiUrl + this.$route.params.slug)
          .then(response => {
            this.apartments = response.data.results;
          })
          .catch();
            }
        }

    }
    
</script>

<style lang="scss" scoped>

    .container {

        padding-top: 100px;

        .box-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;

        }
        
        .box {
            padding: 50px;
            width: 400px;
            .container-box--img {
                width: 100%;
                height: 250px;
                border-radius: 10px;
                box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;

            }

            .container-description {
                display: flex;
                align-items: center;
                justify-content: space-around;

            }

        } 

    }

</style>