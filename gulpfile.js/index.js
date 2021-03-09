let { gulp, src, dest, watch, series, parallel } = require('gulp'),
	{ lintJs } = require('./lint'),
	{ bundleCss, bundleJs } = require('./bundle'),
	{ minifyJs } = require('./minify'),
	{ cleanCss, cleanJs } = require('./clean'),
	{ bustCss, bustJs } = require('./cachebust'),
	{ success, error, browserStarted, buildSuccess } = require('./notify'),
	{ browserStart, browserReload } = require('./browser'),
	fileInclude = require('./fileInclude');

let watchSource = function (done) {
	watch(['src/html/*.html', 'src/html/**/*.html'],
		series(
			series(
				fileInclude
			),
			series(
				browserReload,
			)
		)
	);

	watch(['src/scss/**/*.{scss,sass}'],
		series(
			series(
				cleanCss,
				bundleCss,
				browserReload
			)
		)
	);

	watch(['src/js/*.js', 'src/js/**/*.js'],
		series(
			cleanJs,
			lintJs,
			bundleJs,
			browserReload
		));
	done();
};

let buildDev = series(
	parallel(
		cleanCss,
		cleanJs,
		lintJs,
		fileInclude,
	),
	series(
		bundleCss,
		bundleJs,
		watchSource,
		browserStart,
		browserStarted
	)
);

let buildPrd = series(
	parallel(
		cleanCss,
		cleanJs,
		lintJs,
		fileInclude,
	),
	series(
		bundleCss,
		bundleJs,
		minifyJs,
		// Busting cache with PHP...
		// this still needs work.
		// bustCss,
		// bustJs,
		buildSuccess
	)
);

// Run 'gulp' or 'gulp watch' to start BrowserSync
// and compile your code the fastest
exports.default = buildDev;
exports.watch = buildDev;

// Run 'gulp build' to minify and cache bust
// before deployment
exports.build = buildPrd;