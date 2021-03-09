let { gulp, src, dest, watch, series, parallel } = require('gulp'),
    notify = require('./notify.js'),
    sourcemaps = require('gulp-sourcemaps'),
    getPaths = require('./paths.js'),
    paths = getPaths.paths(),

    // CSS dependancies
    rename = require('gulp-rename'),
    sass = require('gulp-sass'),
    prefix = require('gulp-autoprefixer'),
    cleanCSS = require('gulp-clean-css'),

    // JS dependancies
    browserify = require('browserify'),
    babelify = require('babelify'),
    source = require('vinyl-source-stream'),
    buffer = require('vinyl-buffer');

module.exports = {
    bundleCss: function (done) {
        src('src/scss/**/*.{scss,sass}')
            .pipe(sourcemaps.init())
            .pipe(sass({
                outputStyle: 'compressed',
                sourceComments: true,
                errLogToConsole: true,
            }))
            .on('error', notify.error)
            .pipe(prefix())
            .pipe(cleanCSS({
                level: {
                    1: {
                        specialComments: false
                    }
                }
            }))
            .pipe(rename({ suffix: '.min' }))
            .pipe(sourcemaps.write(''))
            .pipe(dest('dist/assets/css/'))
        done();
    },
    bundleJs: function (done) {
        var bundler = browserify('./src/js/scripts.js', { debug: true }).transform(babelify, {
            // Use all of the ES2015 spec
            // presets: ["es2015"],
            sourceMaps: true
        });

        return bundler
            .bundle()
            .on('error', notify.error)
            .pipe(source('bundle.js'))
            .pipe(buffer())
            .pipe(sourcemaps.init({ loadMaps: true }))
            .pipe(sourcemaps.write(''))
            .pipe(dest('./dist/assets/js/'));
        done();
    }
};