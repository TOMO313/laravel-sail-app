<script setup>
    import Authenticated from '@/Layouts/AuthenticatedLayout.vue';
    import { Link } from '@inertiajs/vue3';
    const {post} = defineProps({
        post: Object
    })
</script>
<template>
    <Authenticated>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ post.title }}の詳細ページ
            </h2>
        </template>
            <div class="w-1/4 mx-auto mt-8 space-y-4">
                <div>
                    <h1>{{ post.title }}</h1>
                    <p>{{ post.created_at }}</p>
                </div>
                <div>
                    <h3>本文</h3>
                    <h3>{{ post.body }}</h3>
                </div>
                <div>
                    <p>カテゴリー:{{ post.category.name }}</p>
                </div>
                <div class="space-x-3">
                    <Link :href="route('edit', {id: post.id})">Edit</Link>
                    <Link :href="route('index')">戻る</Link>
                </div>
            </div>
    </Authenticated>
</template>