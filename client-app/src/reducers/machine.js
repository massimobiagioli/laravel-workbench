const MACHINE_INITIAL_STATE = {
  machineStatus: {
    ip: null,
    error: null,
    loading: false
  }
}

const machine = (state = MACHINE_INITIAL_STATE, action) => {
  switch (action.type) {
    case 'RETRIEVE_IP':
      return {...state, machineStatus: {ip: null, error: null, loading: true}}
    case 'RETRIEVE_IP_SUCCESS':
      return {...state, machineStatus: {ip: action.payload.ip, error: null, loading: true}}
    case 'RETRIEVE_IP_FAILURE':
      const error = action.payload.data || {message: action.payload.message}
      return {...state, machineStatus: {ip: null, error, loading: true}}
    default:
      return state
  }
}

export default machine
