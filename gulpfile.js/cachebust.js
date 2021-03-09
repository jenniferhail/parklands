let { gulp, src, dest, watch, series, parallel } = require('gulp'),
    hash = require('gulp-hash'),
    del = require('del'),
    vinylPaths = require('vinyl-paths');

module.exports = {
    bustCss: function (done) {
        src('dist/assets/css/style.min.css')
            .pipe(hash({
                template: '<%= name %><%= ext %>?v=<%= hash %>',
            })) // Add hashes to the files' names
            .pipe(dest('dist/assets/css/')) // Write the renamed files

        done();
    },
    bustJs: function (done) {
        src('dist/assets/js/bundle.min.js')
            .pipe(vinylPaths(del)) //This will remove the originals and prepare the directory for the new files
            .pipe(hash({
                template: '<%= name %><%= ext %>?v=<%= hash %>',
            })) // Add hashes to the files' names
            .pipe(dest('dist/assets/js/')) // Write the renamed files

        done();
    }
};