<?php
$elements =[];

// JAVASCRIPT
$elements = array_merge($elements, [

  //____________________  BOWER LINK
  [
    'path'  =>  'bowerComponents',
    'source'  =>  '/iron-collapse/iron-collapse.html',
    'type'  =>  'linkImport',
  ],
  [
    'path'  =>  'bowerComponents',
    'source'  =>  '/paper-drawer-panel/paper-drawer-panel.html',
    'type'  =>  'linkImport',
  ],
  [
    'path'  =>  'bowerComponents',
    'source'  =>  '/paper-ripple/paper-ripple.html',
    'type'  =>  'linkImport',
  ],
  [
    'path'  =>  'bowerComponents',
    'source'  =>  '/paper-material/paper-material.html',
    'type'  =>  'linkImport',
  ],
  [
    'path'  =>  'bowerComponents',
    'source'  =>  '/paper-button/paper-button.html',
    'type'  =>  'linkImport',
  ],
  [
    'path'  =>  'bowerComponents',
    'source'  =>  '/iron-media-query/iron-media-query.html',
    'type'  =>  'linkImport',
  ],
  [
    'path'  =>  'bowerComponents',
    'source'  =>  '/iron-selector/iron-selector.html',
    'type'  =>  'linkImport',
  ],
  [
    'path'  =>  'bowerComponents',
    'source'  =>  '/paper-toolbar/paper-toolbar.html',
    'type'  =>  'linkImport',
  ],
  [
    'path'  =>  'bowerComponents',
    'source'  =>  '/paper-header-panel/paper-header-panel.html',
    'type'  =>  'linkImport',
  ],
  [
    'path'  =>  'bowerComponents',
    'source'  =>  '/paper-scroll-header-panel/paper-scroll-header-panel.html',
    'type'  =>  'linkImport',
  ],
  [
    'path'  =>  'bowerComponents',
    'source'  =>  '/paper-card/paper-card.html',
    'type'  =>  'linkImport',
  ],
  [
    'path'  =>  'bowerComponents',
    'source'  =>  '/iron-dropdown/iron-dropdown.html',
    'type'  =>  'linkImport',
  ],
  [
    'path'  =>  'bowerComponents',
    'source'  =>  '/iron-icon/iron-icon.html',
    'type'  =>  'linkImport',
  ],
  [
    'path'  =>  'bowerComponents',
    'source'  =>  '/iron-iconset/iron-iconset.html',
    'type'  =>  'linkImport',
  ],
  [
    'path'  =>  'bowerComponents',
    'source'  =>  '/iron-icons/iron-icons.html',
    'type'  =>  'linkImport',
  ],
  [
    'path'  =>  'bowerComponents',
    'source'  =>  '/iron-icons/communication-icons.html',
    'type'  =>  'linkImport',
  ],
  [
    'path'  =>  'bowerComponents',
    'source'  =>  '/iron-icons/av-icons.html',
    'type'  =>  'linkImport',
  ],
  [
    'path'  =>  'bowerComponents',
    'source'  =>  '/iron-icons/device-icons.html',
    'type'  =>  'linkImport',
  ],
  [
    'path'  =>  'bowerComponents',
    'source'  =>  '/iron-icons/editor-icons.html',
    'type'  =>  'linkImport',
  ],
  [
    'path'  =>  'bowerComponents',
    'source'  =>  '/iron-icons/hardware-icons.html',
    'type'  =>  'linkImport',
  ],
  [
    'path'  =>  'bowerComponents',
    'source'  =>  '/iron-icons/image-icons.html',
    'type'  =>  'linkImport',
  ],
  [
    'path'  =>  'bowerComponents',
    'source'  =>  '/iron-icons/maps-icons.html',
    'type'  =>  'linkImport',
  ],
  [
    'path'  =>  'bowerComponents',
    'source'  =>  '/iron-icons/notification-icons.html',
    'type'  =>  'linkImport',
  ],
  [
    'path'  =>  'bowerComponents',
    'source'  =>  '/iron-icons/social-icons.html',
    'type'  =>  'linkImport',
  ],
  [
    'path'  =>  'bowerComponents',
    'source'  =>  '/iron-meta/iron-meta.html',
    'type'  =>  'linkImport',
  ],
  [
    'path'  =>  'bowerComponents',
    'source'  =>  '/iron-ajax/iron-ajax.html',
    'type'  =>  'linkImport',
  ],
  [
    'path'  =>  'bowerComponents',
    'source'  =>  '/iron-image/iron-image.html',
    'type'  =>  'linkImport',
  ],
  [
    'path'  =>  'bowerComponents',
    'source'  =>  '/paper-menu/paper-menu.html',
    'type'  =>  'linkImport',
  ],
  [
    'path'  =>  'bowerComponents',
    'source'  =>  '/paper-input/paper-input.html',
    'type'  =>  'linkImport',
  ],
  [
    'path'  =>  'bowerComponents',
    'source'  =>  '/paper-spinner/paper-spinner.html',
    'type'  =>  'linkImport',
  ],
  [
    'path'  =>  'bowerComponents',
    'source'  =>  '/paper-styles/paper-styles-classes.html',
    'type'  =>  'linkImport',
  ],
  [
    'path'  =>  'bowerComponents',
    'source'  =>  '/paper-item/paper-item.html',
    'type'  =>  'linkImport',
  ],
  [
    'path'  =>  'bowerComponents',
    'source'  =>  '/iron-pages/iron-pages.html',
    'type'  =>  'linkImport',
  ],
  [
    'path'  =>  'bowerComponents',
    'source'  =>  '/iron-page-url/iron-page-url.html',
    'type'  =>  'linkImport',
  ],
  [
    'path'  =>  'bowerComponents',
    'source'  =>  '/paper-toast/paper-toast.html',
    'type'  =>  'linkImport',
  ],
  [
    'path'  =>  'bowerComponents',
    'source'  =>  '/paper-item/paper-item-body.html',
    'type'  =>  'linkImport',
  ],
  [
    'path'  =>  'bowerComponents',
    'source'  =>  '/paper-item/paper-icon-item.html',
    'type'  =>  'linkImport',
  ],
  [
    'path'  =>  'bowerComponents',
    'source'  =>  '/paper-tabs/paper-tabs.html',
    'type'  =>  'linkImport',
  ],
  [
    'path'  =>  'bowerComponents',
    'source'  =>  '/paper-tabs/paper-tab.html',
    'type'  =>  'linkImport',
  ],
  [
    'path'  =>  'bowerComponents',
    'source'  =>  '/paper-dialog/paper-dialog.html',
    'type'  =>  'linkImport',
  ],
  [
    'path'  =>  'bowerComponents',
    'source'  =>  '/paper-dialog-scrollable/paper-dialog-scrollable.html',
    'type'  =>  'linkImport',
  ],
  [
    'path'  =>  'bowerComponents',
    'source'  =>  '/app-layout/app-layout.html',
    'type'  =>  'linkImport',
  ],
  [
    'path'  =>  'bowerComponents',
    'source'  =>  '/app-layout/app-scroll-effects/app-scroll-effects.html',
    'type'  =>  'linkImport',
  ],
  [
    'path'  =>  'bowerComponents',
    'source'  =>  '/iron-a11y-keys-behavior/iron-a11y-keys-behavior.html',
    'type'  =>  'linkImport',
  ],
  [
    'path'  =>  'bowerComponents',
    'source'  =>  '/paper-fab/paper-fab.html',
    'type'  =>  'linkImport',
  ],
  [
    'path'  =>  'bowerComponents',
    'source'  =>  '/iron-flex-layout/classes/iron-flex-layout.html',
    'type'  =>  'linkImport',
  ],
  [
    'path'  =>  'bowerComponents',
    'source'  =>  '/iron-flex-layout/iron-flex-layout-classes.html',
    'type'  =>  'linkImport',
  ],
  [
    'path'  =>  'bowerComponents',
    'source'  =>  '/neon-animation/neon-animated-pages.html',
    'type'  =>  'linkImport',
  ],
  [
    'path'  =>  'bowerComponents',
    'source'  =>  '/neon-animation/neon-animatable.html',
    'type'  =>  'linkImport',
  ],
  [
    'path'  =>  'bowerComponents',
    'source'  =>  '/neon-animation/neon-animations.html',
    'type'  =>  'linkImport',
  ],
  [
    'path'  =>  'bowerComponents',
    'source'  =>  '/neon-animation/neon-animation-behavior.html',
    'type'  =>  'linkImport',
  ],
  [
    'path'  =>  'bowerComponents',
    'source'  =>  '/neon-animation/animations/scale-up-animation.html',
    'type'  =>  'linkImport',
  ],
  [
    'path'  =>  'bowerComponents',
    'source'  =>  '/neon-animation/animations/fade-out-animation.html',
    'type'  =>  'linkImport',
  ],
  [
    'path'  =>  'bowerComponents',
    'source'  =>  '/carbon-route/carbon-location.html',
    'type'  =>  'linkImport',
  ],
  [
    'path'  =>  'bowerComponents',
    'source'  =>  '/carbon-route/carbon-route.html',
    'type'  =>  'linkImport',
  ],
  [
    'path'  =>  'bowerComponents',
    'source'  =>  '/iron-image/iron-image.html',
    'type'  =>  'linkImport',
  ],

]);
$elements = array_merge($elements, [

  //____________________  BOWER SCRIPT
  [
    'path'  =>  'bowerComponents',
    'source'  =>  '/time-elements/time-elements.js',
    'type'  =>  'script',
  ],

]);
$elements = array_merge($elements, [

  //____________________  CUSTOM
  [
    'path'  =>  'custom',
    'source'  =>  '/elements/tweaksToOfficialElements/paper-menu-button.html',
    'type'  =>  'linkImport',
  ],
  [
    'path'  =>  'custom',
    'source'  =>  '/elements/title-concept.html',
    'type'  =>  'linkImport',
  ],
  [
    'path'  =>  'custom',
    'source'  =>  '/elements/card-concept.html',
    'type'  =>  'linkImport',
  ],
  [
    'path'  =>  'custom',
    'source'  =>  '/elements/reference-listitem.html',
    'type'  =>  'linkImport',
  ],
  [
    'path'  =>  'custom',
    'source'  =>  '/elements/choice-listitem.html',
    'type'  =>  'linkImport',
  ],
  [
    'path'  =>  'custom',
    'source'  =>  '/elements/mcq-listitem.html',
    'type'  =>  'linkImport',
  ],
  [
    'path'  =>  'custom',
    'source'  =>  '/elements/card-section.html',
    'type'  =>  'linkImport',
  ],
  [
    'path'  =>  'custom',
    'source'  =>  '/elements/list-item.html',
    'type'  =>  'linkImport',
  ],
  [
    'path'  =>  'custom',
    'source'  =>  '/elements/examinations-data.html',
    'type'  =>  'linkImport',
  ],
  [
    'path'  =>  'custom',
    'source'  =>  '/elements/examinations-view.html',
    'type'  =>  'linkImport',
  ],
  [
    'path'  =>  'custom',
    'source'  =>  '/elements/questions-data.html',
    'type'  =>  'linkImport',
  ],
  [
    'path'  =>  'custom',
    'source'  =>  '/elements/questions-list.html',
    'type'  =>  'linkImport',
  ],
  [
    'path'  =>  'custom',
    'source'  =>  '/elements/questions-item.html',
    'type'  =>  'linkImport',
  ],
  [
    'path'  =>  'custom',
    'source'  =>  '/elements/answers-item.html',
    'type'  =>  'linkImport',
  ],

]);
$elements = array_merge($elements, [

  // SharedCustom
  [
    'path'  =>  'sharedCustom',
    'source'  =>  '/elements/custom_elements/transform-navigation.html',
    'type'  =>  'linkImport',
  ],
  [
    'path'  =>  'sharedCustom',
    'source'  =>  '/elements/custom_elements/szn-applayout.html',
    'type'  =>  'linkImport',
  ],
]);


//______________________ Original
// $elements['bowerComponents']['linkImport'] = [
//   '/iron-collapse/iron-collapse.html',
//   '/paper-drawer-panel/paper-drawer-panel.html',
//   '/paper-ripple/paper-ripple.html',
//   '/paper-material/paper-material.html',
//   '/paper-button/paper-button.html',
//   '/iron-media-query/iron-media-query.html',
//   '/iron-selector/iron-selector.html',
//   '/paper-toolbar/paper-toolbar.html',
//   '/paper-header-panel/paper-header-panel.html',
//   '/paper-scroll-header-panel/paper-scroll-header-panel.html',
//   '/paper-card/paper-card.html',
//   '/paper-icon-button/paper-icon-button.html',
//   '/iron-dropdown/iron-dropdown.html',
//   // '/iron-dropdown/demo/grow-height-animation.html',
//
//   '/iron-icon/iron-icon.html',
//   '/iron-iconset/iron-iconset.html',
//   '/iron-icons/iron-icons.html',
//   '/iron-icons/communication-icons.html',
//   '/iron-icons/av-icons.html',
//   '/iron-icons/device-icons.html',
//   '/iron-icons/editor-icons.html',
//   '/iron-icons/hardware-icons.html',
//   '/iron-icons/image-icons.html',
//   '/iron-icons/maps-icons.html',
//   '/iron-icons/notification-icons.html',
//   '/iron-icons/social-icons.html',
//
//   '/iron-meta/iron-meta.html',
//   '/iron-ajax/iron-ajax.html',
//   '/iron-image/iron-image.html',
//   '/paper-menu/paper-menu.html',
//   '/paper-input/paper-input.html',
//   '/paper-spinner/paper-spinner.html',
//   '/paper-styles/paper-styles-classes.html',
//   '/paper-item/paper-item.html',
//   '/iron-pages/iron-pages.html',
//   '/iron-page-url/iron-page-url.html',
//   '/paper-toast/paper-toast.html',
//   '/paper-item/paper-item-body.html',
//   '/paper-item/paper-icon-item.html',
//   '/paper-tabs/paper-tabs.html',
//   '/paper-tabs/paper-tab.html',
//   '/paper-dialog/paper-dialog.html',
//   '/paper-dialog-scrollable/paper-dialog-scrollable.html',
//   '/app-layout/app-layout.html',
//   '/app-layout/app-scroll-effects/app-scroll-effects.html',
//   '/iron-a11y-keys-behavior/iron-a11y-keys-behavior.html',
//   '/paper-fab/paper-fab.html',
//
//   '/iron-flex-layout/classes/iron-flex-layout.html',
//   '/iron-flex-layout/iron-flex-layout-classes.html',
//
//
//   '/neon-animation/neon-animated-pages.html',
//   '/neon-animation/neon-animatable.html',
//   '/neon-animation/neon-animations.html',
//   // '/neon-animation/web-animations.html',
//   '/neon-animation/neon-animation-behavior.html',
//   '/neon-animation/animations/scale-up-animation.html',
//   '/neon-animation/animations/fade-out-animation.html',
//
//   '/carbon-route/carbon-location.html',
//   '/carbon-route/carbon-route.html',
//
//
// ];
//
// $elements['bowerComponents']['script'] = [
//
//   '/time-elements/time-elements.js',
//   //'/scrollmagic/scrollmagic/minified/ScrollMagic.min.js',
// //  '/scrollmagic/scrollmagic/uncompressed/plugins/debug.addIndicators.js',
// //  '/modernizr/src/Modernizr.js',
//   //'/modernizr/src/ModernizrProto.js',
//
// ];
//
// $elements['custom'] = [
// //  '/elements/dropdown-select.html',
//   '/elements/tweaksToOfficialElements/paper-menu-button.html',
//   '/elements/title-concept.html',
//   '/elements/card-concept.html',
// //  '/elements/scroll-top.html',
//   '/elements/reference-listitem.html',
//   '/elements/choice-listitem.html',
//   '/elements/mcq-listitem.html',
//   '/elements/card-section.html',
//   '/elements/list-item.html',
//
//   '/elements/examinations-data.html',
//   '/elements/examinations-view.html',
//   '/elements/questions-data.html',
//   '/elements/questions-list.html',
//   '/elements/questions-item.html',
//   '/elements/answers-item.html',
// ];
//
// $elements['sharedCustom'] = [
//   '/elements/custom_elements/transform-navigation.html',
//   '/elements/custom_elements/szn-applayout.html',
// ];

?>
