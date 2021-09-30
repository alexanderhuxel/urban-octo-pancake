module.exports = {
  extends: "stylelint-config-standard",
  rules: {
    "no-empty-source": null,
    "no-invalid-position-at-import-rule": null,
    "string-quotes": "double",
    "at-rule-no-unknown": [
      true,
      {
        ignoreAtRules: [
          "extend",
          "layer",
          "at-root",
          "debug",
          "warn",
          "error",
          "if",
          "else",
          "for",
          "each",
          "while",
          "mixin",
          "include",
          "content",
          "return",
          "function",
          "tailwind",
          "apply",
          "responsive",
          "variants",
          "screen",
        ],
      },
      // new StyleLintPlugin({
      //   failOnError: !config.enabled.watcher,
      //   emitErrors: true,
      //   quiet: false,
      //   syntax: "scss",
      // }),
    ],
  },
};
