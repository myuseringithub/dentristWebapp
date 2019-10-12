<?php

// Add "order" indexes.
// add domain specific custom elements.

// Firebase autoload
require_once( '/var/www/sharedFiles/composer_dependencyManager/services_dependency/vendor/autoload.php');

const DEFAULT_URL = 'https://intense-heat-1283.firebaseio.com/';
const DEFAULT_TOKEN = ''; // firebase tokens
const DEFAULT_PATH = '/';

$firebase = new \Firebase\FirebaseLib(DEFAULT_URL, DEFAULT_TOKEN);


$stylesheets =[];
$javascripts =[];
$elements =[];
$conditions =[];
include('elements.list.php');
include('javascripts.list.php');
include('stylesheets.list.php');
include('conditions.list.php');

// // --- storing an array ---
$domains = [
  // "dentrist.com",
  // "wordpresswebappwpdev.webapp.run",
  // // "assalammd.com",
  "gaziteng.com"
];
// $dateTime = new DateTime();
// $firebase->set(DEFAULT_PATH . '/' . $dateTime->format('c'), $test);

foreach ($domains as $key => $domain) {
    $domain = str_replace(".", "",$domain);

    // $firebaseData['stylesheets'] = json_decode($firebase->get(DEFAULT_PATH  . '/domains/'. $domain . '/stylesheets'), true);
    // $firebaseData['conditions'] = json_decode($firebase->get(DEFAULT_PATH  . '/domains/'. $domain . '/conditions'), true );
    // $firebaseData['elements'] = json_decode($firebase->get(DEFAULT_PATH  . '/domains/'. $domain . '/elements'), true);
    // $firebaseData['javascripts'] = json_decode($firebase->get(DEFAULT_PATH  . '/domains/'. $domain . '/javascripts'), true);

    // addOrderToFields($firebase, $domain, $stylesheets, $conditions, $javascripts, $elements);

    // $matchingKeys = array_keys( array_diff($firebaseData['stylesheets'] ,$stylesheets ) );

    // foreach ($stylesheets as $key => $stylesheet) {
    //   $firebase->set(DEFAULT_PATH . '/domains/'. $domain . '/stylesheets' . '/' . $key , $stylesheet);
    // }

    // $domainTree = json_decode($firebase->get(DEFAULT_PATH  . '/domains/'. $domain), true);
    // $firebase->set(DEFAULT_PATH . '/domains/'. 'q' , $domainTree);



    // Add custom elements
    $elements = [];
    $elements = array_merge($elements, [
      // [
      //   'order' => 72,
      //   'path'  =>  'custom',
      //   'source'  =>  '/elements/projects-data.html',
      //   'type'  =>  'linkImport',
      // ],
      // [
      //   'order' => 73,
      //   'path'  =>  'custom',
      //   'source'  =>  '/elements/projects-view.html',
      //   'type'  =>  'linkImport',
      // ],
      // [
      //   'order' => 74,
      //   'path'  =>  'custom',
      //   'source'  =>  '/elements/projects-item.html',
      //   'type'  =>  'linkImport',
      // ],
      // [
      //   'order' => 75,
      //   'path'  =>  'sharedCustom',
      //   'source'  =>  '/elements/custom_elements/behaviors/szn-appbehavior.html',
      //   'type'  =>  'linkImport',
      // ],
      // [
      //   'order' => 76,
      //   'path'  =>  'bowerComponents',
      //   'source'  =>  '/iron-image/iron-image.html',
      //   'type'  =>  'linkImport',
      // ],
      // [
      //   'order' => 77,
      //   'path'  =>  'custom',
      //   'source'  =>  '/elements/projects-detail.html',
      //   'type'  =>  'linkImport',
      // ],
      // [
      //   'order' => 78,
      //   'path'  =>  'custom',
      //   'source'  =>  '/elements/projects-list.html',
      //   'type'  =>  'linkImport',
      // ],
      // [
      //   'order' => 79,
      //   'path'  =>  'bowerComponents',
      //   'source'  =>  '/google-map/google-map.html',
      //   'type'  =>  'linkImport',
      // ],
      // [
      //   'order' => 80,
      //   'path'  =>  'bowerComponents',
      //   'source'  =>  '/firebase-element/firebase-collection.html',
      //   'type'  =>  'linkImport',
      // ],
      // [
      //   'order' => 81,
      //   'path'  =>  'bowerComponents',
      //   'source'  =>  '/firebase-element/firebase-auth.html',
      //   'type'  =>  'linkImport',
      // ],
      // [
      //   'order' => 82,
      //   'path'  =>  'bowerComponents',
      //   'source'  =>  '/firebase-element/firebase-document.html',
      //   'type'  =>  'linkImport',
      // ],



      // CONDIITIONS
      // [
      //   'order' => 83,
      //   'path'  =>  'sharedApp',
      //   'source'  =>  'is_logged_n_memeber.condition.php',
      //   'type'  =>  'function',
      // ],


    ]);
    // $snapshot = pushArray($firebase, [$domain, '/files/conditions/'], $elements);



    // Add custom elements
    $javascripts = [];
    $javascripts = array_merge($javascripts, [

    ]);
    // $snapshot = pushArray($firebase, [$domain, '/javascripts/'], $javascripts);

    $codeblocks = [];
    $codeblocks = array_merge($codeblocks, [
      // [
      //   'order' => 1,
      //   'path'  =>  'sharedApp',
      //   'source'  =>  '/templates/codeblocks/webcomponents-polymer-settings.codeblock.php',
      //   'filePositionInPage' => 'SZN_after_head_tag',
      //   'parameters'  =>  [ 'dom' => 'shady', 'lazyRegister' => 'false' ],
      // ],
      // [
      //   'order' => 2,
      //   'path'  =>  'app',
      //   'source'  =>  '/templates/codeblocks/metadata.codeblock.php',
      //   'filePositionInPage' => 'SZN_after_head_tag',
      // ],
      // [
      //   'order' => 3,
      //   'path'  =>  'app',
      //   'source'  =>  '/templates/codeblocks/setup-post-data.codeblock.php',
      //   'filePositionInPage' => 'SZN_after_head_tag',
      // ],

    ]);
    // $snapshot = pushArray($firebase, [$domain, '/files/codeblocks/'], $codeblocks);

    // Add custom elements
    $views = [];
    $views = array_merge($views, [
        // [
        //   'viewFile' => 'app-drawer-panel.layout.php',
        //   'queryargsFiles'  =>  'x',
        //   'children'  =>  [
        //       [
        //         'key' =>  'x',
        //         'position'  =>  'content'
        //       ],
        //     ]
        // ],
        //
        // [
        //   'viewFile' => 'studyfield-single.view.php',
        //   'queryargsFiles'  =>  'x',
        //   'children'  =>  [
        //     [
        //       'key' =>  'x',
        //       'position'  =>  'masonryRecentposts'
        //     ],
        //     [
        //       'key' =>  'x',
        //       'position'  =>  'masonryChildrenofparentid'
        //     ]
        //   ]
        // ],
        //
        // [
        //   'viewFile' => 'masonry.view.php',
        //   'queryargsFiles'  =>  [
        //     'main'  =>  'studyfield-recentpostsinterm.queryargs.php'
        //   ],
        //   'children'  =>  [
        //   ],
        // ],
        //
        // [
        //   'viewFile' => 'masonry.view.php',
        //   'queryargsFiles'  =>  [
        //     'main'  =>  'studyfield-childrenofparentid.queryargs.php'
        //   ],
        //   'children'  =>  [
        //   ],
        // ],

        // [
        //   'viewFile' => 'masonry.view.php',
        //   'queryargsFiles'  =>  [
        //     'main'  =>  'studyfield-childrenofparentid.queryargs.php'
        //   ],
        //   'children'  =>  [
        //   ],
        // ],


    ]);
    // $snapshot = pushArray($firebase, [$domain, '/routes/single-studyfield/views/'], $views);


    // Add custom elements
    $views = [];
    $views = array_merge($views, [
        // [
        //   'templateFile' => 'app-drawer-panel.layout.php',
        //   'queryargsFiles'  =>  'x',
        //   'childrenViews'  =>  [
        //       [
        //         'viewKey' =>  'Vx',
        //         'insertionPosition'  =>  'content'
        //       ],
        //   ],
        //   'viewTreePaths' =>  [
        //     '/Vx/Vy/Vi/',
        //     '/Vx/Vy/',
        //     '/Vx/Vz/',
        //   ],
        //   'parentsViews'  =>  [
        //     ''
        //   ]
        // ],

        // [
        //   'templateFile' => 'drawer-sidenavigation.view.php',
        // 	'queryargsFiles' => [
        // 												'main' => 'main-menu.queryargs.php'
        // 											],
        // 	'conditionalQueryFiles' => [
        // 															'secondary' => 'drawer-sidenavigation-menulist.conditions.php'
        // 														],
        //   'viewTreePaths' =>  [
        //     '/',
        //   ],
        //   'parentsViews'  =>  [
        //     ''
        //   ]
        // ],

        // [
        //   'templateFile' => '-KLDopvYEuC3eyV1dVS7',
        // 	'queryargsFiles' => [
        //   												//  'main' => 'archive.queryargs.php'
        // 											],
        // 	'conditionalQueryFiles' => [
        // 															// 'secondary' => 'drawer-sidenavigation-menulist.conditions.php'
        // 														],
        //   'viewTreePaths' =>  [
        //     '/',
        //   ],
        //   'parentsViews'  =>  [
        //     ''
        //   ],
        //   'childrenViews' =>  [
        //     '-KLJIWMkDAuwXsd4he-f'  =>  [
        //       'insertionPosition' =>  'masonry'
        //     ]
        //
        //   ]
        // ],

    ]);
    // $snapshot = pushArray($firebase, [$domain, '/views/'], $views);

    // Add custom elements
    $documents = [];
    $documents = array_merge($documents, [
      // [
      //   'toplevelViewTrees' =>  [
      //     'Tx'
      //   ],
      //   'viewTrees' =>  [
      //     'Tx'  =>  [
      //       'childrenViewTrees' =>  [
      //         'Ty'  =>  [
      //           'viewTreePath'  =>  '0',
      //           'viewInsertionPosition' =>  'content'
      //         ]
      //       ]
      //     ],
      //     'Ty'  =>  [
      //       'childrenViewTrees' =>  [
      //
      //       ]
      //     ]
      //   ]
      // ],

      // [
      //   'toplevelViewTrees' =>  [
      //     'Ttoplevel'
      //   ],
      //   'viewTrees' =>  [
      //     'Ttoplevel'  =>  [
      //       'viewUnit'  => '-KIZoMEUVZd-LU8L1PqU',
      //       'childrenViewTrees' =>  [
      //         'Tcontent'  =>  [
      //           'viewTreePath'  =>  '0',
      //           'viewInsertionPosition' =>  'content'
      //         ]
      //       ]
      //     ],
      //     'Tcontent'  =>  [
      //       'viewUnit'  =>  ' ',
      //       'childrenViewTrees' =>  [
      //
      //       ]
      //     ]
      //   ]
      // ],


    ]);
    // $snapshot = pushArray($firebase, [$domain, '/documents/'], $documents);

    // Add custom elements
    $routes = [];
    $routes = [
        // '404'  =>  [
        //   'document' =>  '-KIlAq439obWPS4taSLI'
        // ],
        // 'archive-article'  =>  [
        //   'document' =>  '-KIlAq439obWPS4taSLI'
        // ],
        // 'archive-book'  =>  [
        //   'document' =>  '-KIlAq439obWPS4taSLI'
        // ],
        // 'archive-case'  =>  [
        //   'document' =>  '-KIlAq439obWPS4taSLI'
        // ],
        // 'archive-eduinstitution'  =>  [
        //   'document' =>  '-KIlAq439obWPS4taSLI'
        // ],
        // 'archive-examination'  =>  [
        //   'document' =>  '-KIlAq439obWPS4taSLI'
        // ],
        // 'archive-mcq'  =>  [
        //   'document' =>  '-KIlAq439obWPS4taSLI'
        // ],
        // 'archive-studyfield'  =>  [
        //   'document' =>  '-KIlAq439obWPS4taSLI'
        // ],
        // 'archive'  =>  [
        //   'document' =>  '-KIlAq439obWPS4taSLI'
        // ],
        // 'index'  =>  [
        //   'document' =>  '-KIlAq439obWPS4taSLI'
        // ],
        // 'page-about'  =>  [
        //   'document' =>  '-KIlAq439obWPS4taSLI'
        // ],
        // 'page-material'  =>  [
        //   'document' =>  '-KIlAq439obWPS4taSLI'
        // ],
        // 'page-store'  =>  [
        //   'document' =>  '-KIlAq439obWPS4taSLI'
        // ],
        // 'page-test'  =>  [
        //   'document' =>  '-KIlAq439obWPS4taSLI'
        // ],
        // 'page'  =>  [
        //   'document' =>  '-KIlAq439obWPS4taSLI'
        // ],
        // 'single-book'  =>  [
        //   'document' =>  '-KIlAq439obWPS4taSLI'
        // ],
        // 'single-eduinstitution'  =>  [
        //   'document' =>  '-KIlAq439obWPS4taSLI'
        // ],
        // 'single-examination'  =>  [
        //   'document' =>  '-KIlAq439obWPS4taSLI'
        // ],
        // 'single-mcq'  =>  [
        //   'document' =>  '-KIlAq439obWPS4taSLI'
        // ],
        // 'single'  =>  [
        //   'document' =>  '-KIlAq439obWPS4taSLI'
        // ],
        // 'taxonomy'  =>  [
        //   'document' =>  '-KIlAq439obWPS4taSLI'
        // ],
    ];
    // $snapshot = pushArray($firebase, [$domain, '/routes/'], $routes);


    $templates = [];
    $templates = array_merge($templates, [
      // [
      //   'templateFile' => 'app-transform-navigation-layout.template.php',
      //   'insertionPositions'  =>  [
      //     // 'headerpanel',
      //     // 'toolbarTitle',
      //     // 'toolbarTitle',
      //     // 'content',
      //     // 'footer'
      //   ]
      // ],

    ]);
    // pushMultipleNestedArrays($firebase, [$domain, '/files/templates/'], $templates, $domain, 'insertionPositions');

    // foreach ($insertionPositions as $key => $insertionPosition) {
    //   $firebase->push(DEFAULT_PATH . '/domains/'. $domain . '/files/templates/'. $snapshot->name . '/insertionPositions/' , $insertionPosition);
    // }

  // copyTree($firebase, '/domains/'.$domain.'/__datablueprint__', '/domains/'.$domain.'/settings/dataBlueprint');

}

function pushMultipleNestedArrays($firebase, $paths, $arrays, $domain, $nestedArrayKey) {
  foreach ($arrays as $key => $array) {
    $nestedArrayValues = $array[$nestedArrayKey];
    unset($array[$nestedArrayKey]);
    $snapshot = pushArray($firebase, $paths, [$array]);
    foreach ($nestedArrayValues as $key => $nestedArrayValue) {
      pushArray($firebase, [$domain, 'files/templates', $snapshot->name, $nestedArrayKey], [$nestedArrayValue]);
    }
  }
}

function pushArray($firebase, $paths, $array) {
  $path = join_paths($paths);
  foreach ($array as $key => $value) {
    echo $key;
    if(is_string($key)) {
      $snapshot = json_decode($firebase->set(join_paths([DEFAULT_PATH, 'domains', $path, $key]), $value));
    } else {
      $snapshot = json_decode($firebase->push(join_paths([DEFAULT_PATH, 'domains', $path]), $value));
    }
  }
  return $snapshot;
}

function inserToDatabase($firebase, $domain, $stylesheets, $conditions, $javascripts, $elements) {

  foreach ($conditions as $key => $condition) {
    $firebase->push(DEFAULT_PATH . '/domains/'. $domain . '/conditions' , $condition);
  }

  foreach ($elements as $key => $element) {
    $firebase->push(DEFAULT_PATH . '/domains/'. $domain . '/elements' , $element);
  }

  foreach ($stylesheets as $key => $stylesheet) {
    $firebase->push(DEFAULT_PATH . '/domains/'. $domain . '/stylesheets' , $stylesheet);
  }

  foreach ($javascripts as $key => $javascript) {
    $firebase->push(DEFAULT_PATH . '/domains/'. $domain . '/javascripts' , $javascript);
  }

}

function addOrderToFields($firebase, $domain, $stylesheets, $conditions, $javascripts, $elements) {

  $index = 0;
  foreach ($conditions as $key => $condition) {
    $condition['order'] = $index;
    $firebase->push(DEFAULT_PATH . '/domains/'. $domain . '/conditions' , $condition);
    $index++;
  }

  $index = 0;
  foreach ($elements as $key => $element) {
    $element['order'] = $index;

    $firebase->push(DEFAULT_PATH . '/domains/'. $domain . '/elements' , $element);
    $index++;
  }

  $index = 0;
  foreach ($stylesheets as $key => $stylesheet) {
    $stylesheet['order'] = $index;

    $firebase->push(DEFAULT_PATH . '/domains/'. $domain . '/stylesheets' , $stylesheet);
    $index++;
  }

  $index = 0;
  foreach ($javascripts as $key => $javascript) {
    $javascript['order'] = $index;

    $firebase->push(DEFAULT_PATH . '/domains/'. $domain . '/javascripts' , $javascript);
    $index++;
  }

}

function copyTree($firebase, $sourcePath, $destinationPath) {

  $dataTree = json_decode($firebase->get(DEFAULT_PATH  . $sourcePath), true);
  $firebase->set(DEFAULT_PATH . $destinationPath, $dataTree);


}


function join_paths() { // using function get args will get all inserted variables in the call.
  $paths = array();
  $args = func_get_args();
  if(is_array($args[0])) { // inorder to support transfering the function from other class to this Utility class.
    $args = $args[0];
  }

  foreach ($args as $arg) {
      if ($arg !== '') { $paths[] = $arg; }
  }

  if(filter_var($paths[0], FILTER_VALIDATE_URL)) { // if a url
    $protocol = strtolower(substr($paths[0],0,strpos( $paths[0],'/'))).'//'; // get https:// or http:// from first part.
    $paths[0] = preg_replace("(^https?://)", "", $paths[0] );
    return $protocol . preg_replace('#/+#','/',join('/', $paths)); // combine paths and add protocol
  } else { // absolute path directory
    return preg_replace('#/+#','/',join('/', $paths));
  }
}


?>
