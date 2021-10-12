<template>
  
    <div class="container">

        <div class="information">

            <h2 class="title">Prova ad ospitare</h2>
           
            <p class="description">Condividi il tuo spazio per guardare <br> qualcosa in piu e cogiere nuove opportunita.</p>
           
            <a href="#accept" class="btn btn-outline-light btn-lg" @click="ActiveLog = !ActiveLog">Scopri di piu</a>

            <div class="accept" id="accept" :class="(ActiveLog === true) ? 'active' : 'not-active'">
               
                <h2>Accetta</h2>
                
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quia illo, omnis quos magni totam quibusdam. Molestias, quisquam obcaecati aliquam odit labore beatae est sunt debitis, iste, sed veniam. Odit, adipisci?
                Doloribus maiores voluptates totam ea, iure laborum similique odio esse nisi ipsum eum autem quos temporibus numquam, quasi officia tenetur cumque deleniti rem. Explicabo sit a est perferendis minus cumque.
                Corporis architecto fuga molestiae quia facilis id atque nihil totam hic non! Repellendus dolores aperiam necessitatibus neque enim at corrupti quidem laboriosam ex! Iure ratione fugit, illum nesciunt esse qui.
                Quidem reprehenderit, quos id saepe nihil alias voluptatem! Iure repudiandae nobis laborum, cum saepe commodi tempore delectus quasi earum? Doloremque officiis vel perferendis odio animi accusantium minima consequuntur quis quibusdam?
                Architecto explicabo id quo magnam possimus maiores molestiae neque maxime incidunt, quasi amet, tempora obcaecati, saepe delectus. Enim veniam placeat dolor in natus, similique recusandae optio earum, ab, neque asperiores.
                Recusandae assumenda molestias velit rerum qui repellat nulla labore dolor aliquid excepturi mollitia voluptatibus voluptates exercitationem, necessitatibus reiciendis facere esse in debitis unde quaerat. Debitis amet eius minima commodi voluptates?
                Hic atque exercitationem adipisci modi delectus repudiandae. Quae in, illum sunt repudiandae officiis recusandae rem nisi excepturi explicabo quisquam! Fugiat distinctio explicabo eaque nemo ipsa ex optio nostrum reiciendis similique.
                Blanditiis officiis ducimus fugiat ipsum eligendi voluptate mollitia, harum quidem ad esse consectetur tempora suscipit, expedita temporibus distinctio. Vitae consequuntur illo placeat ipsam tenetur libero commodi minus? Harum, reiciendis ratione?
                At dignissimos, illum eaque ullam sint corporis. Recusandae ducimus facilis eum magnam asperiores culpa hic, veritatis facere distinctio eveniet, neque laudantium quis cum, quo rem quod illo. Id, animi enim.
                Possimus quod molestias error odio excepturi corporis vero similique dolor ad numquam fugiat incidunt corrupti veritatis laudantium, praesentium fuga voluptates modi aperiam distinctio facilis! Sint a deleniti dolor esse veritatis.
                Velit, voluptatibus alias nihil accusantium soluta, error numquam exercitationem recusandae voluptate animi repellendus debitis necessitatibus dolorem facere optio, aliquid enim repellat maiores amet libero at molestiae voluptas! Veritatis, cumque ducimus?
                Minima facere id hic ullam? Illo expedita fuga molestiae perspiciatis provident voluptates debitis, possimus asperiores ab optio, voluptate pariatur dolore, quam eius eum! Fugit repellat adipisci nam corrupti. Reprehenderit, maxime?
                Pariatur, hic! Rerum sunt cumque, ratione maiores obcaecati vel aliquid ullam enim nobis temporibus ea alias cum dolor sequi? Nam eligendi porro laborum suscipit repudiandae aperiam ad tempore provident dicta.
                Quia harum, inventore, assumenda facilis consequatur magni ex voluptas dolore natus, facere voluptatum ipsam minus. Deleniti assumenda odio odit, doloribus quod repudiandae iste facilis accusantium asperiores magnam animi ratione error!
                Provident iusto porro doloribus reiciendis ab earum cumque quidem quas, culpa dolores voluptates quaerat, pariatur quia ratione! Tenetur animi assumenda alias quas cupiditate quam laboriosam aut pariatur dolorem! Saepe, ea.
                Quidem in veniam architecto eveniet consequatur itaque odit sapiente, dicta minima omnis doloribus reiciendis autem, ab, sunt libero exercitationem quam esse cumque. Alias molestias illo voluptates odio. Tempora, veritatis voluptates!
                Rerum, consectetur quas repellat deleniti possimus sed enim dolore voluptates, voluptas quia cum accusantium voluptatibus commodi ipsa soluta reiciendis pariatur sequi atque harum. Animi magni incidunt mollitia? Laborum, odio aut.
                Temporibus debitis illo deserunt a quam tempora, amet provident corporis minus dignissimos. Quod reprehenderit, saepe tempora voluptatem repellat nam omnis error ex voluptate numquam tenetur nobis, eveniet ducimus natus ut.
                Quisquam voluptatem sunt explicabo accusamus aspernatur maxime quibusdam vitae totam accusantium! Odio, voluptas iusto officiis quibusdam quo, reprehenderit dolorum laborum facilis rem deserunt beatae debitis nesciunt unde modi accusamus iure.
                Dignissimos ad eveniet laborum, facere odio cumque porro repudiandae sapiente illo eius dicta, quaerat amet fuga vero voluptates possimus accusamus praesentium quidem incidunt odit beatae nobis adipisci ipsam sint? Omnis.</p>
                
                <button class="btn btn-outline-light m-3 btn-lg" @click="ActiveLog = !ActiveLog">Rifiuta</button>
                
                <button class="btn btn-outline-light m-3 btn-lg" >Acconsento</button>
           
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
            position: absolute;
            margin: 0 auto;
            background-color: black;
            top: 100%;
            left: 0%;
            height: auto;
            z-index: 20;
            padding: 20px;

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

            .accept {
                height: initial;

            }
            
        }

    }

</style>