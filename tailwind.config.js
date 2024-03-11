/** @type {import('tailwindcss').Config} config */
const config = {
  content: ['./app/**/*.php', './resources/**/*.{php,vue,js}'],
  theme: {
    extend: {
      colors: {
        'primary': '#C41740',
        'secondary': '#EA9C28',
      }, // Extend Tailwind's default colors
      fontFamily: {
        'graphik': ["Graphik"],
      }
    },
  },
  plugins: [],
};

export default config;
