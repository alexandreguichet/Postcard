<template>
    <div>
        <dashboard-navigation></dashboard-navigation>
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
