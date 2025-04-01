const flowbite = require("flowbite/plugin");

module.exports = {
  content: [
    "./index.html",
    "./src/**/*.{js,ts,jsx,tsx}",
    "node_modules/flowbite-react/**/*.{js,ts,jsx,tsx}",
  ],
  theme: {
    extend: {
      colors: {
        primary: "#ffdd00",
        accent: "#ffdd00",
        bgPrimary: "#ffffff",
      },
      fontFamily: {
        jost: ["Jost", "sans-serif"],
      },
    },
  },
  plugins: [flowbite],
};
