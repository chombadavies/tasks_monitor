<template>
  <div class="login-container">
    <h2>Login</h2>
    <form @submit.prevent="login">
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" v-model="credentials.email" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" v-model="credentials.password" required>
      </div>
      <button type="submit">Login</button>
    </form>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: 'LoginPage',
  data() {
    return {
      credentials: {
        email: '',
        password: ''
      }
    }
  },
methods: {
  async login() {
    try {
      const response = await axios.post('http://127.0.0.1:8000/api/login', this.credentials);
      console.log(response)

      console.log('Login successful:', response.data);

      const role = response.data.role.id;

      if (role === 1) {
        this.$router.push('/admin/tasks');

        
      } else if (role === 2) { 
        this.$router.push('/my/tasks');
      } else {
        // Handle other roles or cases if needed
      }
    } catch (error) {
      console.error('Login error:', error);
    }
  }
}
}
</script>

<style scoped>
.login-container {
  max-width: 400px;
  margin: 0 auto;
  padding: 20px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.form-group {
  margin-bottom: 20px;
}

label {
  display: block;
  margin-bottom: 5px;
}

input[type="email"],
input[type="password"] {
  width: 100%;
  padding: 10px;
  border: 1px solid #ddd;
  border-radius: 4px;
}

button[type="submit"] {
  background-color: #42b983;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
</style>
