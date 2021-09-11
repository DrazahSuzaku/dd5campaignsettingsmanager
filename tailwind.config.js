module.exports = {
  purge: [],
  darkMode: false, // or 'media' or 'class'
  theme: {
    minHeight: {
      '0': '0',
      '1/4': '25%',
      '1/2': '50%',
      '3/4': '75%',
      'full': '100%',
    },
    fontFamily: {
      'sans': ["Roboto", "ui-sans-serif", "system-ui", "-apple-system", "BlinkMacSystemFont", "Segoe UI",  "Helvetica Neue", "Arial", "Noto Sans", "sans-serif", "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji"]
    },
    extend: {
      backgroundImage: theme => ({
        'flowers': "url('../img/flowers.png')"
      }),
    },

  },
  variants: {
    opacity: ({ after }) => after(['disabled'])
  },
  plugins: [],
}
