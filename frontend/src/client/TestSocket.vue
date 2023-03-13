<template>

  <span id="session-id" data-user="yassine"></span>

</template>

<script>
  // import '../../node_modules/socket.io/client-dist/socket.io.min'

  // export default {
  //   mounted () {
  //     const socket = io('http://localhost:3000')

  //     let connectedUsers = []

  //     let sessionState = () => {
  //       const sessionId = document.querySelector('#session-id')

  //       socket.emit('session', {
  //         userConnected: sessionId.dataset.user
  //       })
  //     }

  //     let connected = () => {
  //       socket.on('connected', function(users) {
  //         connectedUsers = uniqueUsers(users)
  //         console.log(connectedUsers);
  //       })
  //     }

  //     let uniqueUsers = (users) => {
  //         return users.reduce((acc, user) => {

  //         if (!acc.find(u => u.pseudo === user.pseudo)) {
  //           acc.push(user)
  //         }

  //         return acc
  //       }, [])
  //     }
      //
      // let renderConnectedUsers = () => {
      //   document.querySelector('#list-users').innerHTML += connectedUsers.map(user =>
      //     `<li id="${user.id}">
      //         <i class="fa fa-circle connected mr-2" aria-hidden="true"></i> ${user.pseudo}
      //     </li>`
      //   )
      // }
      //
      // let disconnected = () => {
      //   socket.on('disconnectedU', users => {
      //     connectedUsers = uniqueUsers(users)
      //     renderConnectedUsers()
      //   })
      // }

      // sessionState()
      // connected()
      // disconnected()
    //   }
    // }

</script>

<style>

</style>

