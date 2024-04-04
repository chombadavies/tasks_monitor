<template>
  <div class="task-form-container">
    <h2>Create Task</h2>
    <form @submit.prevent="createTask">
      <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" id="title" v-model="taskData.title" required>
      </div>
      <div class="form-group">
        <label for="description">Description:</label>
        <textarea id="description" v-model="taskData.description" required></textarea>
      </div>
      <button type="submit">Create Task</button>
    </form>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: 'CreateTaskForm',
  data() {
    return {
      taskData: {
        title: '',
        description: ''
      }
    };
  },
  methods: {
    createTask() {
      axios.post('http://127.0.0.1:8000/api/tasks', this.taskData)
        .then(response => {
          console.log('Task created successfully:', response.data);
        
           this.$router.push('/admin/tasks');
        })
        .catch(error => {
          console.error('Error creating task:', error);
        });
    }
  }
};
</script>

<style scoped>
.task-form-container {
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

input[type="text"],
textarea {
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
