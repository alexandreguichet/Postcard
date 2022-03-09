<template>
    <div>
        <div class="mt-10 pt-6 text-xl font-bold">
            {{postcard.title}}
        </div>
        <div class="pb-8">
            <div class="mt-4 text-gray-800">
                {{postcard.description}}
            </div>
            <div class="flex m-auto grid grid-cols-6 gap-4">
                <button v-if="!face" @click.prevent="face = !face" class="col-span-1">
                    Arrow to Front
                </button>
                <div class="pb-8 pt-8 justify-center" v-if="face">
                    <div class="pb-2 font-bold text-center italic">
                        Front of postcard {{face}}
                    </div>
                    <img :src="postcard.picture_front" width="800" class="shadow-lg rounded-md col-start-2 col-span-5">
                </div>
                <div cpass="pb-8 pt-8 justify-center" v-else>
                    <div class="pb-2 font-bold text-center italic">
                        Back of postcard
                    </div>
                    <img :src="postcard.picture_back" width="800" class="shadow-lg rounded-md col-start-2 col-span-5">
                </div>
                <button v-if="face" @click.prevent="face = !face" class="col-end-7 col-span-1">
                    Arrow to Back
                </button>
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
            console.log(this.face)
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
