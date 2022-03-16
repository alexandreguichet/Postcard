<template>
    <div class=" max-w-5xl m-auto">
        <tiptap></tiptap>
        <postcards :postcards="postcards"></postcards>
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
            postcards: [],
        }
    },
    mounted() {
        console.log('Feed is mounted!')

        axios
            .get('/api/postcards')
            .then(response => {
                for(const postcard of response.data.postcards){
                    this.postcards.push(postcard);
                }
                console.log(this.postcards)
            });

    }
}
</script>

<style>

</style>
