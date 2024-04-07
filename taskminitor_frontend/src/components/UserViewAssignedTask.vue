kmoni
<template>
  <div>
    <h2>User Tasks</h2>
    <div v-if="loading">Loading...</div>
    <ul v-else>
      <li v-for="task in tasks" :key="task.id">
        {{ task.title }} - {{ task.description }} - {{ task.status }}
        <button @click="toggleTaskStatus(task.id)">
          {{ task.status === 'done' ? 'Mark as Not Done' : 'Mark as Done' }}
        </button>
      </li>
    </ul>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: 'UserTasksPage',
  data() {
    return {
      tasks: [],
      loading: true
    };
  },
  mounted() {
    this.fetchTasks();
  },
  methods: {
    fetchTasks() {
      axios.get('http:/http://127.0.0.1:8000/api/user/tasks')
        .then(response => {
          this.tasks = response.data;
          this.loading = false;
        })
        .catch(error => {
          console.error('Error fetching user tasks:', error);
          this.loading = false;
        });
    },
    toggleTaskStatus(taskId) {
      axios.put(`http://http://127.0.0.1:8000/api/user/tasks/${taskId}/toggle-status`)
        .then(response => {
          console.log('Task status toggled successfully');
          // Update the task status in the UI based on the response
          const updatedTask = response.data;
          const index = this.tasks.findIndex(task => task.id === updatedTask.id);
          if (index !== -1) {
            this.tasks.splice(index, 1, updatedTask);
          }
        })
        .catch(error => {
          console.error('Error toggling task status:', error);
        });
    }
  }
};
</script>
