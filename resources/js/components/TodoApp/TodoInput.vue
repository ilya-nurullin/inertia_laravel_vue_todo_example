<template>
    <Form
        class="flex gap-4"
        :action="todos.store()"
        :disable-while-processing="true"
        :reset-on-success="true"
        :reset-on-error="false"
        #default="{ errors }"
    >
        <div class="flex w-full flex-col gap-4">
            <Input name="title" />
            <InputError :message="errors.title" />
        </div>

        <Button>Create todo</Button>
    </Form>
</template>

<script setup lang="ts">
import { Form } from '@inertiajs/vue3';
import Button from '../ui/button/Button.vue';
import Input from '../ui/input/Input.vue';
import todos from '@/routes/todos';
import InputError from '../InputError.vue';
</script>
