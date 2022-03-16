<template>
    <div>
        <div v-for="postcard in postcards" class="bg-gray-100 pl-8 pr-8 rounded-xl shadow-lg">
            <postcard :postcard="postcard"></postcard>
            <comments></comments>
        </div>
    </div>
</template>

<script>
import Postcard from "./Postcard";
import Comments from "./Comments";

export default {
    props: ['postcards'],
    components: {
        Postcard,
        Comments,
    },
}
</script>
