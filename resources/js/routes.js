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
    }
];
