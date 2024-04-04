import { createRouter, createWebHistory } from 'vue-router';
import HomePage from './components/HomePage.vue'; 
import LoginPage from './components/LoginPage.vue'; 
import AdminTasksPage from './components/AdminViewTasks.vue';
import UserTasksPage from './components/UserViewAssignedTask.vue'; 
import CreateTaskForm from './components/CreateTaskForm.vue'; 

const routes = [
  {
    path: '/',
    name: 'Home',
    component: HomePage,
  },
  {
    path: '/login',
    name: 'Login',
    component: LoginPage,
  },
  {
    path: '/admin/tasks',
    name: 'AdminTasks',
    component: AdminTasksPage,
    meta: { requiresAuth: true, isAdmin: true } 
  },
  {
    path: '/user/tasks',
    name: 'UserTasks',
    component: UserTasksPage,
    meta: { requiresAuth: true }
  },
  {
    path: '/create-task',
    name: 'CreateTask',
    component: CreateTaskForm
  }
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;





