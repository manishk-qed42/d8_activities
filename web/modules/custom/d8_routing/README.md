# Routing in Drupal 8
Activity
Convert the following menu item & corresponding page callback in Drupal7 to Drupal 8 route.
```
<?php

function d7_menu() {
  $items = array();

  $items['/static-content'] = array(
    'title' => t('Static Content Page'),
    'page callback' => 'd7_static_callback',
    'access callback' => array('access training content'),
  );
}


function d7_static_callback() {
  return "Hello! I am your node listing page.";
}
```

# Routing Extended: Creating dynamic routes
Activity
Convert the following menu item & corresponding page callback in Drupal7 to Drupal 8 route.
```
<?php

function d7_menu() {
  $items = array();

  $items['/arg-demo/%'] = array(
    'title' => t('Dynamic listing'),
    'page callback' => 'd7_dynamic_listing_callback',
    'page arguments' => array(1),
    'access callback' => array('access training content'),
  );
}


function d7_dynamic_listing_callback($arg) {
  return "Hello! I am your ' . $arg . ' listing page.";
}
```
Extras: How do you set the default value for the url argument in case nothing is supplied?


# Routing Extended: Creating dynamic routes with Entity as parameter
Activity
Convert the following menu item & corresponding page callback in Drupal7 to Drupal 8 route.
```
<?php

function d7_menu() {
  $items = array();

  $items['/list/%node'] = array(
    'title' => t('Node Detail'),
    'page callback' => 'd7_node_detail_callback',
    'access callback' => array('access training content'),
  );
}


function d7_listing_callback($node) {
  return node_view($node);
}
```
Extras: How do you setup multiple nids to be up-casted based on url parameters.


# Routing Extended: Creating Menu link/tab/action item
Activity
Create Menu links, Menu tabs & Action links.
- Add a menu link: Static Content under admin config system settings.
- Place the routes created previously: /static-content & /arg-demo under tabs names as tab1 & tab2.
- Add an action item to /list/{node} page titled as add Content.
- Add a configuration named API key to /admin/config/system/site-information page. 
  - Change button text from "save configuration" to "submit"    

# Dynamic Routing
Create a Dynamic Routing route callback.