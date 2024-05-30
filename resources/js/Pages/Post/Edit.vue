<script setup>
    import Authenticated from '@/Layouts/AuthenticatedLayout.vue';
    import { Link, useForm } from '@inertiajs/vue3';
    const {post} = defineProps({
        post: Object
    })
    const form = useForm({
        title: post.title,
        body: post.body,
    })
</script>
<template>
    <Authenticated>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ post.title }}の編集ページ
            </h2>
        </template> 
        <div class="mt-12 mx-auto w-1/4 p-6 bg-cyan-100 border-2 border-gray-200 flex-col rounded">
            <form @submit.prevent="form.put(route('update', {id: post.id}))">
                <div class="m-5">
                    <label for="title">タイトル:</label>
                    <input type="text" v-model="form.title" id="title" class="w-full"/>
                    <div class="text-red-700" v-if="form.errors.title">{{ form.errors.title }}</div>
                </div>
                <div class="m-5">
                    <label for="body">本文:</label>
                    <input type="text" v-model="form.body" id="body" class="w-full"/>
                    <div class="text-red-700" v-if="form.errors.body">{{ form.errors.body }}</div>
                </div>
                <button class="ml-auto border-2 border-gray-200 bg-cyan-100 px-2 flex" type="submit" :disabled="form.processing">
                    Edit
                </button>
            </form>
            <Link :href="route('index')">戻る</Link>
        </div>
    </Authenticated>
</template>