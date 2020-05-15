<template>
  <v-app-bar app class="app-header">
    <div class="d-flex align-center">
      <v-img alt="2BNB Logo" class="shrink mr-2" contain src="images/2bnb-logo.png" width="40" />
      <span class="mr-1">2nd Brigade Nord Battalion</span>
    </div>

    <v-spacer></v-spacer>

    <v-btn href="https://github.com/vuetifyjs/vuetify/releases/latest" target="_blank" text>
      <span class="mr-2">Latest Release</span>
      <v-icon>mdi-open-in-new</v-icon>
    </v-btn>
  </v-app-bar>
</template>

<script>
export default {
  name: "Header",

  components: {
    //
  },

  data: () => ({
    //
  })
};
</script>
