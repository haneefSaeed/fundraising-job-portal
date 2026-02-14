const defaultTheme = require("tailwindcss/defaultTheme");

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Nunito", ...defaultTheme.fontFamily.sans],
                montserrat: ["Montserrat", ...defaultTheme.fontFamily.sans],
                worksans: ["Work Sans", ...defaultTheme.fontFamily.sans],
                garmand: ["Garmand", ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [require("@tailwindcss/forms"), require("flowbite/plugin")],
};
