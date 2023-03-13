export default class UserStore {

    constructor () {
        this.state = {
            isConnected: false
        }
    }

    getIsConnected() {
        const user = JSON.parse(localStorage.getItem('user'))
  
        console.log(user)
  
        return user ? this.state.isConnected = true : this.state.isConnected
    }
}
