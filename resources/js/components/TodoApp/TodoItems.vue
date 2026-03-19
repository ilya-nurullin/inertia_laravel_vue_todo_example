<template>
    <TodoItem v-for="todo in todos" :todo="todo" :key="todo.id" />
</template>

<script setup lang="ts">
import { TodoItem as TodoItemType } from '@/types/todo_app';
import TodoItem from './TodoItem.vue';

defineProps<{
    todos: TodoItemType[];
}>();
</script>
