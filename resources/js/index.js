import {createWebHistory, createRouter} from "vue-router";

import Home from '../pages/Home';
import About from '../pages/About';
import Register from '../pages/Register';
import Login from '../pages/Login';
import Dashboard from '../pages/Dashboard';

import Uers from '../components/users/User';
// import AddBook from '../components/AddBook';
// import EditBook from '../components/EditBook';

export const routes = [
    {
        name: 'home',
        path: '/',
        component: Home
    },
    
    {
        name: 'register',
        path: '/register',
        component: Register
    },
    {
        name: 'login',
        path: '/login',
        component: Login
    },
    {
        name: 'dashboard',
        path: '/dashboard',
        component: Dashboard
    },
    {
        name: 'users',
        path: '/users',
        component: Users
    },
    // {
    //     name: 'addbook',
    //     path: '/books/add',
    //     component: AddBook
    // },
    // {
    //     name: 'editbook',
    //     path: '/books/edit/:id',
    //     component: EditBook
    // },
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

export default router;
