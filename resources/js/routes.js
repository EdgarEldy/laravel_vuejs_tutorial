// Routes
export const routes = [
    {
        path: "/",
        component: require('./components/Dashboard').default
    },
    {
        path: "/categories",
        component: require('./components/categories/category-component').default
    }
];
