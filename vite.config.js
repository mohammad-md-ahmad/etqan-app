import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import fg from 'fast-glob';
import path from 'path';

function getEntries(dir) {
    const files = fg.sync(`${dir}/**/*.js`);
    return files.reduce((entries, file) => {
        const key = path.relative(dir, file).replace(/\.js$/, '');
        entries[key] = path.resolve(file);
        return entries;
    }, {});
}

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    server: {
        host: '0.0.0.0',
        port: 3001,
    },
    publicDir: 'public/assets',
    build: {
        rollupOptions: {
            input: getEntries('resources/js')
        }
    }
});
