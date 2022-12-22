import { createRouter, createWebHistory } from "vue-router";
import Home from "../views/Home.vue";
import Detail from "../views/Detail.vue";
import AddPatient from "../views/AddPatient.vue";
import UpdatePatient from "../views/UpdatePatient.vue";

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: "/",
      name: "home",
      component: Home,
    },
    {
      path: "/add",
      name: "add",
      component: AddPatient,
    },
    {
      path: "/detail/:id",
      name: "detail",
      component: Detail,
    },
    {
      path: "/update/:id",
      name: "update",
      component: UpdatePatient,
    }
  ],
});

export default router;
