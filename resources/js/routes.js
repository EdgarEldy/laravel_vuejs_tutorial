// Routes
import Home from "./components/HomeComponent";
import CategoryIndex from "./components/categories/CategoryIndexComponent";
export const routes = [
    {
        path: "/",
        component: Home
    },
    {
        path: "/categories",
        component: CategoryIndex
    }
];
