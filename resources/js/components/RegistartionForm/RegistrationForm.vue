<template>
    <div class="col form">
        <div class="row">
            <div class="col d-flex justify-content-center">
                <label for="form"><h2><b>Registration</b></h2></label>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form id="form" @submit.prevent>
                    <registration-form-input
                        :label="'Email'"
                        :type="'email'"
                        :placeholder="'Enter your e-mail'"
                        @onUpdate="this.updateEmail"
                    />
                    <registration-form-input
                        :label="'Name'"
                        :type="'text'"
                        :placeholder="'Enter your name'"
                        @onUpdate="this.updateName"
                    />
                    <registration-form-input
                        :label="'Phone number'"
                        :type="'text'"
                        :placeholder="'Enter your phone number'"
                        @onUpdate="this.updatePhoneNumber"
                    />
                    <registration-form-input
                        :label="'Password'"
                        :type="'password'"
                        :placeholder="'Enter your password'"
                        @onUpdate="this.updatePassword"
                    />
                    <registration-form-input
                        :label="'Confirm password'"
                        :type="'password'"
                        :placeholder="'Confirm your password'"
                        @onUpdate="this.updateConfirmPassword"
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
                            >Sign up
                            </my-button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import RegistrationFormInput from "./RegistrationFormInput.vue";
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
                confirm_password: '',
                phone_number: '',
                name: '',
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

        updateConfirmPassword(password) {
            this.confirm_password = password
        },

        updatePhoneNumber(phoneNumber) {
            this.phone_number = phoneNumber
        },

        updateName(name) {
            this.name = name
        },

        async submit() {
            const response = await axios.get('/registration/reg', {
                params: {
                    email: this.email,
                    password: this.password,
                    confirmPassword: this.confirm_password,
                    phoneNumber: this.phone_number,
                    name: this.name,
                }
            })
                .then((response) => {
                    alert('Registration successful !')
                })
                .catch((err) => {
                    console.log(err)
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
