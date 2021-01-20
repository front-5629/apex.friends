export const state = () => ({
  flag: "posts"
});

export const mutations = {
  setPost(state, setFlag) {
    state.flag = setFlag;
  }
};

export const getters = {
  getPost(state) {
    return state.flag;
  }
};
