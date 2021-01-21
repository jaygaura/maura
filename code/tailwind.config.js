module.exports = {
  future: {
    // removeDeprecatedGapUtilities: true,
    // purgeLayersByDefault: true,
  },
  purge: [
    './storage/framework/views/*.php',
    './resources/views/*.blade.php',
    './resources/views/**/*.blade.php',
    './resources/css/*.css',
  ],
  theme: {
    extend: {},
  },
  variants: {},
  plugins: [],
}
