<template>
  <v-app>
    <Header />
    <v-content>
      <HelloWorld />
    </v-content>
  </v-app>
</template>

<script>
import Header from "../components/basic/Header";

export default {
  name: "App",

  components: {
    Header
  },

  data: () => ({
    //
  })
};
</script>
