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
        axios
            .get('/api/postcards/')
            .then(response => {
                for(const postcard of response.data.postcards){
                    this.postcards.push(postcard);
                }
            });
    },
    methods: {
        remove(postcard) {
            for(let p of this.postcards){
                if(postcard.user_id == p.user_id && postcard.assignment_id == p.assignment_id){
                    const index = this.postcards.indexOf(p)
                    if(index > -1) {
                        this.postcards.splice(index, 1)
                    }
                }
            }
        },
    }
}
</script>

<style>

</style>
