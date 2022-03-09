<template>
    <div>
        <dashboard-navigation></dashboard-navigation>
        <div class="text-4xl font-bold text-red-300 flex justify-center mt-4">
            Hello World
        </div>
        <feed></feed>
    </div>
</template>

<script>
import DashboardNavigation from './Navigation';
import Feed from './Feed';

export default {
    components: {
        DashboardNavigation,
        Feed,
    },
    mounted() {
    }
}
</script>
