import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    // tailwind.config.js
    theme: {
        extend: {
            colors: {
                "rose-primary": "#C2185B",
                "rose-dark": "#880E4F",
                "rose-light": "#FCE4EC",
                "rose-soft": "#F48FB1",
                gold: "#F9A825",
                ink: "#1A1215",
                mist: "#F9F5F6",
            },
            fontFamily: {
                sans: ["DM Sans", "sans-serif"],
                display: ["Cormorant Garamond", "serif"],
            },
        },
    },

    plugins: [forms],
};
