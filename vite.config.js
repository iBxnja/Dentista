import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
  plugins: [
    laravel({
      input: ['resources/css/app.css', 'resources/js/app.js'],
      refresh: true,
    }),
  ],
  build: {
    rollupOptions: {
      external: [
        'bootstrap', // Agregar bootstrap como importación externa
        /@popperjs\/core\/*/ // Si también usas Popper.js con Bootstrap
      ],
    },
  },
});
