<template>
  <v-app id="demo" left-fixed-sidebar>
    <v-toolbar>
      <v-toolbar-side-icon @click.native.stop="nav2 = !nav2" />
      <v-toolbar-logo>Prototipo</v-toolbar-logo>
    </v-toolbar>
    <main>
      <v-sidebar left fixed drawer v-model="nav2">
        <v-list>
          <v-list-item>
            <v-list-tile>
              <v-list-tile-title><router-link to="/">Home</router-link></v-list-tile-title>
            </v-list-tile>
          </v-list-item>
          <v-list-item>
            <v-list-tile>
              <v-list-tile-title><router-link to="/counter">Counter</router-link></v-list-tile-title>
            </v-list-tile>
          </v-list-item>
          <v-list-item>
            <v-list-tile>
              <v-list-tile-title><router-link to="/machine">Machine</router-link></v-list-tile-title>
            </v-list-tile>
          </v-list-item>
        </v-list>
      </v-sidebar>
      <v-content>
        <router-view></router-view>
      </v-content>
    </main>
  </v-app>
</template>

<script>
export default {
  name: 'app',
  data () {
    return {
      nav2: false
    }
  }
}
</script>

<style lang="stylus">
  @import './stylus/main'
</style>
