<template>
  <div class="customer-form">
      <!-- form submit -->


    <form @submit.prevent="updateForm">
      <div class="form-group">
        <label for="name">Nama</label>
        <input type="text" class="form-control" v-model="inputs.nama" placeholder="Masukan nama pelanggan">
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" v-model="inputs.email" placeholder="Masukan email pelanggan">
      </div>
      <div class="form-group">
        <label for="address">Alamat</label>
        <textarea type="text" v-model="inputs.alamat" class="form-control" 
          placeholder="Masukan alamat pelanggan"> </textarea>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</template>

<script>
import axios from 'axios'
  export default {
    name: 'update-form',
    data() {
      return {
        inputs: {},
      }
    },
    methods: {
      updateForm() {
          axios.post('/api/customers/' + this.$route.params.id, this.inputs)
            .then(response => {
                this.$router.push('/');
                console.log(response.data);
            })
            .catch(error => {
                console.log(error.response.data);
            });

          // fetch('/api/customers/' + this.$route.params.id, {
          //   method: 'POST',
          //   body: JSON.stringify(this.inputs),
          //   headers: {
          //     'Content-Type': 'application/json'
          //   }
          // }).then(this.$router.push('/'))
      },
    },
    created() {
        axios.get('/api/customers/' + this.$route.params.id)
        .then(response => {
          this.inputs = response.data
        })
    },

  }
</script>