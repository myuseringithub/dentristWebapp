// Strict enforces specific conditions and imported scripts may have problems.
'use strict';

// 😄 This file is used to define Gulp tasks with source path and destination path. While gulp_includeNodeModules.js is used to save the functions for the build.

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

// ⭐ Distribution Code - Copy all files to the destination fodler. Then build file types.
tools.gulp.task('copy:serverSide', function() {
	return tools.rsyncTask( source(), 'serverSide/', '/app/' );
});
tools.gulp.task('copy:root', function() {
	return tools.rsyncTask( source(), 'clientSide/root/', '/app/' );
});
tools.gulp.task('copy:jspm_packages_modules', function() {
	return tools.rsyncTask( source(), 'clientSide/jspm_packages_modules/', '/app/', {'u': true} );
});
tools.gulp.task('copy:bower_packageManager', function() {
	return tools.rsyncTask( source(), 'clientSide/bower_packageManager/', '/app/', {'u': true});
});

tools.gulp.task('copy:assets', function() {
	return tools.rsyncTask( source(), 'clientSide/assets/', '/app/' );
});
tools.gulp.task('copy:routing', function() {
	return tools.rsyncTask( source(), 'clientSide/routing/', '/app/' );
});

// ⭐ Build CSS
tools.gulp.task('css:assets', function() {
	return tools.cssTask(
		source(['clientSide/assets/styles/**/*.css']),
		destination('clientSide/assets/styles')
	);
});
tools.gulp.task('css:routing', function() {
	return tools.cssTask(
		source(['clientSide/routing/**/*.css']),
		destination('clientSide/routing')
	);
});

// ⭐ Build JS Files - Causes ERRORS
tools.gulp.task('js:uglify', function() {
	return tools.javascriptUglifyTask(
		// chaged because it causes errors
		source('clientSide/assets/javascripts/admin-script.js'),
		destination('clientSide/assets/javascripts')
	);
});

// ⭐ Build HTML Files
tools.gulp.task('html:minify', function() {
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
tools.gulp.task('html:minifyElements', function() {
	return tools.htmlminifyElementsTask(
		[
			source('clientSide/assets/elements/**/*.html'),
			'!'+ source('clientSide/assets/elements/bower_components/**/*.html')
		],
		destination('clientSide/assets/elements')
	);
});

// _________________________________________________________

tools.gulp.task('bower', function() {
	// In gulp 4, you can return a child process to signal task completion
	return tools.childProcess.spawn('bower', ['install --allow-root'], { cwd: destination('clientSide/bower_packageManager/'), shell: true, stdio:[0,1,2] });
});

tools.gulp.task('jspm', async function() {
	// // switch to supported node version
	// tools.childProcess.spawn('n', ['stable'], { shell: true, stdio:[0,1,2] });

	// // In gulp 4, you can return a child process to signal task completion
	// tools.childProcess.spawn('jspm', ['install'], { cwd: '/app/clientSide/jspm_packages_modules/', shell: true, stdio:[0,1,2] });
	// return tools.childProcess.spawn('n', ['v8.0.0-nightly20170126a67a04d765'], { shell: true, stdio:[0,1,2] });

	// switch to nodejs stable supported version by jspm and then execute composer
	var process = tools.childProcess.execSync('n stable; jspm install; n v8.0.0-nightly20170126a67a04d765', { cwd: destination('clientSide/jspm_packages_modules/'), shell: true, stdio:[0,1,2] });
	return await process;

});

tools.gulp.task('composer:wordpressPlugins', function() {
	// In gulp 4, you can return a child process to signal task completion
	return tools.childProcess.spawn('composer', ['install'], { cwd: destination('serverSide/wordpressPlugins_composer_dependencyManager/'), shell: true, stdio:[0,1,2] });
});

tools.gulp.task('composer:wordpressMustUsePlugins', async function() {
	return new Promise(resolve => {
		// Create directory.
		tools.mkdirp.sync(destination('serverSide/wordpressPlugins_mustUsePlugins/'), function(err) { /* path exists unless there was an error */ });
		resolve();
	}).then(()=>{
		// check if github plugin repo is cloned.
		if (tools.filesystem.existsSync(destination('serverSide/wordpressPlugins_mustUsePlugins/SZN_template_system/.git') )) {
			// pull
			 tools.childProcess.spawnSync('git', ['pull https://github.com/myuseringithub/SZN_template_system.git'], { cwd: destination('serverSide/wordpressPlugins_mustUsePlugins/SZN_template_system/'), shell: true, stdio:[0,1,2] });
		} else { // if repo isn't cloned.
			// clone
			 tools.childProcess.spawnSync('git', ['clone https://github.com/myuseringithub/SZN_template_system.git'], { cwd: destination('serverSide/wordpressPlugins_mustUsePlugins/'), shell: true, stdio:[0,1,2] });
		}
		Promise.resolve();
	}).then(()=>{
		// install composer dependencies.
		tools.childProcess.spawnSync('composer', ['install'], { cwd: destination('serverSide/wordpressPlugins_mustUsePlugins/SZN_template_system/dependencies/services_composer_dependencyManager/'), shell: true, stdio:[0,1,2]  });
		Promise.resolve();
	});

});

// Reorganization of file & folder structure _________________________________________________________

tools.gulp.task('copy:wordpressConfiguration', function() {
	return tools.rsyncTask( '/tmp/content/', 'wordpressConfiguration/', '/app/' );
});

tools.gulp.task('copy:phpini', function() {
	return tools.rsyncTask( '/tmp/distribution/serverSide/phpConfiguration/', 'php.ini', '/usr/local/etc/php/' );
});

tools.gulp.task('copy:apacheSSL', function() {
	return tools.rsyncTask( '/tmp/content/sslCertificate/', '/', '/etc/apache2/ssl/' );
});
tools.gulp.task('copy:apacheHosts', function() {
	return tools.rsyncTask( '/tmp/distribution/serverSide/apacheServer/virtualHostsConfigurations', '/', '/etc/apache2/sites-available/' );
});
tools.gulp.task('copy:apacheConf', function() {
	return tools.rsyncTask( '/tmp/distribution/serverSide/apacheServer/', 'apache2.conf', '/etc/apache2/' );
});
tools.gulp.task('exec:apacheEnableHost', function() {
	return tools.childProcess.spawn('a2ensite', ['configurationsLoader.conf'], { shell: true, stdio:[0,1,2] });
});
tools.gulp.task('copy:apache', 
	tools.gulp.series(
		tools.gulp.parallel(
			'copy:apacheSSL',
			'copy:apacheHosts',
			'copy:apacheConf'
		),
		'exec:apacheEnableHost'
	)
);

tools.gulp.task('copy:dist:root', function() {
	return tools.rsyncTask( '/tmp/distribution/clientSide/root/', '/', '/app/root/' );
});
tools.gulp.task('copy:dist:assets', function() {
	return tools.rsyncTask( '/tmp/distribution/clientSide/assets/', '/', '/app/root/app/' );
});
tools.gulp.task('copy:dist:muplugins', function() {
	return tools.rsyncTask( '/tmp/distribution/serverSide/wordpressPlugins_mustUsePlugins/', '/', '/app/root/content/mu-plugins/' );
});
tools.gulp.task('copy:dist:plugins', function() {
	return tools.rsyncTask( '/tmp/distribution/serverSide/wordpressPlugins_composer_dependencyManager/plugins/', '/', '/app/root/content/plugins/' );
});
tools.gulp.task('copy:dist:plugins', function() {
	return tools.rsyncTask( '/tmp/distribution/serverSide/wordpressPlugins_composer_dependencyManager/plugins/', '/', '/app/root/content/plugins/' );
});
tools.gulp.task('copy:dist:content', function() {
	return tools.rsyncTask( '/tmp/content/wordpressUploads/', '/', '/app/root/content/uploads/' );
});
tools.gulp.task('copy:dist:routing', function() {
	return tools.rsyncTask( '/tmp/distribution/clientSide/routing/', '/', '/app/root/content/themes/routing/' );
});
tools.gulp.task('copy:dist:manualPlugins', function() {
	return tools.rsyncTask( '/tmp/content/wordpressPlugins_manuallyUpdated/', '/', '/app/root/content/plugins/' );
});
tools.gulp.task('copy:dist:bower', function() {
	return tools.rsyncTask( '/tmp/distribution/clientSide/bower_packageManager/bower_components/', '/', '/app/root/app/sharedApp/elements/bower_components/' );
});
tools.gulp.task('copy:dist:jspm', function() {
	return tools.rsyncTask( '/tmp/distribution/clientSide/jspm_packages_modules/jspm_packages/', '/', '/app/root/app/sharedApp/javascripts/jspm_packages/' );
});
tools.gulp.task('copy:distribution', 
	tools.gulp.series(
		tools.gulp.parallel(
			'copy:dist:root',
			'copy:dist:muplugins',
			'copy:dist:plugins',
			'copy:dist:content',
			'copy:dist:routing',
			'copy:dist:manualPlugins', 
			'copy:dist:bower',
			'copy:dist:jspm'
		),
		'copy:dist:assets'
	)
);

// _________________________________________________________

// ⭐ Packages copy.
tools.gulp.task('copy:packages', 
	tools.gulp.parallel(
		'copy:serverSide',
		'copy:root',
		'copy:jspm_packages_modules',
		'copy:bower_packageManager'
	)
);
// ⭐ Assets Files copy.
tools.gulp.task('copy:assetsFiles', 
	tools.gulp.parallel(
		'copy:assets',
		'copy:routing'
	)
);

// ⭐ Build source code.
tools.gulp.task('copy:allFiles', 
	tools.gulp.parallel(
		'copy:packages',
		'copy:assetsFiles'
	)
);

// ⭐ Build source code.
tools.gulp.task('buildSourceCode', 
	tools.gulp.series(
		'copy:assetsFiles', 
		tools.gulp.parallel(
			'css:assets',
			'css:routing',
			'html:minifyElements',
			// 'html:minify', // Produces ERRORS ! 
			'js:uglify'
		)
	)
);

// ⭐ Build entire project code & dependencies.
tools.gulp.task('build', 
	tools.gulp.series(
		'copy:allFiles',
		tools.gulp.parallel(
			'bower',
			'jspm',
			'composer:wordpressPlugins',
			// 'html:minify', // Produces ERRORS ! 
			'composer:wordpressMustUsePlugins'
		),
		'buildSourceCode'
	)
);

const INTERVAL = 10000;
const usePolling = true;

// IMPORTANT: should maybe increase fs limit for number files that can be watched https://github.com/gulpjs/gulp/issues/217 https://discourse.roots.io/t/gulp-watch-error-on-ubuntu-14-04-solved/3453/6
// ⭐ Watch file changes from sources to destination folder.
tools.gulp.task('watch:source', () => {

	// assets
	tools.gulp.watch(
		[
			source('clientSide/assets/**/*'),
			source('clientSide/routing/**/*')
		], 
		// Fix high CPU usage for mounted filesystem in docker. And allow legacy file changes checking using flag 'usePolling' for chokidar.
		{interval: INTERVAL, usePolling: usePolling}, 
		tools.gulp.series(
			'copy:assetsFiles', 
			tools.gulp.parallel(
				'css:assets',
				'css:routing',
				'html:minifyElements',
				// 'html:minify', // Produces ERRORS ! 
				'js:uglify'
			)
		)
	);

	// bower
	tools.gulp.watch(
		[
			source('clientSide/bower_packageManager/**/*')
		], 
		// Fix high CPU usage for mounted filesystem in docker. And allow legacy file changes checking using flag 'usePolling' for chokidar.
		{interval: INTERVAL, usePolling: usePolling}, 
		tools.gulp.series(
			'copy:bower_packageManager',
			'bower'
		)
	);

	// jspm
	tools.gulp.watch(
		[
			source('clientSide/jspm_packages_modules/**/*')
		], 
		// Fix high CPU usage for mounted filesystem in docker. And allow legacy file changes checking using flag 'usePolling' for chokidar.
		{interval: INTERVAL, usePolling: usePolling}, 
		tools.gulp.series(
			'copy:jspm_packages_modules',
			'jspm'
		)
	);

	// root
	tools.gulp.watch(
		[
			source('clientSide/root/**/*')
		], 
		// Fix high CPU usage for mounted filesystem in docker. And allow legacy file changes checking using flag 'usePolling' for chokidar.
		{interval: INTERVAL, usePolling: usePolling}, 
		tools.gulp.series(
			'copy:root'
		)
	);

	// serverSide
	tools.gulp.watch(
		[
			source('serverSide/**/*')
		], 
		// Fix high CPU usage for mounted filesystem in docker. And allow legacy file changes checking using flag 'usePolling' for chokidar.
		{interval: INTERVAL, usePolling: usePolling}, 
		tools.gulp.series(
			'copy:serverSide'
		)
	);

});

let DISTRIBUTION = '/tmp/distribution/';
tools.gulp.task('watch:distribution', () => {

	// assets
	tools.gulp.watch(
		[
			DISTRIBUTION + 'clientSide/assets/**/*',
			DISTRIBUTION + 'clientSide/routing/**/*'
		], 
		// Fix high CPU usage for mounted filesystem in docker. And allow legacy file changes checking using flag 'usePolling' for chokidar.
		{interval: INTERVAL, usePolling: usePolling}, 
		tools.gulp.series(
			tools.gulp.parallel(
				'copy:dist:routing',
				'copy:dist:assets'
			)
		)
	);

	// bower
	tools.gulp.watch(
		[
			DISTRIBUTION + 'clientSide/bower_packageManager/**/*'
		], 
		// Fix high CPU usage for mounted filesystem in docker. And allow legacy file changes checking using flag 'usePolling' for chokidar.
		{interval: INTERVAL, usePolling: usePolling}, 
		tools.gulp.series(
			'copy:dist:bower'
		)
	);

	// jspm
	tools.gulp.watch(
		[
			DISTRIBUTION + 'clientSide/jspm_packages_modules/**/*'
		], 
		// Fix high CPU usage for mounted filesystem in docker. And allow legacy file changes checking using flag 'usePolling' for chokidar.
		{interval: INTERVAL, usePolling: usePolling}, 
		tools.gulp.series(
			'copy:dist:jspm'
		)
	);

	// root
	tools.gulp.watch(
		[
			DISTRIBUTION + 'clientSide/root/**/*'
		], 
		// Fix high CPU usage for mounted filesystem in docker. And allow legacy file changes checking using flag 'usePolling' for chokidar.
		{interval: INTERVAL, usePolling: usePolling}, 
		tools.gulp.series(
			'copy:dist:root'
		)
	);

	// serverSide
	tools.gulp.watch(
		[
			DISTRIBUTION + 'serverSide/apacheServer'
		], 
		// Fix high CPU usage for mounted filesystem in docker. And allow legacy file changes checking using flag 'usePolling' for chokidar.
		{interval: INTERVAL, usePolling: usePolling}, 
		tools.gulp.series(
			'copy:apache'
		)
	);

	// serverSide
	tools.gulp.watch(
		[
			DISTRIBUTION + 'serverSide/phpConfiguration'
		], 
		// Fix high CPU usage for mounted filesystem in docker. And allow legacy file changes checking using flag 'usePolling' for chokidar.
		{interval: INTERVAL, usePolling: usePolling}, 
		tools.gulp.series(
			'copy:phpini'
		)
	);

});
// ______________________________________________________________________________________________ Below is Old code

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
