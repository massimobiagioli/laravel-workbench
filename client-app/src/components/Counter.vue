<template>
  <v-container fluid class="text-xs-center">
    <v-row>
      <v-col xs12 sm6>
        <v-card>
          <v-card-row class="blue darken-1">
            <v-card-title>
              <span class="white--text">Counter</span>
            </v-card-title>
          </v-card-row>
          <v-card-text>
            <v-card-row>
              <div>
                <span>{{count}}</span>
              </div>
            </v-card-row>
            <v-card-row>
              <div>
                <v-btn light default v-on:click.native="handleIncrement">+</v-btn>
                <v-btn light default v-on:click.native="handleDecrement">-</v-btn>
              </div>
            </v-card-row>
          </v-card-text>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
  import store from '../store'
  import actions from '../actions'
  export default {
    name: 'counter',
    data () {
      return {
        count: this.$select('counter as count')
      }
    },
    methods: {
      handleIncrement () {
        store.dispatch(actions.counter.increment())
      },
      handleDecrement () {
        store.dispatch(actions.counter.decrement())
      }
    }
  }
</script>
