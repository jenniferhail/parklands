let notify = require('gulp-notify');

module.exports = {
    success: function (done) {
        notify({
            title: 'Success!.',
            message: 'Browser reloaded.',
            sound: ''
        }).write({});
        done();
    },
    error: function (error) {
        var lineNumber = (error.lineNumber) ? 'LINE ' + error.lineNumber + ' -- ' : '';
        notify({
            title: "Errors detected. Check Terminal.",
            message: "<%= error.message %>",
            sound: 'Sosumi',
        }).write(error);
        this.emit('end');
    },
    browserStarted: function (done) {
        notify({
            title: 'BrowserSync has started.',
            message: 'All changes will now reload the browser for you.',
            sound: 'Submarine'
        }).write({});
        done();
    },
    buildSuccess: function (done) {
        notify({
            title: 'Build complete!',
            message: 'You are ready to deploy.',
            sound: 'Submarine'
        }).write({});
        done();
    }
};