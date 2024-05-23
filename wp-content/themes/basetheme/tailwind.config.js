module.exports = {
  content: [
    "./*.php",
    "./templates/**/*.php",
    "./woocommerce/**/*.php",
    "./includes/basetheme-blocks-handler/**/*.php",
  ],
  safelist: [
    'underline', 'max-h-0', 'max-h-overmax', 'text-4xl', 'flex-wrap', 'items-center', 'justify-between',
    { // all margins
      pattern: /^\-?m(\w?)-/,
      variants: ['sm', 'md', 'lg', 'xl', '2xl'],
    },
    { // all paddings
      pattern: /^p(\w?)-/,
      variants: ['sm', 'md', 'lg', 'xl', '2xl'],
    },
    { // all width
      pattern: /^w(\w?)-/,
      variants: ['sm', 'md', 'lg', 'xl', '2xl'],
    },
    { // all height
      pattern: /^h(\w?)-/,
      variants: ['sm', 'md', 'lg', 'xl', '2xl'],
    },
  ],
  theme: {
    container: {
      md: '100%',
      center: true,
      padding: {
        DEFAULT: '1rem',
      },
    },
    fontFamily: {
      'primary': ['roboto', 'sans-serif'],
    },

    fontWeight: {
      light: '300',
      regular: '400',
      medium: '500',
      bold: '700',
      black: '900',
    },
    extend: {
      colors: {
        "caramel": "#FCD19C",
        "pale-aupe": "#BB9E80",
        "black": "#000",
        "white": "#fff",
      },

      fontSize: {
        '14px': '14px',
        '16px': '16px',
        '18px': '18px',
      },
      padding: {
        'px-0.5': '0.5px',
      },
      minWidth: {
        '500px': '500px',
      },
      maxWidth: {
        '100px': '100px',
      },
      height: {
        '500': '500px',
      },
      minHeight: {
        '500': '500px',
      },
      maxHeight: {
        '20vh': '20vh',
      },
    },
  },
  plugins: [],
};

//background: ;
