import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
    "./storage/framework/views/*.php",
    "./resources/views/**/*.blade.php",
    "node_modules/preline/dist/*.js",
  ],

  theme: {
    extend: {
      fontFamily: {
        sans: ["Jost", "sans-serif"],
      },

      fontSize: {
        heading: "2.25rem",
        subheading: "1.5rem",
        paragraph: "1rem",
      },

      letterSpacing: {
        tight: "-0.01em",
        normal: "0",
      },
      lineHeight: {
        heading: "2",
        paragraph: "1.75",
      },
    },
  },

  plugins: [forms],
};
