import { defineconfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineconfig({
    plugins:[
        laravel({
            input:['resources/js/ecom.js'],
            refresh:true,
        })
    ]
})