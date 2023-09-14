import path from 'path';

export default {
    entry: './public/js/codigo.js',
    output: {
        filename: 'bundle.js',
        path: path.resolve('public/js')
    }
}