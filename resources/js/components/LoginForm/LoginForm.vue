<template>
    <div class="col form">
        <div class="row">
            <div class="col d-flex justify-content-center">
                <label for="form"><h2><b>Login</b></h2></label>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form id="form" @submit.prevent>
                   <registration-form-input
                        :label="'Email'"
                        :type="'email'"
                        :placeholder="'Enter your email'"
                        @onUpdate="this.updateEmail"
                   />
                    <registration-form-input
                        :label="'Password'"
                        :type="'password'"
                        :placeholder="'Password your email'"
                        @onUpdate="this.updatePassword"
                    />

                    <div class="row err mt-2" v-if="this.err !== ''">
                        <small>
                            {{this.err}}
                        </small>
                    </div>

                    <div class="row">
                        <div class="col button d-flex justify-content-center">
                            <my-button
                                :func="submit"
                            >Sign in
                            </my-button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import RegistrationFormInput from "../RegistartionForm/RegistrationFormInput.vue";
import MyButton from "../UI/MyButton.vue";
export default {
    name: "RegistrationForm",
    components: {
        RegistrationFormInput,
        MyButton
    },

    data() {
        return {
            email: '',
            password: '',
            err: ''
        }
    },

    methods: {
        updateEmail(email) {
            this.email = email
        },

        updatePassword(password) {
            this.password = password
        },

        async submit() {
            const response = await axios.get('/login/log', {
                params: {
                    email: this.email,
                    password: this.password,
                }
            })
                .then((response) => {
                    window.location.replace(response.data)
                })
                .catch((err) => {
                    this.err = err.response.data.message
                    setTimeout(() => {
                        this.err = ''
                    }, 3000)
                })
        }

    }
}
</script>

<style scoped>
.form {
    padding: 40px;
}

.err small {
    text-align: center;
    margin-left: 50px;
    width: 150px;
    padding: 2px;
    margin-bottom: 5px;
    color: red;
}
</style>
