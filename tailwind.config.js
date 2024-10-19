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
                    color: '#000000',
                },
            });
        },
    ],
    darkMode: 'selector',
}
