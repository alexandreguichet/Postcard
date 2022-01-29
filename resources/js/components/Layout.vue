<template>
    <div>
        <dashboard-navigation></dashboard-navigation>
        <div class="text-4xl font-bold text-red-300 flex justify-center mt-4">
            Hello World
        </div>
    </div>
</template>

<script>
import DashboardNavigation from './Navigation';

export default {
    components: {
        DashboardNavigation,
    },
    mounted() {
        console.log('Component mounted.')
    }
}
</script>
