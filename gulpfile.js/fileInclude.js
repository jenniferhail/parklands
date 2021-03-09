let { gulp, src, dest, watch, series, parallel } = require('gulp'),
    fileinclude = require('gulp-file-include');

module.exports = function fileInclude(done) {
    src('src/html/*.html', 'src/html/**/*.html')
        .pipe(fileinclude({
            prefix: '@',
            basepath: '@file'
        }))
        .pipe(dest('dist/'));
    done();
};