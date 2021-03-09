module.exports = {
    paths: function () {
        var paths = {
            input: 'src/',
            output: 'dist/',
            scripts: {
                input: 'src/js/scripts.js',
                polyfills: '.polyfill.js',
                output: 'dist/assets/js/'
            },
            styles: {
                input: 'src/scss/**/*.{scss,sass}',
                output: 'dist/assets/css/'
            },
            images: {
                input: 'src/img/*.png',
                output: 'dist/assets/img/'
            },
            svgs: {
                input: 'src/svg/*.svg',
                output: 'dist/assets/svg/'
            },
            html: {
                input: 'src/html/*.html',
                output: 'dist/'
            },
            copy: {
                input: 'src/copy/**/*',
                output: 'dist/'
            },
            reload: './dist/'
        };
        return paths;
    }
}