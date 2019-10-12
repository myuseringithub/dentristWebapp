<?php
$stylesheets =[];

$stylesheets = array_merge($stylesheets, [
      [
        'name'  =>  'css_simple_reset',
        'source'  =>  '/styles/css_simple_reset.css',
        'filePositionInPage'  =>  'general',
        'path'  =>  'sharedApp',
      ],
      [
        'name'  =>  'bootstrap',
        'source'  =>  '/styles/bootstrap.css',
        'filePositionInPage'  =>  'general',
        'path'  =>  'sharedApp',
      ],
        [
          'name'  =>  'main',
          'source'  =>  '/styles/main.css',
          'filePositionInPage'  =>  'general',
          'path'  =>  'sharedApp',
        ],

]);

$stylesheets = array_merge($stylesheets, [
    [
    'name'  =>  'Font-Face',
      'source'  =>  '/styles/font-face.css',
      'filePositionInPage'  =>  'general',
      'path'  =>  'sharedApp',
    ],
    [
    'name'  =>  'admin-style',
      'source'  =>  '/styles/admin-style.css',
      'filePositionInPage'  =>  'general',
      'path'  =>  'sharedApp',
    ],
    [
    'name'  =>  'font-awesome',
      'source'  =>  '/styles/font-awesome/css/font-awesome.min.css',
      'filePositionInPage'  =>  'general',
      'path'  =>  'sharedApp',
    ],
    [
    'name'  =>  'loader',
      'source'  =>  '/styles/loader.css',
      'filePositionInPage'  =>  'general',
      'path'  =>  'sharedApp',
    ],
    [
    'name'  =>  'top-navigation',
      'source'  =>  '/styles/top-navigation.css',
      'filePositionInPage'  =>  'general',
      'path'  =>  'sharedApp',
    ],
    [
    'name'  =>  'side-navigation',
      'source'  =>  '/styles/side-navigation.css',
      'filePositionInPage'  =>  'general',
      'path'  =>  'sharedApp',
    ],
    [
    'name'  =>  'masonry',
      'source'  =>  '/styles/masonry.css',
      'filePositionInPage'  =>  'general',
      'path'  =>  'sharedApp',
    ],
    [
    'name'  =>  'effects',
      'source'  =>  '/styles/effects.css',
      'filePositionInPage'  =>  'general',
      'path'  =>  'sharedApp',
    ],
    [
    'name'  =>  'singlepage',
      'source'  =>  '/styles/singlepage.css',
      'filePositionInPage'  =>  'general',
      'path'  =>  'sharedApp',
    ],
    [
    'name'  =>  'singlepage-sharing-buttons',
      'source'  =>  '/styles/singlepage-sharing-buttons.css',
      'filePositionInPage'  =>  'general',
      'path'  =>  'sharedApp',
    ],
    [
    'name'  =>  'sidebar',
      'source'  =>  '/styles/sidebar.css',
      'filePositionInPage'  =>  'general',
      'path'  =>  'sharedApp',
    ],
    [
    'name'  =>  'footer',
      'source'  =>  '/styles/footer.css',
      'filePositionInPage'  =>  'general',
      'path'  =>  'sharedApp',
    ],
    [
    'name'  =>  'mobile',
      'source'  =>  '/styles/mobile.css',
      'filePositionInPage'  =>  'general',
      'path'  =>  'sharedApp',
    ],
     [
     'name'  =>  'flexslider2',
       'source'  =>  '/javascripts/addons_library/Woothemes-FlexSlider2/css/flexslider.css',
       'filePositionInPage'  =>  'general',
       'path'  =>  'sharedApp',
     ],
     [
     'name'  =>  'idangerous.swiper',
       'source'  =>  '/styles/idangerous.swiper.css',
       'filePositionInPage'  =>  'general',
       'path'  =>  'sharedApp',
     ],
     [
     'name'  =>  'fancyboxCSS',
       'source'  =>  '/fancybox/source/jquery.fancybox.css',
       'filePositionInPage'  =>  'general',
       'path'  =>  'bower',
     ],
     [
     'name'  =>  'fancybox-button-css',
       'source'  =>  '/fancybox/source/helpers/jquery.fancybox-buttons.css',
       'filePositionInPage'  =>  'general',
       'path'  =>  'bower',
     ],
     [
     'name'  =>  'fancybox-thumbs-css',
       'source'  =>  '/fancybox/source/helpers/jquery.fancybox-thumbs.css',
       'filePositionInPage'  =>  'general',
       'path'  =>  'bower',
     ],

]);

$stylesheets = array_merge($stylesheets, [
    [
      'name'  =>  'page_specific_css',
      // 'source'  =>  $filerelativedirectory,
      'filePositionInPage'  =>  'general',
      'path'  =>  'sharedApp',
    ]
]);

// ADD STYLESHEET TO ADMIN AREA - admin-style.css
$stylesheets = array_merge($stylesheets, [
    [
    'name'  =>  'admin_css_bar',
      'source'  =>  '/styles/admin-style.css',
      'filePositionInPage'  =>  'admin',
      'path'  =>  'sharedApp',
    ],
]);
