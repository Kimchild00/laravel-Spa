<template>
<div>

  <div style="float:right">
    <p>email: {{ datauser.email }}</p>
    <p>name: {{ datauser.name }}</p>
  </div>
              <button class="btn btn-danger"  style="float:right" @click="logout">Logout</button>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">nama</th>
        <th scope="col">alamat</th>
        <th scope="col">email</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="d in data" :key="d.id">
        <th scope="row">{{d.id}}</th>
        <td>{{d.nama}}</td>
        <td>{{ d.alamat }}</td>
        <td>{{ d.email }}</td>
        <td>
            <router-link 
              class='btn btn-info'
              data-toggle='collapse'
              :to="'/edit/'+d.id"
            >
              edit
            </router-link>
            <button @click="hapus(d.id)" class='btn btn-danger'>hapus</button>
        </td>
      </tr>
    </tbody>
  </table>
</div>

</template>

<script>
import axios from 'axios'
// import VueAxios from 'vue-axios'
export default {
    data() {
        return {
          isLogin : localStorage.getItem('isLogin'),
          data: [],
          datauser: [],
        }
    },
    created() {
        
        fetch('/api/data')
            .then(response => response.json())
            .then(data => this.data = data);

        // axios
        // .get('http://127.0.0.1:8000/api/data')
        // .then(response => {
        //         console.log(response.data);
        //         this.data = response.data;
        // })
        var token = "Bearer " + localStorage.getItem("jwt");
        axios.get('http://127.0.0.1:8000/api/user', {headers: {'Authorization': 'Bearer '+ token}})
        .then(response => {
            console.log(response)
            this.datauser = response.data // assign response to state user
        })
    },
    methods: {
        hapus(id) {
            axios.get('api/delete/customers/'+id).then(response => {
              let i = this.data.map(data => data.id).indexOf(id);
              this.data.splice(i, 1)
            })

        },
        logout(){
          localStorage.removeItem('isLogin');
          localStorage.removeItem('jwt');
          this.isLogin = false;
          this.$router.push({name :'login'});
        }
    },
    mounted() {
      if(!this.isLogin) {
        this.$router.push({name :'login'});
      }
      
      this.isLogin = localStorage.getItem('isLogin');

    },
}
</script>