<template>
    <label class="text-xl">
        <span v-show="!isEditing">
            <Checkbox
                :model-value="todo.is_completed"
                @update:model-value="toggleTodo"
            />

            <span class="ml-2">{{ todo.title }}</span>

            <Button class="ml-4" size="icon-sm" @click="isEditing = true">
                <EditIcon />
            </Button>
            <Form class="inline" :action="todos.destroy(todo.id)">
                <Button class="ml-4" size="icon-sm" variant="destructive">
                    <TrashIcon />
                </Button>
            </Form>
        </span>

        <Form
            :action="todos.update(todo.id)"
            v-show="isEditing"
            class="flex gap-4"
            #default="{ errors }"
            @success="isEditing = false"
        >
            <div class="flex flex-col">
                <Input :model-value="todo.title" name="title" />
                <InputError :message="errors.title" />
            </div>

            <Button>Save</Button>
        </Form>
    </label>
</template>

<script setup lang="ts">
import { EditIcon, TrashIcon } from 'lucide-vue-next';
import Button from '../ui/button/Button.vue';
import Checkbox from '../ui/checkbox/Checkbox.vue';
import { Form, useForm } from '@inertiajs/vue3';
import todos from '@/routes/todos';
import { TodoItem } from '@/types/todo_app';
import InputError from '../InputError.vue';
import Input from '../ui/input/Input.vue';
import { ref } from 'vue';

const props = defineProps<{
    todo: TodoItem;
}>();

const isEditing = ref(false);

const toggleForm = useForm();

function toggleTodo() {
    toggleForm.post(todos.toggle(props.todo.id).url);
}
</script>
