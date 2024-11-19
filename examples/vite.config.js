import { defineConfig } from "vite";
import laravel, { refreshPaths } from "laravel-vite-plugin";
import { globSync } from "glob";

export default defineConfig({
  plugins: [
    laravel({
      input: ["resources/css/app.css", "resources/js/app.js"].concat(
        globSync("resources/js/alpine/**/*.js")
      ),
      refresh: [...refreshPaths, "app/Livewire/**"],
    }),
  ],
});
