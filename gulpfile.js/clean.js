let { gulp, src, dest, watch, series, parallel } = require('gulp'),
    del = require('del'),
    vinylPaths = require('vinyl-paths');

module.exports = {
    cleanCss: function (done) {
        return src('dist/assets/css/*')
            .pipe(vinylPaths(del));
        done();
    },
    cleanJs: function (done) {
        return src('dist/assets/js/*')
            .pipe(vinylPaths(del));
        done();
    }
};