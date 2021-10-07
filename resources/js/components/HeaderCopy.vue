<template>

    <div class="container-nav">

        <div class="container--logo">

            <img class="container--logo--image" src="" alt="">
        
        </div>
       
        <div class="container--logo-mobile" @click="myFilter">
            
            <img class="container--logo--image--mobile" src="" alt="">

            <span><i class="fas fa-caret-down"></i></span>
       
        </div>
        
        <ul class="container--menu" :class="{active: isActive}">

            <li class="container--menu--list" @click="myFilter"><a class="container--menu--list--link" href="#" @click="ActiveLog = !ActiveLog" >login</a></li>
            <li class="container--menu--list" @click="myFilter"><a class="container--menu--list--link" href="#">register</a></li>

        </ul>
        
        <!-- <Login :class="(ActiveLog === true) ? 'active' : 'not-active'"/> -->

    </div>

</template>


<script>

    //import Login from '@/components/Login.vue'

    export default {

        name: 'HeaderCopy',

        components: {

            //Login
        
        },

        data() {
            
            return {
            
                isActive: false,

            }
        
        },

        methods: {

            myFilter: function() {

                this.isActive = !this.isActive;

            }

        }

    }

</script>


<style lang="scss" scoped>

    @import '../../sass/_variables.scss';

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

        .active {
            display: block;
        }

        .not-active {
            display: none;
        }

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