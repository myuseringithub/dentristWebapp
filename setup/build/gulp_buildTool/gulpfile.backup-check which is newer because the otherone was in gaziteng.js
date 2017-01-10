
// Strict enforces specific conditions and imported scripts may have problems.
'use strict';

var tools = require('./gulp_jsFiles/gulp_includeNodeModules.js');

var SOURCE = '../subdomains.dentrist.com/dev/public/';
var DESTINATION = '../dentrist.com/public/';

var source = function(subpath) {
	return tools.addSubpathToMainpath(subpath, SOURCE);
};
var destination = function(subpath) {
	return tools.addSubpathToMainpath(subpath, DESTINATION);
};


gulp.task('DevToProd_copywebapps', function() {
	return gulp.src('../subdomains.dentrist.com/dev/public/webapps/**')
		.pipe(gulp.dest('../dentrist.com/public/webapps/'));
});

// gulp.task('Dev_webappsChangeOwnership', () => {
// 	return gulp.src('../subdomains.dentrist.com/dev/public/webapps/**')
// 		.pipe(plugins.chown('www-data', 'www-data'))
// 		.pipe(gulp.dest('dist'));
// });

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
	return tools.gulp.src(source('content/mu-plugins/SZN_scripts_styles/**/*.css'))
		.pipe(tools.plugins.plumber())
		.pipe(tools.plugins.autoprefixer({
			browsers: ['last 2 versions', '> 1%', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4'],
			cascade: false
		}))
		.pipe(tools.plugins.cssnano())
		.pipe(tools.gulp.dest(destination('content/mu-plugins/SZN_scripts_styles')));
});

tools.gulp.task('DevToProd_cssthemes', function() {
	return tools.gulp.src(source('content/themes/**/*.css'))
		.pipe(tools.plugins.plumber())
		.pipe(tools.plugins.autoprefixer({
			browsers: ['last 2 versions', '> 1%', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4'],
			cascade: false
		}))
		.pipe(tools.plugins.cssnano())
		.pipe(tools.gulp.dest(destination('content/themes')));
});

tools.gulp.task('DevToProd_uglifyjs', function() {
  return tools.gulp.src(source('content/mu-plugins/SZN_scripts_styles/**/*.js'))
		.pipe(tools.plugins.plumber())
    .pipe(tools.plugins.uglify())
    .pipe(tools.gulp.dest(destination('content/mu-plugins/SZN_scripts_styles')));
});

tools.gulp.task('DevToProd_htmlminify', function() {

	var hbAttrWrapOpen = /\{\{(#|\^)[^}]+\}\}/;
	var hbAttrWrapClose = /\{\{\/[^}]+\}\}/;
	var hbAttrWrapPair = [hbAttrWrapOpen, hbAttrWrapClose];

	return tools.gulp.src([source('content/mu-plugins/**/*.html'), '!'+ source('content/mu-plugins/SZN_web_components/**/*.html')])
		.pipe(tools.plugins.plumber())
    .pipe(tools.plugins.htmlmin({
			collapseWhitespace: true,
			removeComments: true,
			removeCommentsFromCDATA: true,
			minifyURLs: true,
			minifyJS: true,
			minifyCSS: true
		}))
		.pipe(tools.plugins.minifyInline())
    .pipe(tools.gulp.dest(destination('content/mu-plugins')))
});


tools.gulp.task('DevToProd_htmlminifyElements', function() {
	return tools.gulp.src([source('content/mu-plugins/SZN_web_components/**/*.html')])
		.pipe(tools.plugins.plumber())
		.pipe(tools.plugins.minifyInline())
		.pipe(tools.polyclean.cleanJsComments())
		.pipe(tools.polyclean.leftAlignJs())
		.pipe(tools.polyclean.uglifyJs())
		.pipe(tools.polyclean.cleanCss())
    .pipe(tools.gulp.dest(destination('content/mu-plugins/SZN_web_components')))
});


tools.gulp.task('vulcanize_dev', function () {
	return tools.gulp.src(source('content/mu-plugins/SZN_web_components/codeblocks/import-elements.html'))
		// .pipe(tools.plugins.plumber())
		.pipe(tools.plugins.vulcanize({
			// abspath: '',
			excludes: [],
			stripExcludes: false,
		}))
		.pipe(tools.gulp.dest(source('content/mu-plugins/SZN_web_components/codeblocks/vulcanized/')));
});

tools.gulp.task('DevToProd_DeployPlugins', function() {
  tools.gulp.src(source('content/mu-plugins/'))
    .pipe(tools.plugins.rsync({
			root: source('content/mu-plugins/'),
      destination: destination('content/mu-plugins'),
			incremental: true,
			compress: true,
			recursive: true,
			clean: true,
    }));
});

tools.gulp.task('DevToProd_DeployThemes', function() {
  tools.gulp.src(source('content/themes/'))
    .pipe(tools.plugins.rsync({
			root: source('content/themes/'),
      destination: destination('themes'),
			incremental: true,
			compress: true,
			recursive: true,
			clean: true,
    }));
});

tools.gulp.task('DevToProd_watch', function() {
	tools.gulp.watch(source('content/mu-plugins/SZN_scripts_styles/**/*.js'), ['DevToProd_uglifyjs']);
	tools.gulp.watch(source('content/mu-plugins/SZN_scripts_styles/**/*.css'), ['DevToProd_css']);
	tools.gulp.watch(source('content/mu-plugins/**/*.html'), ['DevToProd_htmlminify']);
});


tools.gulp.task('DevToProd_manifest', function() {
	return tools.gulp.src(source('manifest.json'))
		.pipe(tools.gulp.dest(destination()));
});



	tools.gulp.task('generate-service-worker-dev', function(callback) {
  var rootDir = source();

  tools.swPrecache.write(tools.path.join(rootDir, 'service-worker.js'), {
    staticFileGlobs: [
			rootDir + 'content/mu-plugins/**/*.{js,html,css}',
			rootDir + 'content/themes/Dentrist/**/*.{html,css}',

			// rootDir + 'content/mu-plugins/SZN_bower_components/**/*.{js,html,css}',


			// rootDir + 'content/mu-plugins/SZN_scripts_styles/css/**/*.{js,html,css,png,jpg,gif}',
			// rootDir + 'content/mu-plugins/SZN_scripts_styles/img/**/*.{js,html,css,png,jpg,gif}',
			// rootDir + 'content/mu-plugins/SZN_scripts_styles/js/**/*.{js,html,css,png,jpg,gif}',
			// rootDir + 'content/mu-plugins/SZN_web_components/elements/**/*.{js,html,css,png,jpg,gif}',
			// rootDir + 'content/themes/Dentrist/**/*.{js,html,css,png,jpg,gif}*',

			// rootDir + 'content/uploads/**/*.{js,html,css,png,jpg,gif}',
			// rootDir + 'content/mu-plugins/**/*.{js,html,css,png,jpg,gif}*',
		],
		importScripts: ['content/mu-plugins/SZN_scripts_styles/js/additional-service-worker.js'],
    stripPrefix: rootDir
  }, callback);
});

tools.gulp.task('generate-service-worker-prod', function(callback) {
  var rootDir = destination();

  tools.swPrecache.write(tools.path.join(rootDir, 'service-worker.js'), {
    staticFileGlobs: [
			rootDir + 'content/mu-plugins/**/*.{js,html,css}',
			rootDir + 'content/themes/Dentrist/**/*.{html,css}',
		],
		importScripts: ['content/mu-plugins/SZN_scripts_styles/js/additional-service-worker.js'],
    stripPrefix: rootDir
  }, callback);
});


tools.gulp.task('DevToProd', [
	'DevToProd_DeployThemes',
	'DevToProd_DeployPlugins',
	'DevToProd_css',
	'DevToProd_cssthemes',
	'DevToProd_uglifyjs',
	'DevToProd_htmlminify',
	'DevToProd_htmlminifyElements',
	'DevToProd_manifest',
	'generate-service-worker-prod',
]);
