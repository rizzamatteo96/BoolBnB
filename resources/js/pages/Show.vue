<template>

  <div class="container-show mb-2">

    <div v-if="!loading">

      <div class="container--img--desc">

        <!-- <img :src="apartment.image" alt=""> -->

        <div class="img" v-bind:style="{ 'background-image': 'url(' + apartment.image + ')' }"></div>

        <div class="descrizioni">
            
          <h2>{{apartment.title}}</h2>

          <ul>
            <li>Citta: {{apartment.city}}</li>
            <li>Via: {{apartment.address}} {{apartment.house_num}}</li>
            <li>Cap: {{apartment.postal_code}}</li>
            <!-- <li>Prezzo: {{apartment.daily_price}} €</li> -->
          </ul>

          <h4>Descrizione</h4>

          <span>{{apartment.description}}</span>

        </div>

      </div>
      
      <div class="banner-servizi">

        <div class="services">

          <h2>Servizi</h2>

          <ul class="el-servizi">

            <li><i class="fas fa-bed"></i> Letti: {{apartment.n_beds}}</li>
            <li><i class="fas fa-house-user"></i> Stanze: {{apartment.n_rooms}}</li>
            <li><i class="fas fa-restroom"></i> Bagni: {{apartment.n_bathrooms}}</li>
          
          </ul>

        </div>

        <div class="cont-separation">

          <hr class="separation">

        </div>

        <div class="addtional-services">

          <h2>Servizi Aggiuntivi</h2>
        
          <div class="container-add-serv">
              
            <ul class="list-add-serv" v-for="service in apartment.services" :key="service.id">
                  
              <li>{{service.name}}</li>
                    
            </ul>
          
          </div>
          
        </div>
        
      </div>

      <!-- <BannerMap/> -->

      <ContactForm :apartment="apartmentId" />

    </div>
    


    <div class="text-center mt-5 container-logo" v-else>
            <!-- <div class="spinner-grow" role="status">
                <span class="sr-only">Loading...</span>
            </div> -->

            <img class="loading-logo" src="/img/boolbeb-white.png" alt="BoolBnb">


        </div>

  </div>
  

</template>

<script>

  import BannerMap from '../components/BannerMap';
  import ContactForm from '../components/ContactForm';

  export default {
    name: 'show',
    components: {
      BannerMap,
      ContactForm
    },
    data(){
      return{
        apiUrl: 'http://localhost:8000/api/apartment/',
        apiIpUrl: 'https://api.ipify.org',
        // apiEmailUrl: 'http://localhost:8000/api/user/' + 'apartmentId',
        apartment: [],
        apartmentId: '',
        userIp: '',
        userEmail: '',
        loading: true
      }
    },
    mounted(){
      axios.all([
          axios.get(this.apiUrl + this.$route.params.slug),
          axios.get(this.apiIpUrl),
          // axios.get(this.apiEmailUrl)
        ])
        .then(axios.spread((response1, response2) => {
          // console.log('data1', data1, 'data2', data2)
          this.apartment = response1.data.results;
          this.apartmentId = response1.data.results.id;

          this.userIp = response2.data;
          // this.userEmail = response3.data;
          // console.log(this.userIp);
        }))
        .catch(axios.spread((err1, err2) => {
          console.log(err1, err2);
        }))
        .finally(() => {
          this.sendData(); 
        });
    },
    methods: {
        sendData(){

          // first of all take the actual date
          let today = new Date();
          let dd = String(today.getDate()).padStart(2, '0');
          let mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
          let yyyy = today.getFullYear();
          
          // save the actual date in a variable
          today = yyyy + '/' + mm + '/' + dd;

          // call api to save the visitor
          axios.post('/api/statistics/', {
              'apartment_id': this.apartmentId,
              'clicked_at': today,
              'visitor': this.userIp,
            })
            .then(response => {
              response.data.success;
              this.loading = false;
              // console.log(response);
            })
            .catch(error => {
              console.log(error);
            });
        },
    }
  }

</script>

<style lang="scss" scoped>

  @import '../../sass/_variables.scss';

  .container-show {
    border-radius: 20px;
    width: 100%;
    padding: 100px 0px;
    color: white;
      
    .container--img--desc {
      height: 500px;
      border-radius: 20px;
      display: flex;
      width: 90%;
      background-color: $BgcHeader;
      margin: 0 auto;
      animation: animate 2s;
      justify-content: space-between;

      .img {
        width: 50%;
        height: 500px;
        border-radius: 20px;
        background-position: center;
        background-size: cover;
      }

      .descrizioni {
        width: 50%;
        padding: 20px;
        text-align: center;
        word-wrap: break-word;

        ul {
          margin: 20px 0px;
          list-style: none;
        }
      }

    }

    .banner-servizi {
      background-color: $BgcHeader;
      width: 90%;
      margin: 0 auto;
      border-radius: 20px;
      padding: 30px;
      margin: 30px auto;
      display: flex;

      .services {
        text-align: center;
        width: 35%;
        
        .el-servizi {

        display: flex;
        margin: 20px;
        list-style: none;

        li {
          margin: 0px 20px;
        }

      }

      }
      
      .cont-separation {
        width: 20%;
        margin: 0 auto;
        display: flex;
        justify-content: center;

        .separation {
          height: 80%;
          width: 3px;
          border-radius: 20px;
          background-color: #fff;
        }

      }
      
      .addtional-services {
        width: 35%;
        text-align: center;

        .container-add-serv {
          display: flex;
          justify-content: center;
          flex-flow: wrap;

          .list-add-serv {
            display: flex;
            flex-wrap: wrap;
            list-style: none;

            li {
              margin: 0px 10px;
            }

          }

        }
           
      }

    }
      
  }

  .container-logo{
    height: 50vh;

    .loading-logo{
        height: 50px;
        animation: logoLoading 1s infinite;
    }
  
    @keyframes logoLoading {
        0% {transform: scale(1);}
        50% {transform: scale(2);}
        100% {transform: scale(1);}
    }
  }

  @keyframes animate {

    from {
      width: 50%;
    }

    to {
      width: 90%;
    }

  }

  // PARTE RESPONSIVE
  @media (max-width: 968px) {

    .container-show {
      padding-top: 150px;
      
      .container--img--desc {
        height: auto;
        display: block;
        animation: none;
        width: 90%;

        .img { 
          width: 100%;
          height: 300px;
        }

        .descrizioni {
          bottom: 0;
          width: 100%;
          margin-left: 0;
        //word-wrap: break-word;

        }

      }

      .banner-servizi {
        display: block;
        
        .services{
          text-align: center;
          width: 100%;
          
          h2 {
            font-size: 20px;
          }

          .el-servizi {
            width: 100%;
            margin: 0 auto;

            li {
              margin: 9px;
            }

          }

        }

        .cont-separation {
          width: 100%;

          .separation {
            width: 100%;
            height: 3px;
          }
          
        }
        .addtional-services {
            width: 100%;
            text-align: center;

            h2 {
            font-size: 20px;
          }

        }

      }

    }

  }

</style>