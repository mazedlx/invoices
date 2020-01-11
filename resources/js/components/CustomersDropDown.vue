<template>
  <div class="flex flex-col">
    <button @click="isVisible = !isVisible">
      Customers
    </button>
    <button
      v-if="isVisible"
      @click="isVisible = false"
      tabindex="-1"
      class="fixed inset-0 h-full w-full bg-black opacity-25 cursor-default"
    ></button>
    <div
      v-show="isVisible"
      class="flex flex-col absolute z-10 mt-6 bg-white border border-gray-900 border-2 rounded-lg"
    >
      <a
        class="block text-gray-900 hover:bg-gray-900 hover:text-white px-4 py-2"
        :href="route('customers.create')"
      >New Customer</a>
      <a
        class="block text-gray-900 hover:bg-gray-900 hover:text-white px-4 py-2"
        :href="route('customers.index')"
      >All Customers</a>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      isVisible: false,
    }
  }
}
</script>