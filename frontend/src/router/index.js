import { createRouter, createWebHashHistory } from 'vue-router'
import Home from '../views/Home.vue'

import userRouter from '../views/user/user.router'
import securityRouter from '../security/security.router'

const routes =
    [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        ...securityRouter,
        ...userRouter,
    ]

const router = createRouter({
    history: createWebHashHistory(import.meta.env.BASE_URL),
    routes
})

export default router

/* Autre façon de faire */
// route level code-splitting
// this generates a separate chunk (About.[hash].js) for this route
// which is lazy-loaded when the route is visited.
// component: () => import('')