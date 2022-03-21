<template>
    <div class="min-h-screen flex flex-col justify-center py-12 sm:px-6 lg:px-8">
      <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">Регистрация</h2>
      </div>

      <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
          <form class="space-y-6">
            <div>
              <label for="email" class="block text-sm font-medium text-gray-700">Имя</label>
              <div class="mt-1">
                <input id="name" v-model.trim="name" @submit.prevent="nameErrors" name="name" type="text" required="" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" :class="$v.name.$error ? 'border-red-400' : 'border-gray-300'">
                <p v-if="$v.name.$error" class="text-gray-400 text-sm	mt-1">{{ nameErrors[0] }}</p>
              </div>
            </div>

           <div>
              <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
              <div class="mt-1">
                <input id="email" v-model.trim="email" @submit.prevent="emailErrors" name="email" type="email" autocomplete="email" required="" class="appearance-none block w-full px-3 py-2 border  rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" :class="$v.email.$error ? 'border-red-400' : 'border-gray-300'" >
                <p v-if="$v.email.$error" class="text-gray-400 text-sm	mt-1">{{ emailErrors[0] }}</p>
              </div>
            </div>

            <div>
              <label for="password" class="block text-sm font-medium text-gray-700">Пароль</label>
              <div class="mt-1">
                <input id="password" v-model.trim="password" @submit.prevent="passwordErrors" name="password" type="password" autocomplete="current-password" required="" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" :class="$v.password.$error ? 'border-red-400' : 'border-gray-300'">
                <p v-if="$v.password.$error" class="text-gray-400 text-sm	mt-1">{{ passwordErrors[0] }}</p>
              </div>
            </div>

            <div class="flex items-center justify-between">
              <div class="flex items-center">
                <input id="remember_me" name="remember_me" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                <label for="remember_me" class="ml-2 block text-sm text-gray-900">Запомнить</label>
              </div>

              <!-- <div class="text-sm">
                <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">Забыли пароль ?</a>
              </div> -->
            </div>

            <div>
              <button @click.prevent="checkForm" type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Регистрация</button>
            </div>
          </form>
        </div>
      </div>
    </div>
</template>

<script>
import { validationMixin } from 'vuelidate'
// import Modals from './Modals'
const { required, minLength, email } = require('vuelidate/lib/validators')

export default {
    name: "Registration",
    mixins: [validationMixin],

    data() {
        return {
            name:null,
            email:null,
            password:null
        }
    },
    

    validations: {
      name: {
        // required,
        minLength: minLength(2),
      },
      email: {
        required, 
        email
      },
      password: {
        required, 
        minLength: minLength(6)
      }
    },

    computed: {
      nameErrors() {
        const errors = [];
        // if (!this.$v.name.required) errors.push('Обязательное поле для заполенения')
        if (!this.$v.name.minLength) errors.push('Имя должно быть не менее 2 символов')
        // if (!this.$v.name.alphaNum) errors.push('Имя должно состоять только из букв')
        return errors;
      },
      emailErrors() {
        const errors = [];
        if (!this.$v.email.required) errors.push('Обязательное поле для заполенения')
        if (!this.$v.email.email) errors.push('Неправильный формат почты')
        return errors;
      },
      passwordErrors() {
        const errors = [];
        if (!this.$v.password.required) errors.push('Обязательное поле для заполенения')
        if (!this.$v.password.minLength) errors.push('Пароль должен быть не менее 6 символов')
        return errors;
      }
    },


    methods: {
        register() {
            axios.get('/sanctum/csrf-cookie')
                .then(response => {
                    axios.post('/register', {email: this.email, password: this.password, name: this.name})
                        .then(res => {
                            console.log(res);
                        })
                })
                .catch(error => {
                  console.log(error);
                  this.errored = true;
                })
        },

        checkForm() {
          this.$v.$touch()
          if (!this.$v.$error) {
            console.log("Valid success");
            this.register()
          }
        }
    },

       
}
</script>

<style scoped>

</style>