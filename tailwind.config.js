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
  variants: {},
  plugins: [
    require('@tailwindcss/ui'),
  ],
}
