<template>
    <div class="self-center">
        <div class="float-right flex" v-if="isLogin == false">
            <div v-if="!this.$root.user" class="items-center flex">
                <button class="text-xl text-gray-50" @click.prevent="userType='student', isLogin=true">LOGIN STUDENT</button>
                <button class="text-xl text-gray-50 ml-4" @click.prevent="userType='teacher', isLogin=true">LOGIN TEACHER</button>
                <button class="text-xl text-gray-50 ml-4" @click.prevent="userType='ta', isLogin=true">LOGIN TA</button>
                <button class="text-xl text-gray-50 ml-4 mr-4" @click.prevent="isCreating = true">SIGN UP</button>
            </div>
            <div v-else class="items-center flex">
                <div class="text-xl text-gray-50 mr-6">
                    Welcome back {{$root.user.name}}!
                </div>
            </div>
        </div>
        <div class="float-right flex items-center" v-else>
            <div class="text-xl text-gray-50 font-bold">{{capUserType}} login</div>
            <div class="text-gray-50 ml-5 mt-0.5 italic">email</div>
            <input class="ml-3 p-1 pl-2 rounded-lg" v-model="email">
            <div class="text-gray-50 ml-5 mt-0.5 italic">password</div>
            <input class="ml-3 p-1 pl-2 rounded-lg" v-model="password">
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
        <div v-if="isCreating == true" class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
                <span class="sm:inline-block sm:align-middle sm:h-screen">&#8203;</span>
                <div class="inline-block align-bottom bg-white dark:bg-gray-800 rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-3xl sm:w-full sm:p-6 z-50">
                    <div>
                        <div class="mr-4">
                            <div class="text-2xl font-bold text-center">Sign Up!</div>
                            <div class="mt-4 font-bold">User Type</div>
                            <div>
                                <select v-model="userType"
                                        class="block w-full bg-gray-100 rounded-md text-base shadow-sm focus:border-blue-600 focus:ring-blue-600">
                                    <option value="student">Student</option>
                                    <option value="teacher">Teacher</option>
                                    <option value="ta">TA</option>
                                </select>
                            </div>
                            <div v-if="userType=='teacher'">
                                <div class="mt-4 font-bold">Title</div>
                                <input class="p-2 pl-4 rounded-md border border-1 border-gray-500 bg-gray-100 w-full shadow-sm" v-model="title">
                            </div>
                            <div class="mt-4 font-bold">Name</div>
                            <input class="p-2 pl-4 rounded-md border border-1 border-gray-500 bg-gray-100 w-full shadow-sm" v-model="name">
                            <div v-if="userType=='student'">
                                <div class="mt-4 font-bold">Student Number</div>
                                <input class="p-2 pl-4 rounded-md border border-1 border-gray-500 bg-gray-100 w-full shadow-sm" v-model="student_number">
                            </div>
                            <div class="mt-4 font-bold">Email</div>
                            <input class="p-2 pl-4 rounded-md border border-1 border-gray-500 bg-gray-100 w-full shadow-sm" v-model="email">
                            <div class="mt-4 font-bold">Password</div>
                            <input class="p-2 pl-4 rounded-md border border-1 border-gray-500 bg-gray-100 w-full shadow-sm" v-model="password">
                            <div class="flex mt-6 float-right">
                                <button type="button" @click="create()"
                                        class="bg-blue-100 border border-indigo-400 rounded-md shadow-sm py-2 px-4 ml-4 inline-flex justify-center text-sm font-medium
                                    hover:bg-blue-200">
                                    <span>Sign Up</span>
                                </button>
                                <button type="button" @click.prevent="cancelCreate()"
                                        class="bg-red-100 border border-red-400 rounded-md shadow-sm py-2 px-4 ml-4 inline-flex justify-center text-sm font-medium
                                        hover:bg-red-200">
                                    <span>Cancel</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data: function () {
        return {
            userType: 'student',
            email: 'test@gmail.com',
            password: 'password',
            student_number: '12345678',
            name: 'Bob',
            title: 'P.eng',
            isLogin: false,
            isCreating: false,
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
                .get('/api/login', {params: { email: this.email, password: this.password, userType: this.userType}})
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
        },
        create() {
            axios
                .post('/api/signup', {
                    email: this.email,
                    password: this.password,
                    userType: this.userType,
                    name: this.name,
                    student_number: this.student_number,
                    title: this.title})
                .then(response => {
                    this.$root.login(response.data);
                    this.cancelCreate();
                });
        },
        cancelCreate() {
            this.isCreating = false;
        },
    }
}
</script>

<style>

</style>
