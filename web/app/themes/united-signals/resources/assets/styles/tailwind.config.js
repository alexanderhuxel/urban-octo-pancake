/*
|-------------------------------------------------------------------------------
| Tailwind – The Utility-First CSS Framework
|-------------------------------------------------------------------------------
|
| Documentation at https://tailwindcss.com
|
*/

/**
 * Global Styles Plugin
 *
 * This plugin modifies Tailwind’s base styles using values from the theme.
 * https://tailwindcss.com/docs/adding-base-styles#using-a-plugin
 */
const globalStyles = ({ addBase, theme }) => {
  addBase({
    "p, a, li": {
      fontSize: theme("fontSize.base[0]"),
      lineHeight: theme("fontSize.base[1]"),
      color: theme("colors.secondary.DEFAULT"),
      fontWeight: theme("fontWeight.light"),
    },
    ".text-h1, h2, .text-h2, h3, .text-h3, h4, .text-h4, h5, .text-h5, h6, .text-h6":
      {
        // color: theme('colors.secondary.DEFAULT'),
        marginBottom: theme("margin.2"),
      },
    "h1, .text-h1": {
      fontSize: theme("fontSize.h1[0]"),
      lineHeight: theme("fontSize.h1[1]"),
      fontWeight: theme("fontWeight.bold"),
    },
    ".text-h1-mobile": {
      fontSize: theme("fontSize.h1-mobile[0]"),
      lineHeight: theme("fontSize.h1-mobile[1]"),
      fontWeight: theme("fontWeight.bold"),
    },
    "h2, .text-h2": {
      fontSize: theme("fontSize.h2[0]"),
      lineHeight: theme("fontSize.h2[1]"),
      fontWeight: theme("fontWeight.normal"),
    },
    "h3, .text-h3": {
      fontSize: theme("fontSize.h3[0]"),
      lineHeight: theme("fontSize.h3[1]"),
      fontWeight: theme("fontWeight.bold"),
    },
    "h4, .text-h4": {
      fontSize: theme("fontSize.h4[0]"),
      lineHeight: theme("fontSize.h4[1]"),
      fontWeight: theme("fontWeight.bold"),
    },
    "h5, .text-h5": {
      fontSize: theme("fontSize.h5[0]"),
      lineHeight: theme("fontSize.h5[1]"),
      fontWeight: theme("fontWeight.bold"),
    },
    "h6, .text-h6": {
      fontSize: theme("fontSize.h6[0]"),
      lineHeight: theme("fontSize.h6[1]"),
      fontWeight: theme("fontWeight.bold"),
    },
    ".intro, .text-intro": {
      fontSize: theme("fontSize.intro[0]"),
      lineHeight: theme("fontSize.intro[1]"),
      fontWeight: theme("fontWeight.light"),
    },
    ".body, .text-body": {
      fontSize: theme("fontSize.base[0]"),
      lineHeight: theme("fontSize.base[1]"),
      fontWeight: theme("fontWeight.light"),
    },
    ".button, .text-button": {
      fontSize: theme("fontSize.button[0]"),
      lineHeight: theme("fontSize.button[1]"),
      fontWeight: theme("fontWeight.bold"),
    },
    ".small-link, .text-small-link": {
      fontSize: theme("fontSize.small-link[0]"),
      lineHeight: theme("fontSize.small-link[1]"),
      textDecoration: theme("textDecoration.underline"),
    },
    ".overline, .text-overline": {
      fontSize: theme("fontSize.overline[0]"),
      lineHeight: theme("fontSize.overline[1]"),
      textTransform: "uppercase",
      letterSpacing: theme("letterSpacing.tight"),
    },
    ".label, .text-label": {
      fontSize: theme("fontSize.label[0]"),
      lineHeight: theme("fontSize.label[1]"),
    },
    ".caption, .text-caption": {
      fontSize: theme("fontSize.caption[0]"),
      lineHeight: theme("fontSize.caption[1]"),
    },
    ol: { listStyleType: "decimal" },
    ul: { listStyleType: "disc" },
    "ol, ul": {
      paddingLeft: theme("padding.2"),
      marginBottom: theme("margin.2"),
    },
    li: {
      paddingLeft: theme("padding.1"),
      marginBottom: theme("margin.1"),
    },
    figcaption: {
      color: theme("colors.gray.400"),
    },
  });
};

/**
 * Configuration
 */

module.exports = {
  mode: "jit",
  purge: {
    content: [
      // relative path globs to template files
      "./app/**/*.php",
      "./resources/**/*.php",
      "./resources/**/*.vue",
      "./resources/**/*.js",
    ],
    safelist: [
      "bg-primary",
      "bg-secondary",
      "bg-white",
      "bg-gray-100",
      "bg-secondary-500",
      "md:grid-cols-2",
      "md:grid-cols-3",
      "md:grid-cols-4",
      "md:grid-cols-5",
    ],
    options: {},
    purge: {},
  },
  theme: {
    colors: {
      white: "#fff",
      black: "#212429",
      gray: {
        100: "#F8F9FA",
        200: "#DDE2E5",
        300: "#ACB5BD",
        400: "#ACB5BD",
      },
      primary: {
        DEFAULT: "#4834D4",
      },
      secondary: {
        DEFAULT: "#ffff",
      },
      transparent: "transparent",
    },
    container: {
      center: true,
      padding: "1rem",
    },
    fontFamily: {
      display: "soleil, sans-serif",
    },
    fontSize: {
      h1: ["3rem", { lineHeight: "3.5rem" }],
      "h1-mobile": ["2.5rem", { lineHeight: "3rem" }],
      h2: ["1.9rem", { lineHeight: "2.25rem" }],
      h3: ["1.5rem", { lineHeight: "1.8rem" }],
      h4: ["1.25rem", { lineHeight: "1.4rem" }],
      h5: ["1rem", { lineHeight: "1.125rem" }],
      h6: ["1rem", { lineHeight: "2rem" }],
      intro: ["1.375rem", { lineHeight: "2rem" }],
      base: ["0.9375rem", { lineHeight: "2rem" }],
      button: ["1rem", { lineHeight: "1.5rem" }],
      "small-link": ["0.75rem", { lineHeight: "1rem" }],
      overline: ["0.75rem", { lineHeight: "1rem" }],
      label: ["0.75rem", { lineHeight: "1rem" }],
      caption: ["0.625rem", { lineHeight: "1rem" }],
    },
    fontWeight: {
      light: "300",
      normal: "400",
      bold: "700",
    },
    spacing: {
      px: "1px",
      "2px": "2px",
      0: "0px",
      0.25: "2px",
      0.5: "4px",
      0.75: "6px",
      1: "8px",
      1.5: "12px",
      2: "16px",
      2.5: "20px",
      3: "24px",
      3.5: "28px",
      4: "32px",
      5: "40px",
      6: "48px",
      7: "56px",
      8: "64px",
      9: "72px",
      10: "80px",
      11: "88px",
      12: "96px",
      13: "104px",
      14: "112px",
      15: "120px",
      16: "128px",
      18: "144px",
      20: "160px",
      21: "168px",
      24: "192px",
      25: "200px",
      32: "256px",
      35: "280px",
      36: "288px",
      40: "320px",
      48: "384px",
      50: "400px",
      56: "448px",
      64: "512px",
      68: "544px",
      78: "624px",
      90: "720px",
      96: "768px",
      120: "960px",
      128: "1024px",
      150: "1200px",
      parallax: "120%",
    },
    minHeight: {
      0: "0",
      px: "1px",
      40: "320px",
      64: "512px",
      80: "640px",
      100: "800px",
      full: "100%",
      screen: "100vh",
    },
    borderRadius: {
      none: "0",
      small: "4px",
      DEFAULT: "16px",
      big: "20px",
      full: "9999px",
    },
    boxShadow: {
      DEFAULT: "0 8px 16px rgba(17, 17, 17, 0.04)",
      large:
        "0px 27px 47px rgba(0, 0, 0, 0.13),0px 3.38082px 5.88513px rgba(0, 0, 0, 0.065)",
      inner: "inset 0 2px 4px 0 rgba(0, 0, 0, 0.06)",
      button: "0px 4px 20px rgba(104, 109, 224, 0.5);",
      none: "none",
    },
    extend: {
      maxWidth: {
        container: "1120px",
        containerhalf: "560px",
        none: "none",
        full: "100%",
        parallax: "120%",
      },
      opacity: {
        24: ".24",
      },
      minWidth: {
        none: "none",
        full: "100%",
      },
      maxHeight: {
        99999: "99999px",
      },
    },
  },
  variants: {
    extend: {
      scale: ["active", "group-hover"],
      opacity: ["active", "group-hover"],
    },
  },
  plugins: [globalStyles, require("@tailwindcss/forms")],
};
