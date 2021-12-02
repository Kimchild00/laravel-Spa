<template>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">namat</th>
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

</template>

<script>
import axios from 'axios'
// import VueAxios from 'vue-axios'
export default {
    data() {
        return {
            data: [],
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
    },
    methods: {
        hapus(id) {
            axios.get('api/delete/customers/'+id).then(response => {
              let i = this.data.map(data => data.id).indexOf(id);
              this.data.splice(i, 1)
            })

        }
    },
}
</script>