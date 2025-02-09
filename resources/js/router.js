import { createRouter, createWebHistory } from 'vue-router';
import Project from './components/Project.vue';

const routes = [
  {
    path: '/',
    name: 'project',
    component: Project,
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
