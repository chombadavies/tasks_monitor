<template>
  <div>
    <h2>Admin Tasks</h2>
    <div v-if="loading">Loading...</div>
    <ul v-else>
      <li v-for="task in tasks" :key="task.id">
        {{ task.title }} - {{ task.description }} - {{ task.status }}
        <select v-model="selectedUser" @change="assignTask(task.id, $event.target.value)">
          <option value="">Assign to:</option>
          <option v-for="user in users" :key="user.id" :value="user.id">{{ user.name }}</option>
        </select>
      </li>
    </ul>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: 'AdminTasksPage',
  data() {
    return {
      tasks: [],
      users: [],
      selectedUser: null,
      loading: true
    };
  },
  mounted() {
    this.fetchTasks();
    this.fetchUsers();
  },
  methods: {
    fetchTasks() {
      axios.get('http://127.0.0.1:8000/api/tasks')
        .then(response => {
          this.tasks = response.data;
          this.loading = false;
        })
        .catch(error => {
          console.error('Error fetching tasks:', error);
          this.loading = false;
        });
    },
    fetchUsers() {
      axios.get('http://127.0.0.1:8000/api/users')
        .then(response => {
          this.users = response.data;
        })
        .catch(error => {
          console.error('Error fetching users:', error);
        });
    },
  assignTask(taskId, userId) {
  axios.post(`http://127.0.0.1:8000/api/tasks/${taskId}/assign`, { user_id: userId })
    .then(() => {
      console.log('Task assigned successfully');
    })
    .catch(error => {
      console.error('Error assigning task:', error);
    });
}
  }
};
</script>
