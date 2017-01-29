var tools = {
  plugins: require('gulp-load-plugins')({ camelize: true }),
  gulp: require('gulp'),
  path: require("path"),
  polyclean: require('polyclean'),
  swPrecache: require('sw-precache'),
  del: require('del'),
  runSequence: require('run-sequence'),
  browserSync: require('browser-sync'),
  merge: require('merge-stream'), // A method to dynamically add more sources to the stream.
  path: require('path'),
  filesystem: require('fs'),
  glob: require('glob-all'),
  historyApiFallback: require('connect-history-api-fallback'),
  crypto: require('crypto'),
  checktype: require('type-of-is'),
  cleanCSS: require('gulp-clean-css'),
  vfs: require('vinyl-fs'), // allows to copy symlinks as symlinks and not follow down the tree of files.
  childProcess: require('child_process'), // for running shell commands - DOESN'T Work
  mkdirp: require('mkdirp'),
  Rsync: require('rsync')

};

var AUTOPREFIXER_BROWSERS = [
  'ie >= 10',
  'ie_mob >= 10',
  'ff >= 30',
  'chrome >= 34',
  'safari >= 7',
  'opera >= 23',
  'ios >= 7',
  'android >= 4.4',
  'bb >= 10'
];
// Other browesers configuration :
// var AUTOPREFIXER_BROWSERS = ['last 2 versions', '> 1%', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4'];

// Functions that need to be added to the tools and used in other files.
tools['dist'] = dist = function(mainpath, subpath) {
  if (typeof(subpath)==='undefined') subpath = null;

  if (subpath == null) {
    return mainpath;
  } else {
    if(subpath != null && tools.checktype(subpath, String)) {
      return !subpath ? mainpath : tools.path.join(mainpath, subpath);
    } else {
      for (key in subpath) {
        subpath[key] = tools.path.join(mainpath, subpath[key]);
      }
      return subpath;
    }
  }
};

// TOOLS and code snippets to use :
// .pipe(tools.plugins.using({prefix:'Using file', color:'green'})) // Show files being applied to.


// _________________ Related to Dentrist

// working but symlinked folders throw errors.
tools['DeployNecessaryWordpressFiles'] = DeployNecessaryWordpressFiles = function(sources, destination) {
  // using vfs to allow symlinks to be copied. Gulp V4 which is no released yet, has it native.
  return tools.vfs.src(sources, {followSymlinks: false})
    .pipe(tools.plugins.plumber())
    .pipe(tools.vfs.dest(destination, {overwrite: true}))
    .pipe(tools.plugins.size({
      title: 'DeployNecessaryWordpressFiles'
    }));
};

tools['styleTask'] = styleTask = function(sources, destination) {
  return tools.gulp.src(sources)
    .pipe(tools.plugins.plumber())
    .pipe(tools.plugins.autoprefixer({
      browsers: AUTOPREFIXER_BROWSERS,
      cascade: false
    }))
    .pipe(tools.plugins.if('*.css', tools.cleanCSS()))
    .pipe(tools.gulp.dest(destination))
    .pipe(tools.plugins.size({
      title: 'styleTask'
    }));
};

tools['javascriptUglifyTask'] = javascriptUglifyTask = function(sources, destination) {
  return tools.gulp.src(sources)
    .pipe(tools.plugins.plumber())
    .pipe(tools.plugins.if('*.js', tools.plugins.uglify({
      preserveComments: 'some'
    })))
    .pipe(tools.gulp.dest(destination));
};

tools['optimizeHtmlTask'] = optimizeHtmlTask = function(sources, destination) {
	var hbAttrWrapOpen = /\{\{(#|\^)[^}]+\}\}/;
	var hbAttrWrapClose = /\{\{\/[^}]+\}\}/;
	var hbAttrWrapPair = [hbAttrWrapOpen, hbAttrWrapClose];
	return tools.gulp.src(sources)
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
    .pipe(tools.gulp.dest(destination))
    .pipe(tools.plugins.size({
      title: 'optimizeHtmlTask (& Inline JS and CSS)'
    }));
};

tools['optimizePHPTask'] = optimizePHPTask = function(sources, destination) {
	var hbAttrWrapOpen = /\{\{(#|\^)[^}]+\}\}/;
	var hbAttrWrapClose = /\{\{\/[^}]+\}\}/;
	var hbAttrWrapPair = [hbAttrWrapOpen, hbAttrWrapClose];
	return tools.gulp.src(sources)
		.pipe(tools.plugins.plumber())
		// .pipe(tools.plugins.minifyHtml({
    //   quotes: true,
    //   empty: true,
    //   spare: true
    // }))
    .pipe(tools.plugins.htmlmin({
      collapseWhitespace: true,
      caseSensitive: true, // Polymer custom elements.
      removeComments: true,
      removeCommentsFromCDATA: true,
      minifyURLs: true,
      minifyJS: true,
      minifyCSS: true,
      customAttrAssign: [/\$=/], // Fixes "href$=" issue in Polymer.
      // ignoreCustomFragments: [/<%[\s\S]*?%>/, /<\?[\s\S]*?\?>/, /\$?="\[\[.*?\]\]"/],
      // ignoreCustomFragments: [/<%[\s\S]*?%>/, /<\?[\s\S]*?\?>/],
    }))
    .pipe(tools.plugins.minifyInline())
    .pipe(tools.gulp.dest(destination))
    .pipe(tools.plugins.size({
      title: 'optimizePHPTask (& Inline JS and CSS)'
    }));
};

tools['optimizePHPTask2'] = optimizePHPTask2 = function(sources, destination) {
	// var hbAttrWrapOpen = /\{\{(#|\^)[^}]+\}\}/;
	// var hbAttrWrapClose = /\{\{\/[^}]+\}\}/;
	// var hbAttrWrapPair = [hbAttrWrapOpen, hbAttrWrapClose];
	return tools.gulp.src(sources)
		.pipe(tools.plugins.plumber())
		// .pipe(tools.plugins.minifyHtml({
    //   quotes: true,
    //   empty: true,
    //   spare: true
    // }))
    // .pipe(tools.plugins.htmlmin({
    //   collapseWhitespace: true,
    //   caseSensitive: true, // Polymer custom elements.
    //   removeComments: true,
    //   removeCommentsFromCDATA: true,
    //   minifyURLs: true,
    //   minifyJS: true,
    //   minifyCSS: true,
    //   customAttrAssign: [/\$=/], // Fixes "href$=" issue in Polymer.
    //   // ignoreCustomFragments: [/<%[\s\S]*?%>/, /<\?[\s\S]*?\?>/, /\$?="\[\[.*?\]\]"/],
    //   // ignoreCustomFragments: [/<%[\s\S]*?%>/, /<\?[\s\S]*?\?>/],
    // }))
    // .pipe(tools.plugins.minifyInline())
    .pipe(tools.gulp.dest(destination))
    .pipe(tools.plugins.size({
      title: 'optimizePHPTask (& Inline JS and CSS)'
    }));
};

tools['imageOptimizeTask'] = imageOptimizeTask = function(src, dest) {
  return tools.gulp.src(src)
  .pipe(tools.plugins.imagemin({
    progressive: true,
    interlaced: true
  }))
  .pipe(tools.gulp.dest(dest))
  .pipe(tools.plugins.size({
    title: 'imageOptimizeTask'
  }));
};

tools['htmlminifyElementsTask'] = htmlminifyElementsTask = function(sources, destination) {
  return tools.gulp.src(sources)
		.pipe(tools.plugins.plumber())
		.pipe(tools.plugins.minifyInline())
		.pipe(tools.polyclean.cleanJsComments())
		.pipe(tools.polyclean.leftAlignJs())
		.pipe(tools.polyclean.uglifyJs())
		.pipe(tools.polyclean.cleanCss())
    .pipe(tools.gulp.dest(destination))
};

tools['vulcanizeTask'] = vulcanizeTask = function(sources, destination) {
  return tools.gulp.src(sources)
    .pipe(tools.plugins.vulcanize({
      stripComments: true,
      inlineCss: true,
      inlineScripts: true
    }))
    .pipe(tools.gulp.dest(destination))
    .pipe(tools.plugins.size({
      title: 'vulcanize'
    }));
};

// tools['rsyncTask'] = rsyncTask = function(rootSource, source, destination) {
//   return tools.gulp.src(source)
//     .pipe(tools.plugins.rsync({
//       // paths outside of root cannot be specified.
//       root: rootSource,
//       destination: destination,
//       incremental: true,
//       compress: true,
//       // recursive: true,
//       // clean: true, // --delete - deletes files on target. Files which are not present on source.
//       // dryrun: true, // for tests use dryrun which will not change files only mimic the run.
//       // progress: true,
//       // skip files which are newer on target/reciever path.
//       update: true
//       // args this way doesn't work ! should use the equevalent options in API
//       // args: ['--verbose', '--compress', '--update', '--dry-run']
//       // DOESN'T WORK FOR MULTIPLE PATHS - error "outside of root" When relatice is off rsync can recieve multiple paths through gulp.src.
//       // relative: false
//     }));
// };

tools['rsyncTask'] = rsyncTask = function(rootSource, source, destination, extraOptions) {
    let options = {
      'a': true, // archive
      'v': true, // verbose
      'z': true, // compress
      'R': false, // relative
      'r': true // recursive
    };
    if(typeof extraOptions !== 'undefined') {
      options = Object.assign(options, extraOptions);
    } 
    var rsync = new tools.Rsync()
    .flags(options)
    // .exclude('+ */')
    // .include('/tmp/source/**/*')
    .source(tools.dist(rootSource, source))
    .destination(tools.dist(destination, source));
    
    // Create directory.
    return new Promise(resolve => {
      tools.mkdirp(tools.dist(destination, source), function(err) {     
        // Execute the command 
        rsync.execute(function(error, code, cmd) {
          resolve();
        }, function(data) {
          console.log(' ' + data);
        });
      });
    });
};


tools['generateServiceWorkerTask'] = generateServiceWorkerTask = function(rootDir, callback) {
  tools.swPrecache.write(tools.path.join(rootDir, 'service-worker.js'), {
    staticFileGlobs: [
      rootDir + 'app/**/*.{js,html,css}',
      rootDir + 'routing/**/*.{html,css}',

      // rootDir + 'content/mu-plugins/SZN_bower_components/**/*.{js,html,css}',


      // rootDir + 'content/mu-plugins/SZN_scripts_styles/css/**/*.{js,html,css,png,jpg,gif}',
      // rootDir + 'content/mu-plugins/SZN_scripts_styles/img/**/*.{js,html,css,png,jpg,gif}',
      // rootDir + 'content/mu-plugins/SZN_scripts_styles/js/**/*.{js,html,css,png,jpg,gif}',
      // rootDir + 'content/mu-plugins/SZN_web_components/elements/**/*.{js,html,css,png,jpg,gif}',
      // rootDir + 'content/themes/Dentrist/**/*.{js,html,css,png,jpg,gif}*',

      // rootDir + 'content/uploads/**/*.{js,html,css,png,jpg,gif}',
      // rootDir + 'content/mu-plugins/**/*.{js,html,css,png,jpg,gif}*',
    ],
    importScripts: ['app/javascripts/additional-service-worker.js'],
    stripPrefix: rootDir
  }, callback);
};

/** Ensure Files
 * @param {Array<string>} files
 * @param {Function} cb
 */
tools['ensureFiles'] = ensureFiles = function(files, cb) {
  var missingFiles = files.reduce(function(prev, filePath) {
    var fileFound = false;

    try {
      fileFound = tools.filesystem.statSync(filePath).isFile();
    } catch (e) { }

    if (!fileFound) {
      prev.push(filePath + ' Not Found');
    }

    return prev;
  }, []);

  if (missingFiles.length) {
    var err = new Error('Missing Required Files\n' + missingFiles.join('\n'));
  }

  if (cb) {
    cb(err);
  } else if (err) {
    throw err;
  }
}

// MUST CHANGE NAMES:
tools['cssTask'] = cssTask = styleTask;
tools['htmlminifyTask'] = htmlminifyTask = optimizeHtmlTask;
tools['phpminifyTask'] = phpminifyTask = optimizePHPTask;

// testing a way to get all functions in a file to add automatically the variable functions to Tools.
  // for(var i in this) {
  // 	if( (typeof this[i]).toString() == "function" && this[i].toString().indexOf("native") == -1 ){
  // 		WScript.Echo(this[i].name);
  // 	}
  // }

// automatically add all Tools for the module.exports, so that requiring the file will also add the tools together with it.
Object.keys(tools).forEach(function (key) {
  module.exports[key] = tools[key];
});
