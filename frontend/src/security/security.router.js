import Login from './Login.vue'
import Home from '../views/Home.vue'

const routes =
    [
        {
            path: '/login',
            name: 'login',
            component: Login,
        },
        {
            path: '/logout',
            name: 'logout',
            redirect: to => {
                localStorage.removeItem('user')

                return { path: '/'}
            }
        },
    ]

export default routes