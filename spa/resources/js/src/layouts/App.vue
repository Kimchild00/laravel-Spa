<template>
  <div>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
      <router-link :to="{ name: 'home' }" class="navbar-brand"
        >Kim</router-link
      >
      <button
        class="navbar-toggler"
        data-toggle="collapse"
        data-target="#navbarCollapse"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div id="navbarCollapse" class="collapse navbar-collapse">
        <ul class="navbar-nav">
          <li class="nav-item">
            <router-link
              class="nav-link"
              data-toggle="collapse"
              :to="{ name: 'home' }"
            >
              Home
            </router-link>
          </li>

          <li class="nav-item">
            <router-link
              class="nav-link"
              data-toggle="collapse"
              :to="{ name: 'create-form' }"
            >
              Create
            </router-link>
          </li>
          <!-- <li v-show="isLogin" class="nav-item">
            <button class="btn btn-danger" @click="logout">Logout</button>
          </li> -->
        </ul>
      </div>
    </nav>

    <div class="container">
      <router-view></router-view>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      isLogin : false,
    };
  },
  methods: {
    logout(){
      localStorage.removeItem('isLogin');
      this.isLogin = false;
      this.$router.push({name :'login'});
    }
  },
  mounted() {
      this.isLogin = localStorage.getItem('isLogin');
  },
  watch: {
    // $route() {
    //   $("#navbarCollapse").collapse("hide");
    // },
  },
};
</script>