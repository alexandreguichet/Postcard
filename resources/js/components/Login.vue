<template>
    <div class="float-right flex" v-if="isLogin == false">
        <div v-if="!this.$root.user" class="items-center flex">
            <button class="text-xl text-gray-50" @click.prevent="userType='student', isLogin=true">LOGIN STUDENT</button>
            <button class="text-xl text-gray-50 ml-4" @click.prevent="userType='teacher', isLogin=true">LOGIN TEACHER</button>
            <button class="text-xl text-gray-50 ml-4 mr-4" @click.prevent="userType='ta', isLogin=true">LOGIN TA</button>
        </div>
        <div v-else class="items-center flex">
            <div class="text-xl text-gray-50 mr-4">
                Welcome Back {{$root.user.user_name}}
            </div>
        </div>
    </div>
    <div class="float-right flex items-center" v-else>
        <div class="text-xl text-gray-50 font-bold">{{capUserType}} login</div>
        <div class="text-gray-50 ml-5 italic">email</div>
        <input class="ml-3 p-1 rounded-lg" v-model="email">
        <div class="text-gray-50 ml-5 italic">password</div>
        <input class="ml-3 p-1 rounded-lg" v-model="password">
        <button type="button" @click="login()"
                class="bg-blue-100 border border-indigo-400 rounded-md shadow-sm py-2 px-4 ml-4 inline-flex justify-center text-sm font-medium
                    hover:bg-blue-200">
            <span>Login</span>
        </button>
        <button type="button" @click.prevent="cancel()"
                class="bg-red-100 border border-red-400 rounded-md shadow-sm py-2 px-4 ml-4 inline-flex justify-center text-sm font-medium
                    hover:bg-red-200">
            <span>Cancel</span>
        </button>
    </div>
</template>

<script>
export default {
    data: function () {
        return {
            userType: 'student',
            email: 'test@gmail.com',
            password: 'password',
            isLogin: false,
        }
    },
    computed: {
        capUserType: function() {
            return this.userType.charAt(0).toUpperCase() + this.userType.slice(1);
        }
    },
    methods: {
        login(){
            axios
                .get('/api/login', {params: {email: this.email, password: this.password, userType: this.userType}})
                .then(response => {
                    this.$root.login(response.data);
                    this.cancel();
                });
        },
        cancel(){
            this.userType = 'student';
            this.email = 'test@gmail.com';
            this.password = 'password';
            this.isLogin = false;
        }
    }
}
</script>

<style>

</style>
