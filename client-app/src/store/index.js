import Vue from 'vue'
import Revue from 'revue'
import {createStore, applyMiddleware, compose} from 'redux'
import logger from 'redux-logger'
import persistState from 'redux-localstorage'
import {apiMiddleware} from 'redux-api-middleware'
import actions from '../actions'
import reducers from '../reducers'

const enhancer = compose(
  persistState('machine', {key: 'prototipo-vue-redux'})
)

const reduxStore = createStore(
  reducers,
  applyMiddleware(logger, apiMiddleware),
  enhancer
)

const store = new Revue(Vue, reduxStore, actions)

export default store
