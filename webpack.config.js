const webpack = require('webpack');
const path = require('path');

// Plugins
const uglify = new webpack.optimize.UglifyJsPlugin({
    minimize: true,
    comments: false,
});

module.exports = function(options) {
    // Default plugins
    const plugins = [
        new webpack.ProvidePlugin({
            jQuery: 'jquery',
            $: 'jquery',

            bootstrap: 'bootstrap',
        })
    ];

    // If running in production we will add some plugins
    if (options === 'production') {
        plugins.push(uglify);
    }

    return {
        entry: {
            bundle: path.resolve(__dirname, 'resources/js', 'app'),
        },
        devtool: (options === 'development') ? 'eval-cheap-module-source-map' : 'source-map',
        output: {
            path: path.resolve(__dirname, 'web/js'),
            filename: 'app.js'
        },
        resolve: {
            alias: {
                jquery: path.resolve(__dirname, 'node_modules/jquery/dist/jquery.js'),
                bootstrap: path.resolve(__dirname, 'node_modules/bootstrap-sass/assets/javascripts/bootstrap.js'),
            }
        },
        plugins: plugins,
    };
};
