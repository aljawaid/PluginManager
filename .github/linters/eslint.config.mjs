// Flat ESLint configuration for Super-Linter v9 and modern local ESLint releases.
import js from "@eslint/js";
import globals from "globals";

export default [
  {
    ignores: ["**/clipboard-*.min.js", "**/vendor/**/*.js", "eslint.config.mjs"],
  },
  {
    ...js.configs.recommended,
    files: ["**/*.js", "**/*.cjs"],
    languageOptions: {
      ecmaVersion: 2021,
      sourceType: "script",
      globals: {
        ...globals.browser,
        ...globals.commonjs,
        ...globals.jquery,
        ...globals.es2021,
        ClipboardJS: "readonly",
      },
    },
    rules: {
      ...js.configs.recommended.rules,
      "no-undef": "warn",
    },
  },
];
