import colors from "vuetify/es5/util/colors";

export default {
  // Target (https://go.nuxtjs.dev/config-target)
  ssr: true,
  target: "server",

  // Global page headers (https://go.nuxtjs.dev/config-head)
  head: {
    title: "【Apex Legends】クラブ・フレンド募集掲示板 | APEX FRIENDS",
    meta: [
      { charset: "utf-8" },
      {
        name: "google-site-verification",
        content: "lD9i9ovn8K1Tpl-c8GfhBlSpSt_VrOHK5NlS91hM81w"
      },
      { name: "viewport", content: "width=device-width, initial-scale=1" },
      { hid: "description", name: "description", content: "" }
    ],
    link: [{ rel: "icon", type: "image/x-icon", href: "/favicon.ico" }]
  },

  // Global CSS (https://go.nuxtjs.dev/config-css)
  css: [],

  // Plugins to run before rendering page (https://go.nuxtjs.dev/config-plugins)
  plugins: [],

  // Auto import components (https://go.nuxtjs.dev/config-components)
  components: true,

  // Modules for dev and build (recommended) (https://go.nuxtjs.dev/config-modules)
  buildModules: [
    // https://go.nuxtjs.dev/vuetify
    "@nuxtjs/vuetify"
  ],

  // Modules (https://go.nuxtjs.dev/config-modules)
  modules: ["@nuxtjs/axios", "@nuxtjs/proxy", "@nuxtjs/moment"],

  axios: {
    proxy: true
  },

  proxy: {
    // '/v1/': {
    //   target: "api/"
    // }
  },

  moment: {
    locales: ["ja"]
  },

  // Vuetify module configuration (https://go.nuxtjs.dev/config-vuetify)
  vuetify: {
    customVariables: ["~/assets/variables.scss"],
    theme: {
      dark: false,
      themes: {
        dark: {
          primary: colors.blue.darken2,
          accent: colors.grey.darken3,
          secondary: colors.amber.darken3,
          info: colors.teal.lighten1,
          warning: colors.amber.base,
          error: colors.deepOrange.accent4,
          success: colors.green.accent3
        },

        light: {
          background: colors.grey.lighten5,
          primary: colors.blue.darken2,
          accent: colors.grey.darken3,
          secondary: colors.amber.darken3,
          info: colors.teal.lighten1,
          warning: colors.amber.base,
          error: colors.deepOrange.accent4,
          success: colors.green.accent3
        }
      }
    }
  },

  // Build Configuration (https://go.nuxtjs.dev/config-build)
  build: {}
};
