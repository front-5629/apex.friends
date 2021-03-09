import { shallowMount, createLocalVue } from "@vue/test-utils";
import Vuex from "vuex";
import Vuetify from "vuetify";
import index from "../../pages/index";
import postFlag from "../../store/postFlag";

const localVue = createLocalVue();
localVue.use(Vuex);
localVue.use(Vuetify);

describe("pages/index.vueとstore/postFlag.jsのテスト", () => {
  let state;
  let store;
  let vuetify;

  beforeEach(() => {
    state = {
      flag: "posts"
    };

    store = new Vuex.Store({
      modules: {
        postFlag: {
          state
        }
      }
    });

    vuetify = new Vuetify();
  });

  it("クラブボタンを押した時にstateにclubsがセットされる", () => {
    const wrapper = shallowMount(index, { store, localVue });
    const button = wrapper.find(sel("clubs-btn"));
    button.trigger("click");
    expect(postFlag.state).toBe("clubs");
  });
});
