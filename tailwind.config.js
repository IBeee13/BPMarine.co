/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  theme: {
    extend: {
      keyframes: {
            shimmer: {
                '0%':   { transform: 'translateX(-100%) skewX(-12deg)' },
                '100%': { transform: 'translateX(300%) skewX(-12deg)' },
            },
      },
      fontFamily: {
        cormorant: ['Cormorant Garamond', ...defaultTheme.fontFamily.serif],
        sans: ['Jost', 'sans-serif'],
      },
      backgroundImage: {
        'grid-dashed': `
                repeating-linear-gradient(to right, #d1c9b8 0px, #d1c9b8 1px, transparent 1px, transparent 250px),
                repeating-linear-gradient(to bottom, #d1c9b8 0px, #d1c9b8 1px, transparent 1px, transparent 250px)
            `,
      },
    },
  },
  plugins: [],
}