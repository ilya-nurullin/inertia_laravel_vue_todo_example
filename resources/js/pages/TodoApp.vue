<template>
    <Head title="TodoApp" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex flex-col gap-4 p-4">
            <h1 class="text-2xl">TodoApp</h1>
            <TodoInput />
            <TodoItems :todos="todos" />
        </div>
    </AppLayout>
</template>

<script setup lang="ts">
import TodoInput from '@/components/TodoApp/TodoInput.vue';
import TodoItems from '@/components/TodoApp/TodoItems.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import todosRoutes from '@/routes/todos';
import { BreadcrumbItem } from '@/types';
import { TodoItem } from '@/types/todo_app';
import { Head } from '@inertiajs/vue3';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Todo App',
        href: todosRoutes.index(),
    },
];

defineProps<{
    todos: TodoItem[];
}>();
</script>
