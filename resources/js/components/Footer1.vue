<template>
  
    <div class="container-footer">

        <ul>
            <h4>informazioni</h4>
            <li> <a href="#">Come funziona</a></li>
            <li> <a href="#">Invetitori</a></li>
            <li> <a href="#">Newsroom</a></li>
            <li> <a href="#">HotelTonight</a></li>
            <li> <a href="#">Opportunità di lavoro</a></li>
        </ul>

        <ul>
            <h4>community</h4>
            <li><a href="#">Diversità e appartenenza</a></li>
            <li><a href="#">Accessibilità</a></li>
            <li><a href="#">Airbnb Associates</a></li>
            <li><a href="#">Ospita i rifugiati afghani</a></li>
            <li><a href="#">Invitare un ospite</a></li>
            <li><a href="#">Airbnb.org</a></li>

        </ul>

        <ul>
            <h4>ospita</h4>
            <li><a href="#">Diventa un host</a></li>
            <li><a href="#">Offri un'Esperienza</a></li>
            <li><a href="#">Offri un'Esperienza online</a></li>
            <li><a href="#">Ospitare responsabilmente</a></li>
            <li><a href="#">Centro Risorse</a></li>
            <li><a href="#">Community Center</a></li>

        </ul>

        <ul>
            <h4>assistenza</h4>
            <li><a href="#">La nostra risposta all'emergenza COVID-19</a></li>
            <li><a href="#">Centro Assistenza</a></li>
            <li><a href="#">Opzioni di cancellazione</a></li>
            <li><a href="#">Servizio di supporto al vicinato</a></li>
            <li><a href="#">Affidabilità e sicurezza</a></li>
        </ul>

    </div>

</template>


<script>

    export default {

    }

</script>


<style lang="scss" scoped>

    @import '../../sass/_variables.scss';



    .container-footer {

        margin-top: 100px;
        padding: 100px;
        width: 100%;
        background: $BgcFooter;
        display: flex;
        justify-content: space-between;

        ul {
            list-style: none;

            h4 {
                text-transform: uppercase;
            }

            li{

                a{
                    text-decoration: none;
                    color: rgb(78, 78, 78);
                }

            }

        }

    }

    // PARTE RESPONSIVE
    @media (max-width: 968px) {

        .container-footer {
            display: block;

            ul {
                margin: 30px 0px;
            }

        }

    }

</style>