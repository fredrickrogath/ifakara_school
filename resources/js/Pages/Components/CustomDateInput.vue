<template>
    <div>
      <input type="date" v-model="date" class="form-control" @input="emitInput" />
    </div>
  </template>
  
  <script>
  export default {
    props: {
      value: {
        type: String,
        required: true,
      },
    },
    data() {
      return {
        date: this.value,
      };
    },
    methods: {
      emitInput() {
        this.$emit("input", this.date);
      },
    },
  };
  </script>
  