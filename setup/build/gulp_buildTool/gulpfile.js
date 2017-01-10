
// Strict enforces specific conditions and imported scripts may have problems.
'use strict';

var GULP_PATH = '/var/www/gulp_buildTool/';
var SOURCE = '../root/';
var DESTINATION = '/var/www/projects/subdomains.webapp.run/deployment/wordpresswebapp/root/';
var tools = require(GULP_PATH + 'gulp_jsFiles/gulp_includeNodeModules.js');

var source = function(subpath) {
	return tools.dist(SOURCE, subpath);
};
var destination = function(subpath) {
	return tools.dist(DESTINATION, subpath);
};

// gulp-uglify, gulp-cssnano, gulp-autoprefixer, gulp-concat, gulp-plumber.
// var browserSync = require('browser-sync').create();



// browserSync
// // Static server
// tools.gulp.task('browser-sync', function() {
//     browserSync.init({
//         server: {
//             baseDir: "./"
//         }
//     });
// });
//
// // or...
//
// tools.gulp.task('browser-sync', function() {
//     browserSync.init({
//         proxy: "yourlocal.dev"
//     });
// });



tools.gulp.task('DevToProd_css', function() {
	return tools.cssTask(
		source(['app/styles/**/*.css']),
		destination('app/styles')
	);
});

tools.gulp.task('DevToProd_cssthemes', function() {
	return tools.cssTask(
		source(['routing/**/*.css']),
		destination('routing')
	);
});

tools.gulp.task('DevToProd_uglifyjs', function() {
	return tools.javascriptUglifyTask(
		source(['app/javascripts/**/*.js']),
		destination('app/javascripts')
	);
});

tools.gulp.task('DevToProd_htmlminify', function() {
	return tools.htmlminifyTask(
		[
			source('app/**/*.html'),
			'!'+ source('app/elements/**/*.html'),
			'!'+ source('app/elements/bower_components/**/*.html'),
			'!'+ source('app/javascripts/addons_library/Woothemes-FlexSlider2/dynamic-carousel-min-max.html') // Throughs errors.
		],
		destination('app')
	);
});

tools.gulp.task('DevToProd_phpminify', function() {
	// return tools.optimizePHPTask2(
	// 	[
	// 		source('content/mu-plugins/**/*.php'),
	// 		'!'+ source('content/mu-plugins/SZN_web_components/**/*.php'),
	// 		'!'+ source('content/mu-plugins/SZN_packages/**/*.php')
	// 	],
	// 	destination('content/mu-plugins/')
	// );
});


tools.gulp.task('DevToProd_htmlminifyElements', function() {
	return tools.htmlminifyElementsTask(
		[
			source('app/elements/**/*.html'),
			'!'+ source('app/elements/bower_components/**/*.html')
		],
		destination('app/elements')
	);
});

// OLD NOT WORKING
// tools.gulp.task('vulcanize_dev', function () {
// 	return tools.vulcanizeTask(
// 		source('content/mu-plugins/SZN_web_components/codeblocks/import-elements.html'),
// 		source('content/mu-plugins/SZN_web_components/codeblocks/vulcanized/')
// 	);
// });

tools.gulp.task('DevToProd_DeployPlugins', function() {
	return tools.rsyncTask(
		source('app'),
		destination('app')
	);
});

tools.gulp.task('DevToProd_DeployNecessaryWordpressFiles', function() {
	return tools.DeployNecessaryWordpressFiles(
		[
			source('.htaccess'),
			source('manifest.json'),
			source('index.php'),
			// source('site'),
			source('*/**'),
			source('sw.js')
		],
		destination()
	);
});

tools.gulp.task('DevToProd_DeployThemes', function() {
	return tools.rsyncTask(
		source('routing'),
		destination('routing')
	);
});

tools.gulp.task('DevToProd_manifest', function() {
	return tools.gulp.src(source('manifest.json'))
		.pipe(tools.gulp.dest(destination()));
});

tools.gulp.task('generate-service-worker-dev', function(callback) {
	return tools.generateServiceWorkerTask(
		source(),
		callback
	);
});

tools.gulp.task('generate-service-worker-prod', function(callback) {
	return tools.generateServiceWorkerTask(
		destination(),
		callback
	);
});

// Watch Files !
// tools.gulp.task('DevToProd_watch', function() {
// 	tools.gulp.watch(source('content/mu-plugins/SZN_scripts_styles/**/*.js'), ['DevToProd_uglifyjs']);
// 	tools.gulp.watch(source('content/mu-plugins/SZN_scripts_styles/**/*.css'), ['DevToProd_css']);
// 	tools.gulp.watch(source('content/mu-plugins/**/*.html'), ['DevToProd_htmlminify']);
// });

tools.gulp.task('DevToProd', [
	'DevToProd_DeployNecessaryWordpressFiles',
	'DevToProd_DeployThemes',
	'DevToProd_DeployPlugins',
	'DevToProd_css',
	'DevToProd_cssthemes',
	'DevToProd_uglifyjs',
	'DevToProd_htmlminify',
	// 'DevToProd_phpminify',
	'DevToProd_htmlminifyElements',
	'DevToProd_manifest',
	'generate-service-worker-prod',
]);
