let { gulp, src, dest, watch, series, parallel } = require('gulp'),
    uglify = require('gulp-uglify'),
    rename = require('gulp-rename');

module.exports = {
    minifyJs: function (done) {
        return src('./dist/assets/js/bundle.js')
            .pipe(uglify())
            .pipe(rename({ suffix: '.min' }))
            .pipe(dest('./dist/assets/js/'));
        done();
    }
};