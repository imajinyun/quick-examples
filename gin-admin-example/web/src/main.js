import router from "@/router/index";
import { store } from "@/store/index";
import ElementUI from "element-ui";
import "element-ui/lib/theme-chalk/index.css";
import { createApp } from "vue";
import App from "./App.vue";

ElementUI.Dialog.props.closeOnClickModal.default = false;

createApp(App)
  .use(ElementUI)
  .use(router)
  .use(store)
  .mount("#app");
