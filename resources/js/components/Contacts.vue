<template>
  <div class="container">
      <form @submit.prevent="sendData()">
        <label for="email">Email</label>
        <input name="email" id="email" type="text" v-model="email" required>

        <label for="message">Messaggio per l'host</label>
        <textarea name="description" id="message" cols="50" rows="10" placeholder="Inserisci il tuo messaggio" v-model="message" required></textarea>

        <button class="btn-primary" type="submit">click me</button>
      </form>

  </div>
</template>

<script>
export default {
    name: 'Contacts',
    data() {
        return {
            email: '',
            message: '',
            errors:{}
        }
    },
    methods: {
        sendData(){
            axios.post('/api/contacts', {
                'email': this.email,
                'message': this.message
            })
                .then(response => {
                    console.log(response);
                })
                .catch(error => {
                    console.log(error);
                });
        },
    }
}
</script>

<style>

</style>