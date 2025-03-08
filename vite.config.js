import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';
import tailwindcss from "@tailwindcss/vite";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/quavi.css',
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
    build: {
        outDir: path.resolve(__dirname, 'public/build'),
        rollupOptions: {
            input: {
                quaviCSS: path.resolve(__dirname, 'resources/css/quavi.css'),
            },
            output: {
              assetFileNames: 'assets/quavi.css',
            }
          }
    }
});