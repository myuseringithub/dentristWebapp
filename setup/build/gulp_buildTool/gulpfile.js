// Strict enforces specific conditions and imported scripts may have problems.
'use strict';

// This file is used to define Gulp tasks with source path and destination path. While gulp_includeNodeModules.js is used to save the functions for the build.

// IMPORTANT: should migrate to gulp 4 and use gulp.series http://stackoverflow.com/questions/22824546/how-to-run-gulp-tasks-sequentially-one-after-the-other#comment70421010_31329150

var GULP_PATH = '/tmp/build/gulp_buildTool/';
var SOURCE = '/tmp/source';
var DESTINATION = '/app';
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


// ⭐ Copy all files to the destination fodler. Then build file types.
tools.gulp.task('copyAllFiles', function() {
	return tools.rsyncTask(
		source(),
		destination()
	);
});

// ⭐ Build CSS
tools.gulp.task('css_assets', function() {
	return tools.cssTask(
		source(['clientSide/assets/styles/**/*.css']),
		destination('clientSide/assets/styles')
	);
});
tools.gulp.task('css_routing', function() {
	return tools.cssTask(
		source(['clientSide/routing/**/*.css']),
		destination('clientSide/routing')
	);
});

// ⭐ Build JS Files - Causes ERRORS
tools.gulp.task('uglifyjs', function() {
	return tools.javascriptUglifyTask(
		// chaged because it causes errors
		source('clientSide/assets/javascripts/admin-script.js'),
		destination('clientSide/assets/javascripts')
	);
});

// ⭐ Build HTML Files
tools.gulp.task('htmlminify', function() {
	return tools.htmlminifyTask(
		[
			source('clientSide/assets/**/*.html'),
			'!'+ source('clientSide/assets/elements/**/*.html'),
			'!'+ source('clientSide/assets/elements/bower_components/**/*.html'),
			'!'+ source('clientSide/assets/javascripts/addons_library/Woothemes-FlexSlider2/dynamic-carousel-min-max.html') // Throughs errors.
		],
		destination('clientSide/assets')
	);
});
tools.gulp.task('htmlminifyElements', function() {
	return tools.htmlminifyElementsTask(
		[
			source('clientSide/assets/elements/**/*.html'),
			'!'+ source('clientSide/assets/elements/bower_components/**/*.html')
		],
		destination('clientSide/assets/elements')
	);
});

// ⭐ Build rest of code.
tools.gulp.task('buildSouceCode', [
	'css_assets',
	'css_routing',
	// Produces ERRORS !
	'htmlminifyElements',
	// 'htmlminify',
	'uglifyjs'
]);


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

// Regular copy example
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

