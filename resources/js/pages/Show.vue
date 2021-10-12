<template>

  <div class="container-show">

    <div class="container--img--desc">

      <img :src="apartment.image" alt="">

      <div class="descrizioni">
          
        <h2>{{apartment.title}}</h2>

        <ul>
          <li>Citta: {{apartment.city}}</li>
          <li>Via: {{apartment.address}} {{apartment.house_num}}</li>
          <li>Cap: {{apartment.postal_code}}</li>
          <li>Prezzo: {{apartment.daily_price}} €</li>
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
    
    <BannerMap/>

    <ContactForm/>

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
        apartment: []
      }
    },
    mounted(){
      axios.get(this.apiUrl + this.$route.params.slug)
            .then(response => {
              console.log(response.data.results);
              this.apartment = response.data.results;
              // console.log(response.data.results);
            })
            .catch();
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

      img {
        width: 50%;
        height: 500px;
        border-radius: 20px;
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
      margin-top: 30px;
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

        img { 
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