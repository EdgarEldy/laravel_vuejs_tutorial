// Routes
import CategoryIndex from "./components/categories/CategoryIndexComponent";
export const routes = [
    {
        path: "/",
        component: require('./components/Dashboard').default
    },
    {
        path: "/categories",
        component: CategoryIndex
    }
];
