import { createRouter, createWebHistory } from 'vue-router';
import HomePage from './components/HomePage.vue'; 
import LoginPage from './components/LoginPage.vue'; 
import AdminTasksPage from './components/AdminViewTasks.vue';
import UserTasksPage from './components/UserViewAssignedTask.vue'; 
import CreateTaskForm from './components/CreateTaskForm.vue'; 
import { isAuthenticated, isAdmin } from './auth'; 

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


router.beforeEach((to, from, next) => {
  if (to.matched.some(record => record.meta.requiresAuth)) {
    // This route requires authentication, check if logged in
    // if not, redirect to login page.
    if (!isAuthenticated()) {
      next({
        path: '/login',
        query: { redirect: to.fullPath } // Store the full path to redirect the user back after login
      });
    } else {
      // Check if the route requires admin access
      if (to.matched.some(record => record.meta.isAdmin)) {
        if (isAdmin()) {
          // User is admin, allow access
          next();
        } else {
          // User is not admin, redirect to home page or a "not authorized" page
          next({ path: '/' });
        }
      } else {
        // Route does not require admin access, but requires authentication
        next(); // proceed to route
      }
    }
  } else {
    // Does not require authentication, make sure to always call next()!
    next();
  }
});



export default router;





