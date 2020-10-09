const defaultTheme = require('tailwindcss/defaultTheme')
const plugin = require('tailwindcss/plugin')

module.exports = {
    purge: {
        enable: true,
        content: [
            './resources/views/*.php',
        ],
        options: {
            defaultExtractor: (content) => content.match(/[\w-/.:]+(?<!:)/g) || [],
            whitelistPatterns: [/-active$/, /-enter$/, /-leave-to$/, /show$/],
        },
    },
    theme: {
        extend: {
            boxShadow: theme => ({
                outline: '0 0 0 2px ' + theme('colors.teal.600')
            }),
            colors: {
                default: '#a9afb4',
                success: '#3bb453',
                info: '#1b80f6',
                warning: '#eeb320',
                danger: '#f12839',
            },
            inset: {
                '0': 0,
                '-16': '-4rem',
            },
            zIndex: {
                1000: '1000',
                5000: '5000',
                10000: '10000',
            },
            fontFamily: {
                body: [
                    "Roboto",
                    "HelveticaNeue",
                    ...defaultTheme.fontFamily.sans
                ],
            },
        }
    },
    variants: {
        backgroundColor: ['responsive', 'hover', 'focus', 'group-hover', 'focus-within'],
        textColor: ['responsive', 'hover', 'focus', 'group-hover', 'focus-within'],
        zIndex: ['responsive', 'focus']
    },
    plugins: [
        require('@tailwindcss/ui'),
        plugin(function({ addUtilities, theme, config }) {
            const themeColors = theme('colors');
            const individualBorderColors = Object.keys(themeColors).map(colorName => ({
                [`.border-b-${colorName}`]: {
                    borderBottomColor: themeColors[colorName]
                },
                [`.border-t-${colorName}`]: {
                    borderTopColor:  themeColors[colorName]
                },
                [`.border-l-${colorName}`]: {
                    borderLeftColor:  themeColors[colorName]
                },
                [`.border-r-${colorName}`]: {
                    borderRightColor:  themeColors[colorName]
                }
            }));

            addUtilities(individualBorderColors, {
                respectPrefix: false,
                respectImportant: true,
            });
        })
    ]
};
