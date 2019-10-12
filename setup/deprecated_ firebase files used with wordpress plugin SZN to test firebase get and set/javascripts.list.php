<?php
$javascripts =[];

// JAVASCRIPT
$javascripts = array_merge($javascripts, [
      // Bootstrap creates problems with the elements ~!!!
      // 'bootstrap' =>  [
      //   'source'  =>  '/javascripts/addons_library/bootstrap.min.js',
      //   'filePositionInPage'  =>  'general',
      //   'path'  =>  'sharedApp',
      // ],
      [
      'name'  =>  'idangerous.swiper.min.js',
      'source'  =>  '/javascripts/addons_library/idangerous.swiper.min.js',
      'filePositionInPage'  =>  'general',
      'path'  =>  'sharedApp',
    ],
      [
      'name'  =>  'idangerous.swiper.hashnav.min.js',
      'source'  =>  '/javascripts/addons_library/idangerous.swiper.hashnav.min.js',
      'filePositionInPage'  =>  'general',
      'path'  =>  'sharedApp',
    ],
      [
      'name'  =>  'menu-aim',
      'source'  =>  '/javascripts/addons_library/jquery.menu-aim.js',
      'filePositionInPage'  =>  'general',
      'path'  =>  'sharedApp',
    ],
      [
      'name'  =>  'mousewheel',
      'source'  =>  '/javascripts/addons_library/jquery.mousewheel.min.js',
      'filePositionInPage'  =>  'general',
      'path'  =>  'sharedApp',
    ],
      [
      'name'  =>  'ResponsiveSlides',
      'source'  =>  '/ResponsiveSlides/responsiveslides.min.js',
      'filePositionInPage'  =>  'general',
      'path'  =>  'bower',
    ],
      [
      'name'  =>  'masonryJS',
      'source'  =>  '/masonry/dist/masonry.pkgd.min.js',
      'filePositionInPage'  =>  'general',
      'path'  =>  'bower',
    ]
]);

$javascripts = array_merge($javascripts, [
  //wp_enqueue_script('masonry', plugins_url('/javascripts/addons_library/masonry.pkgd.min.js', __FILE__ ), array('jquery'), null, false);
    [
    'name'  =>  'imagesloaded',
      'source'  =>  '/javascripts/addons_library/imagesloaded.pkgd.min.js',
      'filePositionInPage'  =>  'general',
      'path'  =>  'sharedApp',
    ],
  // wp_enqueue_script('ipin_masonryold', get_template_directory_uri() . '/javascripts/addons_library/jquery.masonry.min.js', array('jquery'), null, false);
    [
    'name'  =>  'infinitescroll',
      'source'  =>  '/javascripts/addons_library/jquery.infinitescroll.min.js',
      'filePositionInPage'  =>  'general',
      'path'  =>  'sharedApp',
    ]
]);


//Include FancyBox JAVASCRIPT
$javascripts = array_merge($javascripts, [
    [
    'name'  =>  'fancyboxPack',
      'source'  =>  '/fancybox/source/jquery.fancybox.pack.js',
      'filePositionInPage'  =>  'general',
      'path'  =>  'bower',
    ],
    [
    'name'  =>  'facybox-button-js',
      'source'  =>  '/fancybox/source/helpers/jquery.fancybox-buttons.js',
      'filePositionInPage'  =>  'general',
      'path'  =>  'bower',
    ],
    [
    'name'  =>  'fancybox-media-js',
      'source'  =>  '/fancybox/source/helpers/jquery.fancybox-media.js',
      'filePositionInPage'  =>  'general',
      'path'  =>  'bower',
    ],
    [
    'name'  =>  'fancybox-thumbs.js',
      'source'  =>  '/fancybox/source/helpers/jquery.fancybox-thumbs.js',
      'filePositionInPage'  =>  'general',
      'path'  =>  'bower',
    ],
    [
    'name'  =>  'modernizr',
      'source'  =>  '/javascripts/addons_library/Woothemes-FlexSlider2/js/modernizr.js',
      'filePositionInPage'  =>  'general',
      'path'  =>  'sharedApp',
    ],
    [
    'name'  =>  'flexslider',
      'source'  =>  '/javascripts/addons_library/Woothemes-FlexSlider2/js/jquery.flexslider.js',
      'filePositionInPage'  =>  'general',
      'path'  =>  'sharedApp',
    ],
    [
    'name'  =>  'shCore',
      'source'  =>  '/javascripts/addons_library/Woothemes-FlexSlider2/js/shCore.js',
      'filePositionInPage'  =>  'general',
      'path'  =>  'sharedApp',
    ],
    [
    'name'  =>  'shBrushXml',
      'source'  =>  '/javascripts/addons_library/Woothemes-FlexSlider2/js/shBrushXml.js',
      'filePositionInPage'  =>  'general',
      'path'  =>  'sharedApp',
    ],
    [
    'name'  =>  'shBrushJScript',
      'source'  =>  '/javascripts/addons_library/Woothemes-FlexSlider2/js/shBrushJScript.js',
      'filePositionInPage'  =>  'general',
      'path'  =>  'sharedApp',
    ],
    [
    'name'  =>  'easing',
      'source'  =>  '/javascripts/addons_library/Woothemes-FlexSlider2/js/jquery.easing.js',
      'filePositionInPage'  =>  'general',
      'path'  =>  'sharedApp',
    ],
    // Check comment what source it comes from ???
    // [
    //   'name'  =>  'comment-reply',
    //   'source'  =>  'comment-reply',
    //   'filePositionInPage'  =>  'general',
    //   'path'  =>  'sharedApp',
    //   'conditions'  => ['-KFZFbSMBU4YBgVlWr2Z']
    // ],
    //wp_enqueue_script('masonry', plugins_url('/javascripts/addons_library/masonry.pkgd.min.js', __FILE__ ), array('jquery'), null, false);
      [
      'name'  =>  'imagesloaded',
        'source'  =>  '/javascripts/addons_library/imagesloaded.pkgd.min.js',
        'filePositionInPage'  =>  'general',
        'path'  =>  'sharedApp',
        // 'conditions'  => ['-KFZFbeSKwLU1aR3tIwf']
      ],
    // wp_enqueue_script('ipin_masonryold', get_template_directory_uri() . '/javascripts/addons_library/jquery.masonry.min.js', array('jquery'), null, false);
      [
      'name'  =>  'infinitescroll',
        'source'  =>  '/javascripts/addons_library/jquery.infinitescroll.min.js',
        'filePositionInPage'  =>  'general',
        'path'  =>  'sharedApp',
        // 'conditions'  => ['-KFZFbeSKwLU1aR3tIwf']
      ]
]);

$javascripts = array_merge($javascripts, [
    [
    'name'  =>  'admin-script',
      'source'  =>  '/javascripts/admin-script.js',
      'filePositionInPage'  =>  'admin',
      'path'  =>  'sharedApp',
    ]
]);

$javascripts = array_merge($javascripts, [
    [
    'name'  =>  '/javascripts/idangerous-swiper-loader.js.php',
      'source'  =>  '/javascripts/idangerous-swiper-loader.js.php',
      'filePositionInPage'  =>  'footer',
      'path'  =>  'sharedApp',
    ],
    [
    'name'  =>  '/javascripts/masonry-loader.js.php',
      'source'  =>  '/javascripts/masonry-loader.js.php',
      'filePositionInPage'  =>  'footer',
      'path'  =>  'sharedApp',
    ],
    [
    'name'  =>  '/javascripts/infinite-scroll.js.php',
      'source'  =>  '/javascripts/infinite-scroll.js.php',
      'filePositionInPage'  =>  'footer',
      'path'  =>  'sharedApp',
    ],
    [
    'name'  =>  '/javascripts/brick.js.php',
      'source'  =>  '/javascripts/brick.js.php',
      'filePositionInPage'  =>  'footer',
      'path'  =>  'sharedApp',
    ],
    [
    'name'  =>  '/javascripts/brick-responsiveslides.js.php',
      'source'  =>  '/javascripts/brick-responsiveslides.js.php',
      'filePositionInPage'  =>  'footer',
      'path'  =>  'sharedApp',
    ],
    [
    'name'  =>  '/javascripts/scroll-top.js.php',
      'source'  =>  '/javascripts/scroll-top.js.php',
      'filePositionInPage'  =>  'footer',
      'path'  =>  'sharedApp',
    ],
    [
    'name'  =>  '/javascripts/mobile-orientation-refresh.js.php',
      'source'  =>  '/javascripts/mobile-orientation-refresh.js.php',
      'filePositionInPage'  =>  'footer',
      'path'  =>  'sharedApp',
    ],
    [
    'name'  =>  '/javascripts/secondary-top-menu.js.php',
      'source'  =>  '/javascripts/secondary-top-menu.js.php',
      'filePositionInPage'  =>  'footer',
      'path'  =>  'sharedApp',
    ],
    [
    'name'  =>  '/javascripts/side-menu.js.php',
      'source'  =>  '/javascripts/side-menu.js.php',
      'filePositionInPage'  =>  'footer',
      'path'  =>  'sharedApp',
    ],
    [
      'name'  =>  '/javascripts/singlepage-flexable-design.js.php',
      'source'  =>  '/javascripts/singlepage-flexable-design.js.php',
      'filePositionInPage'  =>  'footer',
      'path'  =>  'sharedApp',
    ],
    [
      'name'  =>  '/javascripts/flex-slider.js.php',
      'source'  =>  '/javascripts/flex-slider.js.php',
      'filePositionInPage'  =>  'footer',
      'path'  =>  'sharedApp',
    ],
    [
      'name'  =>  '/javascripts/fancybox.js.php',
      'source'  =>  '/javascripts/fancybox.js.php',
      'filePositionInPage'  =>  'footer',
      'path'  =>  'sharedApp',
      // 'conditions'  => ['-KFZFbeSKwLU1aR3tIwf']
    ],
    [
      'name'  =>  '/javascripts/footer-scripts.js.php',
      'source'  =>  '/javascripts/footer-scripts.js.php',
      'filePositionInPage'  =>  'footer',
      'path'  =>  'sharedApp'
    ]

]);
