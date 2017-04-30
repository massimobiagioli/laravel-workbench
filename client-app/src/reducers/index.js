import {combineReducers} from 'redux'
import counter from './counter'
import machine from './machine'

const rootReducer = combineReducers({
  counter,
  machine
})

export default rootReducer
