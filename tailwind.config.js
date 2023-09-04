const colors = require('tailwindcss/colors');

module.exports = {
  mode: 'jit',
  purge: [
    './resources/**/*.blade.php',
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      fontFamily: {
        'noto-sans-kr': ['Noto Sans KR', 'sans-serif'],
        'poppins': ['Poppins', 'sans-serif'],
      },
      colors: {
        'true-gray': colors.trueGray,
        'violet': colors.violet,
        'lime': colors.lime,
        'cyan': colors.cyan,
        'fuchsia': colors.fuchsia,
      }  
    },
  },
  variants: {
    extend: {},
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}
