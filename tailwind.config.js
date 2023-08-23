const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                lato: ['Lato'],
                handjet: ['Handjet'],
            },
            colors: {
                greenPrimary: "#617A55",
                greenSecondary: "#A4D0A4",
                backgroundPrimary: "#F6FFDE",
                backgroundSecondary: "#F7E1AE",
                dark: "#1B1B1B",
            }
        },
    },

    plugins: [
        require('@tailwindcss/forms'),
        require("daisyui"),
        require('tailwind-scrollbar')({ nocompatible: true }),
    ],
};
