<template>
    <div class=" max-w-5xl m-auto">
        <div class="mt-8 text-center">
            <span class="text-red-300 text-4xl font-bold">The feed starts bellow</span>
        </div>
        <tiptap></tiptap>
        <postcards :postcards="items"></postcards>
    </div>
</template>

<script>
import Postcards from "./Postcards";
import Tiptap from "./Tiptap";

export default {
    components: {
        Postcards,
        Tiptap,
    },
    data: function () {
        return {
            items: [
                {title: 'Postcard1', description: 'Text for Postcard1, Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', picture_front: '/images/picture_front.jpg', picture_back: '/images/picture_back.jpg'},
                {title: 'Postcard2', description: 'Text for Postcard2, Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', picture_front: '/images/picture_front.jpg', picture_back: '/images/picture_back.jpg'},
                {title: 'Postcard3', description: 'Text for Postcard3, Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', picture_front: '/images/picture_front.jpg', picture_back: '/images/picture_back.jpg'},
                {title: 'Postcard4', description: 'Text for Postcard4, Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', picture_front: '/images/picture_front.jpg', picture_back: '/images/picture_back.jpg'},
            ],
        }
    },
    mounted() {
        console.log('Feed is mounted!')

        axios
            .get('/api/postcards')
            .then(response => (
                this.postcards = response,
                console.log(this.postcards)
            ));

    }
}
</script>

<style>

</style>
