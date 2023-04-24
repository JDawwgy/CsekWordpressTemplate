const _ = require("lodash");
const theme = require('./theme.json');
const tailpress = require("@jeffreyvr/tailwindcss-tailpress");

module.exports = {
    mode: 'jit',
    purge: {
        content: [
            './*/*.php',
            './**/*.php',
            './resources/css/*.css',
            './resources/js/*.js',
            './safelist.txt',
            './template-parts/*'
        ],
    },
    theme: {
        container: {
           padding: {
              DEFAULT: '5vw',
              sm: '5vw',
              md: '2.5vw',
              lg: '2.5vw',
              xl: '100px'
           },
           screens: {
                sm: "100%",
                md: "100%",
                lg: "100%",
                xl: "1440px"
             }
        },
        extend: {
            colors: tailpress.colorMapper(tailpress.theme('settings.color.palette', theme))
        },
        screens: {
            'sm': '640px',
            'md': '768px',
            'lg': '1024px',
            'xl': tailpress.theme('settings.layout.wideSize', theme)
        },


        fontSize : {
            'base': '16px',
            'lg': '18px',
            'xl': '20px',
            '2xl': ['calc(22px + (26 - 22) * ((100vw - 375px) / (1440 - 375)))'], //
            '3xl': ['calc(24px + (32 - 24) * ((100vw - 375px) / (1440 - 375)))'], //
            '4xl': ['calc(28px + (36 - 28) * ((100vw - 375px) / (1440 - 375)))'], //
            '5xl': ['calc(34px + (52 - 34) * ((100vw - 375px) / (1440 - 375)))'], //
            '6xl': ['calc(42px + (64 - 42) * ((100vw - 375px) / (1440 - 375)))'], //
            '7xl': ['calc(50px + (96 - 50) * ((100vw - 375px) / (1440 - 375)))'], //

        },
        fontFamily: {
               'sans': ['Roboto', 'system-ui'],
               'heading': ['Inter', 'Helvetica', 'system-ui'],

               'body': ['Roboto'],
              }
    },
    plugins: [
        tailpress.tailwind
    ]
};
