import { defineStore } from 'pinia';

export const useProjectStore = defineStore('projectStore', {
  state: () => ({
    projects: [],
    currentPage: 1,
    lastPage: 1
  }),
  actions: {
    async fetchProjects(page = 1) {
      try {
        const response = await fetch(`http://localhost/api/project?page=${page}`);
        const data = await response.json();
        this.projects = data.data;
        this.currentPage = data.current_page;
        this.lastPage = data.last_page;
      } catch (error) {
        console.error("Error fetching projects:", error);
      }
    }
  }
});
