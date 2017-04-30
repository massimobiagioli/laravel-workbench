<template>
  <v-container fluid class="text-xs-center">
    <v-row>
      <v-col xs12 sm6>
        <v-card>
          <v-card-row class="blue darken-1">
            <v-card-title>
              <span class="white--text">Machine</span>
            </v-card-title>
          </v-card-row>
          <v-card-text>
            <v-card-row>
              <div>
                <span>IP Address: </span><span>{{machine.machineStatus.ip}}</span>
              </div>
            </v-card-row>
            <v-card-row>
              <div>
                <v-btn light default v-on:click.native="scan">Scan</v-btn>
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
    name: 'machine',
    data () {
      return {
        machine: this.$select('machine as machine')
      }
    },
    methods: {
      scan () {
        store.dispatch(actions.machine.scan())
      }
    }
  }
</script>
