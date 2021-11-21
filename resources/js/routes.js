import Home from './components/Home';
import Warehouses from './components/Warehouses';
import Warehouse from './components/Warehouse';
import Books from './components/Books';
import Book from './components/Book';
import Clients from './components/Clients';
import Client from './components/Client';
import Orders from './components/Orders';
import Order from './components/Order';

export default {
    routes: [
        {
            path: '/',
            component: Home
        },
        {
            path: '/warehouses',
            component: Warehouses
        },
        {
            path: '/warehouse/:id',
            component: Warehouse
        },
        {
            path: '/books',
            component: Books
        },
        {
            path: '/book/:id',
            component: Book
        },
        {
            path: '/clients',
            component: Clients
        },
        {
            path: '/client/:id',
            component: Client
        },
        {
            path: '/orders',
            component: Orders
        },
        {
            path: '/order/:id',
            component: Order
        }
    ]
}