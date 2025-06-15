<template>
  <div>
    <h2>Hello from VueJS Component!</h2>
    <button @click="incrementCounter" class="mt-2 px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
      Click me (VueJS)
    </button>
    <p class="mt-2 text-gray-700">You clicked {{ counter }} times.</p>
  </div>
</template>

<script>
export default {
  data() {
    return {
      counter: 0,
    };
  },
  methods: {
    incrementCounter() {
      this.counter++;
    },
  },
};
</script>

<style scoped>
</style>
