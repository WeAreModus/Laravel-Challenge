const { colors } = require('tailwindcss/defaultTheme');

module.exports = {
  purge: [],
  theme: {
    extend: {
        colors: {
            primary: colors.indigo
        }
    },
  },
  variants: {
    borderWidth: ['responsive', 'odd', 'even', 'hover', 'focus'],
    backgroundColor: ['responsive', 'odd', 'even', 'hover', 'focus'],
  },
  plugins: [
    require('@tailwindcss/ui'),
  ],
}
