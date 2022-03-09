<template>
    <div class="bg-gray-100 shadow-lg">
        <div v-if="!editor" @click="editor = !editor" class="text-center pl-8 pr-8 mt-10 p-6 font-bold text-xl cursor-pointer border border-gray-300 rounded-lg">
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
                assignment_id: '0',
                picture_front: 'path to picture_front',
                picture_back: 'path to picture_back',
            }
        }
    },
    methods: {
        post(){
            //logic to insert postcard into table
            axios
                .post('api/postcards', this.postcard)
                .then(response => (
                    console.log('here')
                ));
        },
        cancel(){
            this.postcard = {
                title: '',
                description: '',
                assignment_id: '0',
                picture_front: 'path to picture_front',
                picture_back: 'path to picture_back',
            };
            this.editor = !this.editor;
        },
    },
}
</script>

<style>

</style>
