let browserSync = require('browser-sync');

module.exports = {
    browserStart: function (done) {
        browserSync.init({
            server: {
                baseDir: './dist/'
            }
        });
        done();
    },
    browserReload: function (done) {
        browserSync.reload();
        done();
    }
};