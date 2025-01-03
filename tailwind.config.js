import defaultTheme from 'tailwindcss/defaultTheme';
import colors from "tailwindcss/colors.js";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            colors: {
                white: '#F9FAFB', // اللون الأبيض المعدل
                // إزالة اللون الرمادي واستبداله بالأبيض
                gray: '#F9FAFB', // إضافة اللون الأبيض في مكان الرمادي
                ...colors, // إضافة باقي الألوان الافتراضية
            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },
    plugins: [],
};
