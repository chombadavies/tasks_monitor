import { createRouter, createWebHistory } from 'vue-router';
import HomePage from './components/HomePage.vue'; // Adjust the import paths as necessary
import LoginPage from './components/LoginPage.vue'; // Adjust the import paths as necessary
import AdminTasksPage from './components/AdminViewTasks.vue'; // Adjust the import paths as necessary
import UserTasksPage from './components/UserViewAssignedTask.vue'; // Adjust the import paths as necessary

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
    meta: { requiresAuth: true, isAdmin: true } // Add meta information for authentication and authorization
  },
  {
    path: '/user/tasks',
    name: 'UserTasks',
    component: UserTasksPage,
    meta: { requiresAuth: true } // Add meta information for authentication
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;





