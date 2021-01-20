import { router } from "@/store/module/router";
import { user } from "@/store/module/user";
import { createApp } from "vue";
import Vuex from "vuex";
import VuexPersistence from "vuex-persist";
import App from "../App.vue";

createApp(App).use(Vuex);

const vuexLocal = new VuexPersistence({
  storage: window.localStorage,
  modules: ["user"],
});

export const store = new Vuex.Store({
  modules: {
    user,
    router,
  },
  plugins: [vuexLocal.plugin],
});
