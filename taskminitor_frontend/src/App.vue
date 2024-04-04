<template>
  <div id="app">
    <img alt="website Logo" src="./assets/logo2.png" class="logo">
    <router-view/>
  </div>
</template>

<script>
export default {
  name: 'App',
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
</style>


