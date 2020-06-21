<template>
  <div class="main-layout">
    <navbar />

    <div class="container mt-4 bg-red">
      <child class=" child" />
    </div>
  </div>
</template>

<script>
import Navbar from '~/components/Navbar'

export default {
  name: 'MainLayout',

  components: {
    Navbar
  }
}
</script>
<style lang="scss">
.main-layout {
  color: #636b6f;
  height: 100vh;
  // font-weight: 100;
  position: relative;
}
</style>