<template>
  <div class="customer-form">
      <!-- form submit -->
      <h1>LOGIN</h1>


    <form @submit.prevent="loginProcess">
      <div class="form-group">
        <label for="name">Email</label>
        <input type="text" class="form-control" v-model="inputs.email" placeholder="Masukan nama pelanggan">
      </div>
      <div class="form-group">
        <label for="email">password</label>
        <input type="password" class="form-control" v-model="inputs.password" placeholder="Masukan Password pelanggan">
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
      loginProcess(){
          axios.post('/api/login-process', this.inputs)
            .then(response => {
                console.log(response.data ,'response');
                if(response.data != "Unauthorized"){
                    localStorage.jwt = response.data;
                    localStorage.isLogin = true;
                    localStorage.setItem('jwt', response.data);
                  this.$router.push('/');
                }
            })
            .catch(error => {
                console.log(error.response.data);
            });
        },
    },

    mounted() {
      if(this.isLogin) {
        this.$router.push({name :'home'});
      }
      
      this.isLogin = localStorage.getItem('isLogin');

    },
  }
</script>