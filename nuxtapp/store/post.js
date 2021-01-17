export const state = () => ({
  post: []
});

export const mutations = {
  setPost(state, post) {
    state.post = post;
  }
};

export const getters = {
  getPost(state) {
    return state.post;
  }
};
