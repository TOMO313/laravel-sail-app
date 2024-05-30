<script setup>
   import Authenticated from '@/Layouts/AuthenticatedLayout.vue';
   import { Link, router } from '@inertiajs/vue3';
   const {posts} =defineProps({
    posts: Array
   })
   const destroy = ({id})=>{
    router.delete(route('delete', {id: id}), {
        onBefore: () => confirm('削除しますが、よろしですか？')
    })
   }
   </script>
<template>
    <Authenticated>
       <template #header>
           <h2 class="font-semibold text-xl text-gray-800 leading-tight">
               Index
           </h2>
       </template>
       <div class="w-3/4 mx-auto mt-8 space-y-3">
           <h1 class="font-bold text-3xl text-gray-800">Blog Name</h1>
           <div class="w-1/2 mx-auto divide-gray-200 divide-y-2">
               <div v-for="post in posts" class="space-y-1">
                   <h2 class="font-bold text-xl text-gray-800">
                    <Link :href="route('show', {id: post.id})">{{ post.title }}</Link>
                   </h2>
                   <button class="px-3 bg-purple-300 hover:bg-purple-400 rounded-md" @click="destroy(post)">
                    削除 
                   </button>
                   <p class="p-2">{{ post.body }}</p>
                   <small>カテゴリー:{{ post.category?.name }}</small>
               </div>
            </div>    
        </div>
    </Authenticated>
</template>