<script setup>
import { onMounted } from 'vue';
import { useProjectStore } from '../stores/projectStore';

const projectStore = useProjectStore();

onMounted(() => {
  projectStore.fetchProjects();
});
</script>

<template>
  <div class="p-4">
    <table class="w-full border-collapse border border-gray-300">
      <thead>
        <tr class="bg-gray-100">
          <th class="border p-2">ID</th>
          <th class="border p-2">Name</th>
          <th class="border p-2">Description</th>
          <th class="border p-2">Created At</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="project in projectStore.projects" :key="project.id" class="border">
          <td class="border p-2">{{ project.id }}</td>
          <td class="border p-2">{{ project.name }}</td>
          <td class="border p-2">{{ project.description }}</td>
          <td class="border p-2">{{ new Date(project.created_at).toLocaleDateString() }}</td>
        </tr>
      </tbody>
    </table>

    <div class="flex justify-between items-center mt-4">
      <button
        @click="projectStore.fetchProjects(projectStore.currentPage - 1)"
        :disabled="projectStore.currentPage === 1"
        class="px-4 py-2 rounded transition-colors"
        :class="{
          'bg-blue-500 text-white hover:bg-blue-600': projectStore.currentPage > 1,
          'bg-gray-300 text-gray-500 cursor-not-allowed': projectStore.currentPage === 1
        }"
      >
        Previous
      </button>

      <span>Page {{ projectStore.currentPage }} of {{ projectStore.lastPage }}</span>

      <button
        @click="projectStore.fetchProjects(projectStore.currentPage + 1)"
        :disabled="projectStore.currentPage === projectStore.lastPage"
        class="px-4 py-2 rounded transition-colors"
        :class="{
          'bg-blue-500 text-white hover:bg-blue-600': projectStore.currentPage < projectStore.lastPage,
          'bg-gray-300 text-gray-500 cursor-not-allowed': projectStore.currentPage === projectStore.lastPage
        }"
      >
        Next
      </button>
    </div>
  </div>
</template>
