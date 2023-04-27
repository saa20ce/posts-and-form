<template>
  <form @submit.prevent="onSubmit">
    <div>
      <label for="fullName">Full Name</label>
      <input type="text" id="fullName" v-model="fullName" :class="{ error: !validateFullName }">
      <span v-if="!validateFullName" class="error-message">Please enter a valid name.</span>
    </div>
    <div>
      <label for="phone">Phone Number</label>
      <input type="text" id="phone" v-model="phone" :class="{ error: !validatePhone }">
      <span v-if="!validatePhone" class="error-message">Please enter a valid phone number.</span>
    </div>
    <div>
      <label for="email">Email Address</label>
      <input type="email" id="email" v-model="email" :class="{ error: !validateEmail }">
      <span v-if="!validateEmail" class="error-message">Please enter a valid email address.</span>
    </div>
    <button type="submit" :disabled="!isValid">Submit</button>
  </form>
</template>

<script>
export default {
  data() {
    return {
      fullName: '',
      phone: '',
      email: '',
    };
  },
  computed: {
    validateFullName() {
      // регулярное выражение для проверки только букв в имени
      const regex = /^[a-zA-Z]+$/;
      return regex.test(this.fullName);
    },
    validatePhone() {
      // регулярное выражение для проверки 11 цифр в номере телефона
      const regex = /^\d{11}$/;
      return regex.test(this.phone);
    },
    validateEmail() {
      // регулярное выражение для проверки корректного email-адреса
      const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      return regex.test(this.email);
    },
    isValid() {
      return this.validateFullName && this.validatePhone && this.validateEmail;
    },
  },
  methods: {
    onSubmit() {
      // отправка данных на сервер
    },
  },
};
</script>

<style>
.error {
  border-color: red;
}
.error-message {
  color: red;
}
</style>
