let { gulp, src, dest, watch, series, parallel } = require('gulp'),
    eslint = require('gulp-eslint');

module.exports = {
    lintJs: function (done) {
        return src([
            './src/js/*.js',
            './src/js/**/*.js',
        ])
            .pipe(eslint())
            .pipe(eslint.format())
        done();
    }
};