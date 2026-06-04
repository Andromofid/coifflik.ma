import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            colors: {
                burgundy: "#7A003C",
                "burgundy-dark": "#4A001F",
                "burgundy-soft": "#B85A7A",

                gold: "#D89A1C",
                "gold-dark": "#A86F00",
                "gold-light": "#F3D28A",

                cream: "#FBF8F1",
                "cream-dark": "#EFE6D8",

                ink: "#1F1518",
                mist: "#F8F3EF",
            },
            fontFamily: {
                sans: ["DM Sans", "sans-serif"],
                display: ["Cormorant Garamond", "serif"],
            },
        },
    },
    plugins: [forms],
};
