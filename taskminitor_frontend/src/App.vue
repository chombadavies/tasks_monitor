<template>
  <div id="app">
    <img alt="website Logo" src="./assets/logo2.png" class="logo">
    <br>
    <button v-if="isLoggedIn" @click="logout">Logout</button>
    <router-view/>
    
  </div>
</template>

<script>
export default {
  name: 'App',
  data() {
    return {
      isLoggedIn: false
    };
  },
  mounted() {
    // Check if the user is logged in by checking the token in localStorage
    this.isLoggedIn = !!localStorage.getItem('userToken');
  },
  methods: {
    logout() {
      // Clear token from localStorage
      localStorage.removeItem('userToken');
      // Update isLoggedIn state
      this.isLoggedIn = false;
      this.$router.push('/');
      
    }
  }
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}

.logo {
  width: 100px; /* Adjust the width as needed */
  height: auto; /* This will maintain the aspect ratio */
}

button {
  padding: 10px 20px;
  background-color: #007bff;
  color: white;
  border: none;
  cursor: pointer;
  margin-top: 10px;
}
</style>
