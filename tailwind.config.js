const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },

        },
    // screens: {
    //         'tablet': '640px',
    //         // => @media (min-width: 640px) { ... }

    //         'laptop': '1024px',
    //         // => @media (min-width: 1024px) { ... }

    //         'desktop': '1400px',
    //         // => @media (min-width: 1280px) { ... }
    //     },
    },

    plugins: [require('@tailwindcss/forms')],
};
