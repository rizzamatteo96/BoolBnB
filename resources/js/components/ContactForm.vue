<template>
<!--Section: Contact v.2-->
    <section class="mb-4 container-form">

        <!--Section heading-->
        <h2 class="h1-responsive font-weight-bold text-center my-4">Contatti</h2>
        <!--Section description-->
        <p class="text-center w-responsive mx-auto mb-5">Contattaci subito per avere maggiori informazioni. Cosa aspetti?</p>

        <div class="row row-contact">

            <!--Grid column-->
            <div class="col-md-9 mb-md-0 mb-5">
                <form id="contact-form" name="contact-form" action="mail.php" method="POST">

                    <!--Grid row-->
                    <div class="row">

                        <!--Grid column-->
                        <div class="col-md-6">
                            <div class="md-form mb-0">
                                <label for="name" class="cform">Nome e Cognome</label>
                                <input type="text" id="name" name="name" class="form-control">
                            </div>
                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-md-6">
                            <div class="md-form mb-0">
                                <label for="email" class="cform">Email</label>
                                <input type="text" id="email" name="email" class="form-control">
                            </div>
                        </div>
                        <!--Grid column-->

                    </div>
                    <!--Grid row-->

                    <!--Grid row-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="md-form mb-0">
                                <label for="subject" class="cform">Oggetto</label>
                                <input type="text" id="subject" name="subject" class="form-control">
                            </div>
                        </div>
                    </div>
                    <!--Grid row-->

                    <!--Grid row-->
                    <div class="row">

                        <!--Grid column-->
                        <div class="col-md-12">

                            <div class="md-form">
                                <label class="cform" for="message">Messaggio</label>
                                <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                            </div>

                        </div>
                    </div>
                    <!--Grid row-->

                </form>

                <div class="text-center text-md-left">
                    <button type="button" class="btn btn-outline-danger mt-4" onclick="document.getElementById('contact-form').submit();">Invia</button>
                </div>
                <div class="status"></div>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-md-3 text-center contact-icon">
                <ul class="list-unstyled mb-0">
                    <li>
                        <i class="fas fa-map-marker-alt fa-2x"></i>
                        <p>Roma, Ita</p>
                    </li>

                    <li>
                        <i class="fas fa-phone mt-4 fa-2x"></i>
                        <p>+39 123 456 7890</p>
                    </li>

                    <li>
                        <i class="fas fa-envelope mt-4 fa-2x"></i>
                        <p>info@boolbnb.it</p>
                    </li>
                </ul>
            </div>
            <!--Grid column-->

        </div>

    </section>
    <!--Section: Contact v.2-->
</template>

<script>

  export default {
    name: 'ContactForm',
    
  }

</script>



<style lang="scss" scoped>

    @import '../../sass/_variables.scss';

    
    .container-form{
        width: 90%;
        margin: 0 auto;
        background-color: $BgcHeader;
        border-radius: 20px;
        padding: 20px;
    }


/*     .container-form{
        width: 90%;
        margin: 0 auto;
    }

    .cform{
        display: block;
        margin: 10px 0;
    }

    .row-contact{
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    ul{
        display: flex;
        list-style: none;

        li{
            margin: 0px 30px;
            display: flex;
            align-items: center;

            p{
                margin: 0px 20px;
            }
        }

    
    }
 */
    

</style>