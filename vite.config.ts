import { defineConfig } from 'vite';
export default defineConfig({
    build: {
        outDir: 'www/build', 
        emptyOutDir: true,
        rollupOptions: {
            input: 'js/main.js', 
        },
    },
    css: {
        devSourcemap: true,
    },
});
