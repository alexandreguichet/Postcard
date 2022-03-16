<template>
    <div>
        <div class="mt-10 pt-8 ml-10 text-2xl font-bold">
            {{postcard.title}}
            <span class="text-sm text-gray-800">by <span class="text-blue-600">{{postcard.user.name}}</span> in <span class="text-blue-600">{{postcard.assignment.name}}</span>.</span>
        </div>
        <div class="pb-8">
            <div class="mt-6 ml-10 text-gray-800">
                {{postcard.description}}
            </div>
            <div class="m-auto">
                <div v-if="!face" class="grid grid-cols-10 gap-4 pb-8 pt-8">
                    <button @click.prevent="face = !face">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" class="h-16">
                            <!--! Font Awesome Pro 6.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                            <path d="M192 448c-8.188 0-16.38-3.125-22.62-9.375l-160-160c-12.5-12.5-12.5-32.75 0-45.25l160-160c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25L77.25 256l137.4 137.4c12.5 12.5 12.5 32.75 0 45.25C208.4 444.9 200.2 448 192 448z"/>
                        </svg>
                    </button>
                    <div class="col-span-8">
                        <div class="pb-2 font-bold text-center italic text-xl">
                            Back of postcard
                        </div>
                        <img :src="postcard.picture_back" width="800" class="shadow-lg rounded-xl">
                    </div>
                </div>
                <div v-if="face" class="grid grid-cols-10 gap-4 pb-8 pt-8">
                    <div class="col-start-2 col-span-8">
                        <div class="pb-2 font-bold text-center italic text-xl">
                            Front of postcard
                        </div>
                        <img :src="postcard.picture_front" width="800" class="shadow-lg rounded-xl">
                    </div>
                    <button @click.prevent="face = !face">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="h-16">
                            <path d="M96 480c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L242.8 256L73.38 86.63c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l192 192c12.5 12.5 12.5 32.75 0 45.25l-192 192C112.4 476.9 104.2 480 96 480z"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['postcard'],
    data: function() {
        return {
            face: true,
        }
    },
    methods: {
        rotatePostcard() {
            this.face = !this.face;
        }
    }
}
</script>

<style>
img {
    max-width: 100%;
    max-height: 450px;
    margin: auto;
}
</style>
