// Routes
import Dashboard from "./components/Dashboard";
import CategoryIndex from "./components/categories/CategoryIndexComponent";
export const routes = [
    {
        path: "/",
        component: Dashboard
    },
    {
        path: "/categories",
        component: CategoryIndex
    }
];
