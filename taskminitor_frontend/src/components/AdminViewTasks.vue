<template>
  <div>
    <h2>Admin Tasks</h2>
    <button @click="createTask" class="btn-create-task">Create Task</button>
    <div v-if="loading">Loading...</div>
    <table v-else class="table-striped table-bordered table-shadow">
      <thead>
        <tr>
          <th>Title</th>
          <th>Description</th>
          <th>Status</th>
          <th>Actions</th>
          <th>Assign To</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="task in tasks" :key="task.id">
          <td>{{ task.title }}</td>
          <td>{{ task.description }}</td>
          <td>{{ task.status }}</td>
          <td>
            <button @click="openUpdateForm(task)" class="btn-update">Update</button>
            <button @click="deleteTask(task.id)" class="btn-delete">Delete</button>
          </td>
          <td>
            <select v-model="selectedUser" @change="assignTask(task.id, $event.target.value)">
              <option value="">Assign to:</option>
              <option v-for="user in users" :key="user.id" :value="user.id">{{ user.name }}</option>
            </select>
          </td>
        </tr>
      </tbody>
    </table>

    <!-- Update Task Modal -->
    <div v-if="showUpdateModal" class="modal">
      <div class="modal-content">
        <span class="close" @click="closeUpdateModal">&times;</span>
        <h2>Edit Task</h2>
        <form @submit.prevent="updateTask">
          <div class="form-group">
            <label for="updateTitle">Title:</label>
            <input type="text" id="updateTitle" v-model="updatedTask.title" required>
          </div>
          <div class="form-group">
            <label for="updateDescription">Description:</label>
            <textarea id="updateDescription" v-model="updatedTask.description" required></textarea>
          </div>
          <button type="submit">Update Task</button>
        </form>
      </div>
    </div>
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
      loading: true,
      showUpdateModal: false,
      updatedTask: {
        id: null,
        title: '',
        description: '',
      },
    };
  },
  mounted() {
    this.fetchTasks();
    this.fetchUsers();
  },
  methods: {
    fetchTasks() {
      axios.get('http://127.0.0.1:8000/api/tasks_list')
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
    },
    openUpdateForm(task) {
      this.updatedTask.id = task.id;
      this.updatedTask.title = task.title;
      this.updatedTask.description = task.description;
      this.showUpdateModal = true;
    },
    closeUpdateModal() {
      this.showUpdateModal = false;
      // Reset the updated task data
      this.updatedTask.id = null;
      this.updatedTask.title = '';
      this.updatedTask.description = '';
    },
    updateTask() {
      axios.put(`http://127.0.0.1:8000/api/tasks/${this.updatedTask.id}`, {
        title: this.updatedTask.title,
        description: this.updatedTask.description,
      })
      .then(() => {
        console.log('Task updated successfully');
        // Close the update modal
        this.closeUpdateModal();
        // Fetch updated tasks
        this.fetchTasks();
      })
      .catch(error => {
        console.error('Error updating task:', error);
      });
    },
    deleteTask(taskId) {
      console.log('Deleting task with ID:', taskId);
    },
    createTask() {
      this.$router.push('/create-task');
    }
  }
};
</script>


<style scoped>
.table-striped {
  width: 100%;
  border-collapse: collapse;
}

.table-striped th,
.table-striped td {
  padding: 8px;
  border: 1px solid #ddd;
}

.table-striped th {
  background-color: #f2f2f2;
}

.table-striped tbody tr:nth-child(odd) {
  background-color: #f9f9f9;
}

.table-bordered {
  border: 1px solid #ddd;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.btn-update,
.btn-delete {
  padding: 6px 12px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.btn-update {
  background-color: #007bff;
  color: #fff;
}

.btn-delete {
  background-color: #dc3545;
  color: #fff;
}

.btn-create-task {
  background-color: #42b983;
  color: white;
  padding: 10px 20px
  }
</style>

