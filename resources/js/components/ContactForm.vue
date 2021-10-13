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
                <form  @submit.prevent="sendData" id="contact-form" name="contact-form" action="mail.php" method="POST">

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
                                <label for="email" class="cform">Email *</label>
                                <input onfocusout="validateEmail(email)" type="text" id="email" name="email" class="form-control" v-model="email" required>
                                <span id="user-email" class="text-danger"></span>
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
                                <label class="cform" for="description">Messaggio *</label>
                                <textarea type="text" id="description" name="description" rows="2" class="form-control md-textarea" v-model="description" required></textarea>
                            </div>

                            <div v-if="messageSent" class="alert alert-primary mt-4">Messaggio inviato con successo</div>

                        </div>
                    </div>
                    <!--Grid row-->
                    <div class="text-center text-md-left">
                        <button class="btn btn-outline-danger mt-4" type="submit">Invia</button>
                    </div>
                    
                    <div class="mb-0 form-group row">
                        <span class="text-danger text-md-left col-md-9 col-form-label">I campi contrassegnati con * sono obbligatori</span>
                    </div>


                </form>

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

import validation from '../validation';

  export default {
    name: 'ContactForm',
    props: ['apartment'],
    data() {
        return {
            email: '',
            description: '',
            errors:{},
            messageSent: false
        }
    },
    methods: {
        sendData(){
            axios.post('/api/contacts/', {
                'email': this.email,
                'description': this.description,
                'apartment_id': this.apartment
            })
                .then(response => {
                    this.messageSent = response.data.success;
                    this.email = '';
                    this.description = '';
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