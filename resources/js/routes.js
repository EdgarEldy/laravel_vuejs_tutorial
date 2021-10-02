// Routes
export const routes = [
    {
        path: "/",
        component: require('./components/Dashboard').default
    },
    {
        path: "/categories",
        component: require('./components/categories/category-component').default
    },
    {
        path: "/products",
        component: require('./components/products/product-component').default
    },
    {
        path: "/customers",
        component: require('./components/customers/customer-component').default
    }
];
