<template>
  
    <div class="container">

        <div class="information">

            <h2 class="title">Prova ad ospitare</h2>
           
            <p class="description">Condividi il tuo spazio per guardare <br> qualcosa in piu e cogiere nuove opportunita.</p>
           
            <a class="btn btn-outline-light btn-lg" @click="ActiveLog = !ActiveLog">Scopri di piu</a>

            <div class="accept" id="accept" :class="(ActiveLog === true) ? 'active' : 'not-active'">
            
                <div class="container-md ms_overflow">
                    <h2>Termini di servizio per gli utenti europei</h2>
                    
                    <p>
                        I consumatori possono accedere alla piattaforma della Commissione europea di risoluzione online delle controversie da qui: https://ec.europa.eu/consumers/odr. Si prega di notare che BoolBnB non è impegnata o tenuta a utilizzare un organismo per la risoluzione delle controversie alternativo per risolvere le controversie coi consumatori. Ultimo aggiornamento: October 20, 2021. Grazie per aver scelto di utilizzare BoolBnB! 
                        I presenti Termini del servizio per Utenti europei ("Termini") costituiscono un contratto giuridicamente vincolante tra te e BoolBnB, che regola l'utilizzo dei siti web, delle applicazioni e di altre offerte di BoolBnB (collettivamente, la "Piattaforma BoolBnB"). Quando utilizzati nei presenti Termini, "BoolBnB", "noi", "ci" o "nostro" si riferiscono all'entità BoolBnB di cui all'Allegato 1 con cui stai stipulando un contratto.
                        La Piattaforma BoolBnB offre un luogo online che consente agli utenti ("Members") di pubblicare, offrire, cercare e prenotare servizi. I membri che pubblicano e offrono servizi sono gli "Host" mentre i membri che cercano, prenotano o utilizzano i servizi sono gli "Ospiti". Gli Host propongono alloggi ("Alloggi"), attività, escursioni ed eventi ("Esperienze"), nonché una varietà di viaggi e altri servizi (collettivamente, "Servizi dell'Host" e ciascuna offerta di Servizi dell'Host costituisce un "Annuncio"). Devi registrare un account per utilizzare molte funzioni della Piattaforma BoolBnB e mantenere accurate le informazioni del tuo account. In qualità di fornitore della Piattaforma BoolBnB, BoolBnB non possiede, controlla, offre né gestisce alcun Annuncio o Servizio dell'Host. BoolBnB non è una parte contraente dei contratti stipulati direttamente tra Host e Ospiti, né un agente immobiliare, un assicuratore o un organizzatore o venditore di pacchetti turistici ai sensi della direttiva (UE) 2015/2302. BoolBnB non agisce in qualità di agente per nessun Membro, ad eccezione di quanto specificato nei Termini del servizio di pagamento ("Termini di pagamento"). Per saperne di più sul ruolo di BoolBnB, vai alla Sezione 16.
                        Altri termini e politiche integrano i presenti Termini, come la nostra Informativa sulla privacy, che descrive il modo in cui raccogliamo e utilizziamo i dati personali, e i nostri Termini di pagamento, che regolano qualsiasi servizio di pagamento fornito ai Membri dalle entità di pagamento di BoolBnB ("BoolBnB Payments").

                        Se sei un Host, è tua responsabilità comprendere e rispettare tutte le leggi, norme, regolamenti e contratti con terze parti applicabili ai tuoi Servizi dell'Host.
                    </p>
                    
                    <a class="btn btn-outline-light m-3 btn-lg" @click="ActiveLog = !ActiveLog" >Rifiuta</a>
                    
                    <a class="btn btn-outline-light m-3 btn-lg" href="http://localhost:8000/userreg/apartments/create">Acconsento</a>
                </div>
           
            </div>
       

        </div>

    </div>

</template>

<script>

    export default {

        data() {
            
            return {
            
                ActiveLog: false,

            }
        
        },

    }

</script>

<style lang="scss" scoped>

    @import '../../sass/_variables.scss';



    .container {
        width: 90%;
        color: white;
        padding:0;
        border-radius: 20px;
        background-image: url("img/ospitality.jpg");
        background-size: cover;
        background-attachment: fixed;
        margin-bottom: 100px;
        background-repeat: no-repeat;

         .active {
            display: block;
        }

        .not-active {
            display: none;
        }

        .accept {
            position: fixed;
            margin: 0 auto;
            background-color: rgba(0, 0, 0, 0.95);
            top: 0;
            left: 0;
            height: 100vh;
            width: 100%;
            z-index: 20;
            padding: 50px 20px;

            .ms_overflow{
                max-height: 100%;
                overflow-y: auto;
            }

            .btn-accept {
                margin: 20px;
                background-color: white;
                padding: 10px 20px;
            }
            
        }

        .information {
                
            background: linear-gradient(83deg, rgba(0, 0, 0, 0.678) 40%,rgba(0, 0, 0, 0) 100%);
            height: 100%;
            width: 50%;
            padding: 100px;
            border-radius: 20px 0px 0px 20px;

            .title {
                font-size: 50px;
            }

            .description {
                font-size: 20px;
            }
         
        }
       
    }

    // PARTE RESPONSIVE
    @media (max-width: 968px) {

        .container {
            width: 100%;

            .information {
                width: 100%;
                padding: 50px;
            }

        }

    }

</style>