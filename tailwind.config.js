// tailwind.config.js
export default {
  content: ["./index.html", "./src/**/*.{js,ts,jsx,tsx}"],
  theme: {
    extend: {
      fontFamily: {
        sans: ["Jost", "sans-serif"],
      },
      fontSize: {
        heading: "2.25rem", // Custom size for headings (h1)
        subheading: "1.5rem", // Custom size for subheadings (h2)
        paragraph: "1rem", // Custom size for paragraphs
      },
      letterSpacing: {
        tight: "-0.01em", // Custom letter-spacing for tight text
        normal: "0", // Normal letter-spacing
      },
      lineHeight: {
        heading: "2", // Custom line height for headings
        paragraph: "1.75", // Line height for paragraphs
      },
    },
  },
  plugins: [],
};
