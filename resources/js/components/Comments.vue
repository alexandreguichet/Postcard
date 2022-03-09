<template>
    <div>
        <div v-for="comment in comments">
            <comment :comment="comment"></comment>
        </div>
    </div>
</template>

<script>
import Comment from "./Comment";

export default {
    props: ['comments'],
    components: {
        Comment,
    },
}
</script>
