<template>
  <div class="customer-form">
      <!-- form submit -->


    <form @submit.prevent="submitForm">
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
      <button type="submit" class="btn btn-primary" >Submit</button>
    </form>
  </div>
</template>

<script>
  export default {
    name: 'create-form', 
    data(){
      return {
        isLogin : localStorage.getItem('isLogin'),
        inputs : {}
      }
    },
    methods: {
      submitForm(){
          axios.post('/api/customers', this.inputs)
            .then(response => {
                this.$router.push('/');
                console.log(response.data);
            })
            .catch(error => {
                console.log(error.response.data);
            });

          // fetch('/api/customers', {
          //   method: 'POST',
          //   body: JSON.stringify(this.inputs),
          //   headers: {
          //     'Content-Type': 'application/json'
          //   }
          // })
          // .then(response => {
          // })

        },
    },
    mounted() {
      if(!this.isLogin) {
        this.$router.push({name :'login'});
      }
    }
  }
</script>