module.exports = {
  theme: {
    pagination: theme => ({
      color: theme('colors.gray.900'),  
    }),
    extend: {}
  },
  variants: {},
  plugins: [
    require('tailwindcss-plugins/pagination'),
  ]
}
