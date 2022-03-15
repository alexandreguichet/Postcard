<template>
    <div class="bg-gray-100 shadow-lg">
        <div v-if="!editor && !this.$root.user" class="text-center pl-8 pr-8 mt-10 p-6 italic text-xl border border-gray-300 rounded-lg">
            Login to upload a new postcard
        </div>
        <div v-else-if="!editor && this.$root.user" @click="editor = !editor" class="text-center pl-8 pr-8 mt-10 p-6 font-bold text-xl cursor-pointer border border-gray-300 rounded-lg">
            Upload a new postcard
        </div>
        <div v-else class="pl-8 pr-8 mt-10 p-6 rounded-lg">
            <div class="flex">
                <div class="w-9/12 mr-4">
                    <label
                           class="text-lg font-medium text-gray-800">
                        Title
                    </label>
                    <div class="mt-1 rounded-md shadow-sm flex">
                        <input type="text" v-model="postcard.title"
                               class="focus:ring-blue-500 focus:border-blue-500 flex-grow block w-full min-w-0 rounded-none rounded-md sm:text-sm border-gray-300">
                    </div>
                </div>
                <div class="w-56">
                    <label
                        class="text-lg font-medium text-gray-800">
                        Assignment
                    </label>
                    <div class="mt-1 rounded-md shadow-sm flex">
                        <input type="text" v-model="postcard.assignment_id"
                               class="focus:ring-blue-500 focus:border-blue-500 flex-grow block w-full min-w-0 rounded-none rounded-md sm:text-sm border-gray-300">
                    </div>
                </div>
            </div>
            <div class="mt-4">
                <label
                    class="text-lg font-medium text-gray-800">
                    Postcard Description
                </label>
                <div class="mt-1 rounded-md shadow-sm flex">
                    <textarea type="text" v-model="postcard.description"
                           class="h-36 pt-2 pl-2 focus:ring-blue-500 focus:border-blue-500 flex-grow block w-full min-w-0 rounded-none rounded-md sm:text-sm border-gray-300">
                    </textarea>
                </div>
            </div>

            <div class="mt-4 flex">
                <div>
                    <h1 class="text-lg font-medium text-gray-800">Postcard Front</h1>
                    <input type="file" class="hidden"
                           ref="postcardFront"
                           @change="uploadFrontPicture">
                    <div class="block rounded-md w-80 h-40 mt-2" v-if="postcardFrontPreview != null"
                         :style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + postcardFrontPreview + '\');'">
                    </div>
                    <div>
                        <a href="#" class="mt-2 mr-2 inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white dark:border-gray-700 dark:bg-gray-700 dark:text-white hover:bg-gray-50 dark:hover:bg-gray-800" type="button" @click.prevent="selectFrontPicture">
                            Select a Front Picture
                        </a>
                    </div>
                </div>
                <div class="ml-8">
                    <h1 class="text-lg font-medium text-gray-800">Postcard Back</h1>
                    <input type="file" class="hidden"
                           ref="postcardBack"
                           @change="uploadBackPicture">
                    <div class="block rounded-md w-80 h-40 mt-2" v-if="postcardBackPreview != null"
                         :style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + postcardBackPreview + '\');'">
                    </div>
                    <div>
                        <a href="#" class="mt-2 mr-2 inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white dark:border-gray-700 dark:bg-gray-700 dark:text-white hover:bg-gray-50 dark:hover:bg-gray-800" type="button" @click.prevent="selectBackPicture">
                            Select a Back Picture
                        </a>
                    </div>
                </div>
            </div>

            <button type="button" @click="post()"
                    class="bg-blue-100 border border-indigo-400 rounded-md shadow-sm py-2 px-4 mt-4 inline-flex justify-center text-sm font-medium
                    hover:bg-blue-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <span>Post</span>
            </button>
            <button type="button" @click.prevent="cancel()"
                    class="bg-red-100 border border-red-400 rounded-md shadow-sm ml-2 py-2 px-4 mt-4 inline-flex justify-center text-sm font-medium
                    hover:bg-red-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <span>Cancel</span>
            </button>
        </div>
    </div>
</template>

<script>
export default {
    data: function() {
        return {
            editor: false,
            postcard: {
                title: '',
                description: '',
                assignment_id: 1,
                picture_front: '',
                picture_back: '',
            },
            postcardFrontPreview: null,
            postcardBackPreview: null,
        }
    },
    methods: {
        post(){
            // if(!this.$root.isStudent()){
            //     return;
            // }
            //logic to insert postcard into table
            let data = new FormData();

            data.append('picture_front', this.postcard.picture_front);
            data.append('picture_back', this.postcard.picture_back);
            data.append('title', this.postcard.title);
            data.append('description', this.postcard.description);
            data.append('assignment_id', this.postcard.assignment_id);
            data.append('user_id', this.$root.user.user_id);

            axios
                .post('api/postcards', data)
                .then(response => {
                    this.cancel();
                });
        },
        cancel(){
            this.postcard = {
                title: '',
                description: '',
                assignment_id: 1,
                picture_front: 'path to picture_front',
                picture_back: 'path to picture_back',
            };
            this.postcardBackPreview = null;
            this.postcardFrontPreview = null;
            this.editor = !this.editor;
        },
        uploadFrontPicture(){
            const reader = new FileReader();
            reader.onload = (e) => {
                this.postcardFrontPreview = e.target.result;
            };
            reader.readAsDataURL(this.$refs.postcardFront.files[0]);
            this.postcard.picture_front = this.$refs.postcardFront.files[0];
            console.log(this.postcard.picture_front)
        },
        uploadBackPicture(){
            const reader = new FileReader();
            reader.onload = (e) => {
                this.postcardBackPreview = e.target.result;
            };
            reader.readAsDataURL(this.$refs.postcardBack.files[0]);
            this.postcard.picture_back = this.$refs.postcardBack.files[0];
            console.log(this.postcard.picture_back)
        },
        selectFrontPicture() {
            this.$refs.postcardFront.click();
        },
        selectBackPicture() {
            this.$refs.postcardBack.click();
        },
    },
}
</script>

<style>

</style>
