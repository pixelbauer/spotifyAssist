/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./templates/**/*.{html,twig}",
    "./src/**/*.php"
  ],
  theme: {
    extend: {
      colors: {
        // Füge hier Custom-Colors hinzu
      },
      spacing: {
        // Füge hier Custom-Spacing hinzu
      }
    },
  },
  plugins: [],
}
