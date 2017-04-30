import {CALL_API} from 'redux-api-middleware'

export const RETRIEVE_IP = 'RETRIEVE_IP'
export const RETRIEVE_IP_SUCCESS = 'RETRIEVE_IP_SUCCESS'
export const RETRIEVE_IP_FAILURE = 'RETRIEVE_IP_FAILURE'

const machineActions = {
  scan () {
    return {
      [CALL_API]: {
        types: [RETRIEVE_IP, RETRIEVE_IP_SUCCESS, RETRIEVE_IP_FAILURE],
        endpoint: 'https://api.ipify.org/?format=json',
        method: 'GET'
      }
    }
  }
}

export default machineActions
