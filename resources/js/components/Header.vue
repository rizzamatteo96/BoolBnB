<template>

    <div class="container-nav">

        <!-- inizio logo  -->
        <div class="container--logo">

            <a href="http://localhost:8000">
                <img class="container--logo--image" src="/img/boolbeb-icona.svg" alt="BoolBnb">
            </a>

        </div>
        <!-- fine logo  -->


        <div v-if="user == '' && !loading" class="w-100">
            <!-- inizio  menu mobile -->
            <div class="container--logo-mobile" @click="myFilter">
                
                <img class="container--logo--image--mobile" src="/img/boolbeb-icona.svg" alt="BoolBnb">

                <span><i class="fas fa-caret-down"></i></span>
        
            </div>
            <!-- fine  menu mobile -->
        </div>

        <div v-if="user == '' && !loading">

            <!-- inizio  menu link -->
            <ul class="container--menu" :class="{active: isActive}">

                <li class="container--menu--list">
                    
                    <a class="container--menu--list--link" href="http://localhost:8000/login" @click="ActiveLog = !ActiveLog" >login</a>
                    
                </li>

                <li class="container--menu--list">
                    
                    <a class="container--menu--list--link" href="http://localhost:8000/register">register</a>
                    
                </li>

            </ul>
            <!-- fine  menu link -->
        </div>

        <div v-if="user != '' && !loading" class="container--menu" :class="{active: isActive}">
            <div class="container--menu--list">
                <a class="container--menu--list--link" href="http://localhost:8000/login" @click="ActiveLog = !ActiveLog" ><i class="fas fa-user-circle"></i> {{user.name}} </a>
            </div>
        </div>

        <!-- <Login :class="(ActiveLog === true) ? 'active' : 'not-active'"/> -->

    </div>

</template>


<script>

    //import Login from '@/components/Login.vue'

    export default {

        name: 'Header',

        components: {

            //Login
        
        },

        data() {
            
            return {
            
                isActive: false,
                user: '',
                loading: true
            }
        
        },
        mounted(){
            this.isLogged()
        },
        methods: {

            // Funzione per attivare menu mobile
            myFilter: function() {

                this.isActive = !this.isActive;

            },
            isLogged(){
                axios.get('http://localhost:8000/api/user')
                     .then( response => {
                        this.user = response.data.user;
                     })
                     .finally(()=>{
                        this.loading = false;
                     });
            }

        }

    }

</script>


<style lang="scss" scoped>

    @import '../../sass/_variables.scss';

    //contenitore generale
    .container-nav {
        z-index: 10;
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: $BgcHeader;
        position: fixed;
        top: 0;
        box-shadow: rgba(99, 99, 99, 0.2) 0px 0px 8px 0px;
        height: 60px;

        .container--logo {
            width: 60px;
            margin-left: 50px;
            
            .container--logo--image {
                width: 50px;
            }

        }

        .container--logo-mobile {
            display: none;
        }

        .container--menu {
            display: flex;
            list-style: none;
            margin: 0;
            text-decoration: none;

            .container--menu--list {
                margin: 0px 60px;
                transition: 0.6s ease-out;

                &:hover {
                    transition: 0.6s ease-out;
                    transform: scale(2);
                }

                .container--menu--list--link {
                    text-decoration: none;
                    color: $ColorText1;
                    text-transform: uppercase;
                }

            }

        }

        .container--burgher-menu {
            display: none;
        }

           // classi per menu mobile
        .active {
            display: block;
        }

        .not-active {
            display: none;
        }
        
    }

    // PARTE RESPONSIVE
    @media (max-width: 968px) {

        .container-nav {
            display: flex;
            min-height: 121px;

            .container--logo{
                display: none;                
            }

            .container--logo-mobile {
                font-size: 0;
                display: block;
                margin: 5px auto 0px;
                width: 70px;
                text-align: center;

                .container--logo--image--mobile {
                    width: 100%;
                }

                span {
                    color: $ColorText1;
                    font-size: 30px;
                    line-height: 0;
                }

            }

            .container--menu {
                padding: 20px 0;
                position: absolute;
                line-height: 5;
                height: 100vh;
                top: 121px;
                background: $BgcHeader;
                flex-direction: column;
                text-align: center;
                width: 100%;
                display: none; 
            }

            .active {
                display: flex;                
            }

        }

    }

</style>