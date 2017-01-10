/**
 * Copyright 2015 Google Inc. All rights reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

// This generated service worker JavaScript will precache your site's resources.
// The code needs to be saved in a .js file at the top-level of your site, and registered
// from your pages in order to be used. See
// https://github.com/googlechrome/sw-precache/blob/master/demo/app/js/service-worker-registration.js
// for an example of how you can register this script and handle various service worker events.

/* eslint-env worker, serviceworker */
/* eslint-disable indent, no-unused-vars, no-multiple-empty-lines, max-nested-callbacks, space-before-function-paren */
'use strict';


importScripts("app/javascripts/additional-service-worker.js");


/* eslint-disable quotes, comma-spacing */
var PrecacheConfig = [["app/elements/answers-item.html","8ffc85d25c75c67741d0d4aa4f3274a0"],["app/elements/card-concept.html","cb493550d6a922b8f4de2518fa1659a4"],["app/elements/card-section.html","aa26cd056b3608fb62b9e6ec5a1d7b7d"],["app/elements/choice-listitem.html","d1b224e4e5bfb17428498dddacf05ee8"],["app/elements/dropdown-select.html","1c0643b5b992c44161b963daa72077bf"],["app/elements/examinations-data.html","4909e6b4ffffc478ad1780b8cddedf7b"],["app/elements/examinations-view.html","388d71b58cd924a06001233e098d9362"],["app/elements/list-item.html","ce9874065ecd78abffbffcf2c60f29db"],["app/elements/mcq-listitem.html","58a9dc912471d358ccc9bfc13828522a"],["app/elements/questions-data.html","fc2dcdeaa80185f33180a762b9ec288d"],["app/elements/questions-item.html","d2213c65fd68f523e8e104268e009a00"],["app/elements/questions-list.html","5fb80278ccda26078126553fb53d1e7d"],["app/elements/reference-listitem.html","65c26cc058e85674134d0fb496b7b9b3"],["app/elements/scroll-top.html","ef81750f83f35010aaf4508e140e12fc"],["app/elements/title-concept.html","f6a5ff010d6e9c4f6f4aaa15c6bfd6e4"],["app/elements/tweaksToOfficialElements/paper-menu-button.html","5fc05d2ddd4bad1d29290ac4a19f3e4b"],["app/styles/admin-custom-type-quize.css","9b57828b8fc469036ebaa702405de07c"],["app/styles/admin-style.css","5daf3679b4b231d348812496f2438964"],["app/styles/bootstrap.css","5b2f567930806ee20fc7a7b5a25f597b"],["app/styles/css_simple_reset.css","4884e7966b6f872b10f08ff1a84ee542"],["app/styles/effects.css","86365d456031b32c5f1f8a0d6243e675"],["app/styles/font-awesome/css/font-awesome.css","3f05a51a1e5260f4179db8ca65307a6a"],["app/styles/font-awesome/css/font-awesome.min.css","04425bbdc6243fc6e54bf8984fe50330"],["app/styles/font-face.css","ec5d156aebec2f996845d89000d7609b"],["app/styles/footer.css","afde1365445ff4c2fd56a84296112f3b"],["app/styles/general-custom-styles.css.html","78bd285410c764bdfdceda29ec733157"],["app/styles/idangerous.swiper.css","3a968b84549a82d8a0c2853b09697de8"],["app/styles/loader.css","b3afd976df653b2dd4a508c83142c26a"],["app/styles/main.css","78096fe9b942a2cfa09cc75b7e4d0f4d"],["app/styles/masonry.css","d327daad9431bd51ec6d7c52209fae75"],["app/styles/mobile.css","66e61b552a7fcc6c4dd2cb329a6786d8"],["app/styles/side-navigation.css","802501f1566106d9449545a92e0af545"],["app/styles/sidebar.css","8c56bd42fe8e657b14b40949799e2652"],["app/styles/singlepage-sharing-buttons.css","9bdf12290a529d157446bb6f12f06a39"],["app/styles/singlepage.css","4de5c480752368c9dfeabbe516fa83dc"],["app/styles/specific-page-css/about.css","d41d8cd98f00b204e9800998ecf8427e"],["app/styles/top-navigation.css","2502b357737791dbcfa98ce023ec1993"],["app/templates/codeblocks/_testing/Sticky Elements (pinning) - Examples - ScrollMagic_files/ScrollMagic.js","a76c08d497147b5dd5e56627bf1ce452"],["app/templates/codeblocks/_testing/Sticky Elements (pinning) - Examples - ScrollMagic_files/analytics.js","c889d7f1e7e37c77f20c434f5e268b60"],["app/templates/codeblocks/_testing/Sticky Elements (pinning) - Examples - ScrollMagic_files/debug.addIndicators.js","399c718c3d6ece3fef517a015f8359b1"],["app/templates/codeblocks/_testing/Sticky Elements (pinning) - Examples - ScrollMagic_files/examples.css","d5abf30c645a6828ca5c924558749140"],["app/templates/codeblocks/_testing/Sticky Elements (pinning) - Examples - ScrollMagic_files/examples.js","05b1c9c5adb255edadbfc14e2ddb199d"],["app/templates/codeblocks/_testing/Sticky Elements (pinning) - Examples - ScrollMagic_files/highlight.pack.js","117f4bbdfbc7baa19b9ac21a638452d4"],["app/templates/codeblocks/_testing/Sticky Elements (pinning) - Examples - ScrollMagic_files/jquery.min.js","3c9137d88a00b1ae0b41ff6a70571615"],["app/templates/codeblocks/_testing/Sticky Elements (pinning) - Examples - ScrollMagic_files/modernizr.custom.min.js","15ba3cd0b95c009360163b4b498d794e"],["app/templates/codeblocks/_testing/Sticky Elements (pinning) - Examples - ScrollMagic_files/normalize.css","91e3e4442e26587a008d9a835ec644cd"],["app/templates/codeblocks/_testing/Sticky Elements (pinning) - Examples - ScrollMagic_files/style.css","f80241c4dbb35f0a14d14db9effccd24"],["app/templates/codeblocks/_testing/Sticky Elements (pinning) - Examples - ScrollMagic_files/tracking.js","4489bfb3233e3620aa10f88fbfa265e5"],["app/templates/codeblocks/_testing/sticky.html","7a04ccae7ad76afe231cad90d5afc7ae"],["routing/inc/css/colorpicker.css","93b007836cafea87253f845c5c360e64"],["routing/inc/css/optionsframework.css","c58a76a787cd9d43013221aed57969b7"],["routing/style.css","869f0912a7eb0c9d3f193758c6e8f587"]];
/* eslint-enable quotes, comma-spacing */
var CacheNamePrefix = 'sw-precache-v1--' + (self.registration ? self.registration.scope : '') + '-';


var IgnoreUrlParametersMatching = [/^utm_/];



var addDirectoryIndex = function (originalUrl, index) {
    var url = new URL(originalUrl);
    if (url.pathname.slice(-1) === '/') {
      url.pathname += index;
    }
    return url.toString();
  };

var getCacheBustedUrl = function (url, now) {
    now = now || Date.now();

    var urlWithCacheBusting = new URL(url);
    urlWithCacheBusting.search += (urlWithCacheBusting.search ? '&' : '') + 'sw-precache=' + now;

    return urlWithCacheBusting.toString();
  };

var populateCurrentCacheNames = function (precacheConfig,
    cacheNamePrefix, baseUrl) {
    var absoluteUrlToCacheName = {};
    var currentCacheNamesToAbsoluteUrl = {};

    precacheConfig.forEach(function(cacheOption) {
      var absoluteUrl = new URL(cacheOption[0], baseUrl).toString();
      var cacheName = cacheNamePrefix + absoluteUrl + '-' + cacheOption[1];
      currentCacheNamesToAbsoluteUrl[cacheName] = absoluteUrl;
      absoluteUrlToCacheName[absoluteUrl] = cacheName;
    });

    return {
      absoluteUrlToCacheName: absoluteUrlToCacheName,
      currentCacheNamesToAbsoluteUrl: currentCacheNamesToAbsoluteUrl
    };
  };

var stripIgnoredUrlParameters = function (originalUrl,
    ignoreUrlParametersMatching) {
    var url = new URL(originalUrl);

    url.search = url.search.slice(1) // Exclude initial '?'
      .split('&') // Split into an array of 'key=value' strings
      .map(function(kv) {
        return kv.split('='); // Split each 'key=value' string into a [key, value] array
      })
      .filter(function(kv) {
        return ignoreUrlParametersMatching.every(function(ignoredRegex) {
          return !ignoredRegex.test(kv[0]); // Return true iff the key doesn't match any of the regexes.
        });
      })
      .map(function(kv) {
        return kv.join('='); // Join each [key, value] array into a 'key=value' string
      })
      .join('&'); // Join the array of 'key=value' strings into a string with '&' in between each

    return url.toString();
  };


var mappings = populateCurrentCacheNames(PrecacheConfig, CacheNamePrefix, self.location);
var AbsoluteUrlToCacheName = mappings.absoluteUrlToCacheName;
var CurrentCacheNamesToAbsoluteUrl = mappings.currentCacheNamesToAbsoluteUrl;

function deleteAllCaches() {
  return caches.keys().then(function(cacheNames) {
    return Promise.all(
      cacheNames.map(function(cacheName) {
        return caches.delete(cacheName);
      })
    );
  });
}

self.addEventListener('install', function(event) {
  var now = Date.now();

  event.waitUntil(
    caches.keys().then(function(allCacheNames) {
      return Promise.all(
        Object.keys(CurrentCacheNamesToAbsoluteUrl).filter(function(cacheName) {
          return allCacheNames.indexOf(cacheName) === -1;
        }).map(function(cacheName) {
          var urlWithCacheBusting = getCacheBustedUrl(CurrentCacheNamesToAbsoluteUrl[cacheName],
            now);

          return caches.open(cacheName).then(function(cache) {
            var request = new Request(urlWithCacheBusting, {credentials: 'same-origin'});
            return fetch(request).then(function(response) {
              if (response.ok) {
                return cache.put(CurrentCacheNamesToAbsoluteUrl[cacheName], response);
              }

              console.error('Request for %s returned a response with status %d, so not attempting to cache it.',
                urlWithCacheBusting, response.status);
              // Get rid of the empty cache if we can't add a successful response to it.
              return caches.delete(cacheName);
            });
          });
        })
      ).then(function() {
        return Promise.all(
          allCacheNames.filter(function(cacheName) {
            return cacheName.indexOf(CacheNamePrefix) === 0 &&
                   !(cacheName in CurrentCacheNamesToAbsoluteUrl);
          }).map(function(cacheName) {
            return caches.delete(cacheName);
          })
        );
      });
    }).then(function() {
      if (typeof self.skipWaiting === 'function') {
        // Force the SW to transition from installing -> active state
        self.skipWaiting();
      }
    })
  );
});

if (self.clients && (typeof self.clients.claim === 'function')) {
  self.addEventListener('activate', function(event) {
    event.waitUntil(self.clients.claim());
  });
}

self.addEventListener('message', function(event) {
  if (event.data.command === 'delete_all') {
    console.log('About to delete all caches...');
    deleteAllCaches().then(function() {
      console.log('Caches deleted.');
      event.ports[0].postMessage({
        error: null
      });
    }).catch(function(error) {
      console.log('Caches not deleted:', error);
      event.ports[0].postMessage({
        error: error
      });
    });
  }
});


self.addEventListener('fetch', function(event) {
  if (event.request.method === 'GET') {
    var urlWithoutIgnoredParameters = stripIgnoredUrlParameters(event.request.url,
      IgnoreUrlParametersMatching);

    var cacheName = AbsoluteUrlToCacheName[urlWithoutIgnoredParameters];
    var directoryIndex = 'index.html';
    if (!cacheName && directoryIndex) {
      urlWithoutIgnoredParameters = addDirectoryIndex(urlWithoutIgnoredParameters, directoryIndex);
      cacheName = AbsoluteUrlToCacheName[urlWithoutIgnoredParameters];
    }

    var navigateFallback = '';
    // Ideally, this would check for event.request.mode === 'navigate', but that is not widely
    // supported yet:
    // https://code.google.com/p/chromium/issues/detail?id=540967
    // https://bugzilla.mozilla.org/show_bug.cgi?id=1209081
    if (!cacheName && navigateFallback && event.request.headers.has('accept') &&
        event.request.headers.get('accept').includes('text/html')) {
      var navigateFallbackUrl = new URL(navigateFallback, self.location);
      cacheName = AbsoluteUrlToCacheName[navigateFallbackUrl.toString()];
    }

    if (cacheName) {
      event.respondWith(
        // Rely on the fact that each cache we manage should only have one entry, and return that.
        caches.open(cacheName).then(function(cache) {
          return cache.keys().then(function(keys) {
            return cache.match(keys[0]).then(function(response) {
              if (response) {
                return response;
              }
              // If for some reason the response was deleted from the cache,
              // raise and exception and fall back to the fetch() triggered in the catch().
              throw Error('The cache ' + cacheName + ' is empty.');
            });
          });
        }).catch(function(e) {
          console.warn('Couldn\'t serve response for "%s" from cache: %O', event.request.url, e);
          return fetch(event.request);
        })
      );
    }
  }
});

