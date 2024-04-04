<template>
  <div class="landing-page">
    <header>
      <h1>Welcome to Our Website</h1>
      <router-link to="/login">
        <button>Login</button>
      </router-link>
    </header>
    <section class="welcome-note">
      <p>Discover the ultimate platform for managing your tasks effectively. Join us and enhance your productivity!</p>
    </section>
    <!-- Add more sections as needed -->
  </div>
</template>

<script>
export default {
  name: 'HomePage'
}
</script>

<style scoped>
.landing-page header {
  background-color: #f0f0f0;
  padding: 20px;
  text-align: center;
}

.welcome-note {
  text-align: center;
  margin: 20px;
  font-size: 20px;
}

button {
  padding: 10px 20px;
  background-color: #007bff;
  color: white;
  border: none;
  cursor: pointer;
  margin-top: 10px;
}

/* Responsive design adjustments */
@media (max-width: 600px) {
  .welcome-note {
    font-size: 16px;
  }
}
</style>

