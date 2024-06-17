const mix = require('laravel-mix');

mix.js('resources/js/app.tsx', 'public/js')
   .react() 
   .sass('resources/sass/app.scss', 'public/css')
   .sourceMaps();

mix.webpackConfig({
    resolve: {
        extensions: ['.js', '.jsx', '.ts', '.tsx'],
    },
    module: {
        rules: [
            {
                test: /\.(js|jsx|ts|tsx)$/,
                exclude: /node_modules/,
                use: {
                    loader: 'babel-loader',
                    options: {
                        presets: ['@babel/preset-env', '@babel/preset-react', '@babel/preset-typescript']
                    }
                }
            }
        ]
    }
});
