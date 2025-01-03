/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
    ],
    theme: {
        extend: {},
    },
    plugins: [
        function ({ addBase }) {
            addBase({
                'input': {
                    'color': '#000000',
                    'border-radius': '4px',
                    'padding': '.25rem .5rem',
                    'font-size': '1rem',
                    'font-weight': 'normal',
                },
                'input:focus-visible, input:focus': {
                    '@apply border-blue-500': '',
                    outline: 'none',
                },
            });
        },
    ],
    darkMode: 'selector',
}
