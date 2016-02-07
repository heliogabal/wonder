<?php
/*
  Preprocess
*/

/*
function wonder_preprocess_html(&$vars) {
  //  kpr($vars['content']);
}
*/
/*
function wonder_preprocess_page(&$vars,$hook) {
  //typekit
  //drupal_add_js('http://use.typekit.com/XXX.js', 'external');
  //drupal_add_js('try{Typekit.load();}catch(e){}', array('type' => 'inline'));

  //webfont
  //drupal_add_css('http://cloud.webtype.com/css/CXXXX.css','external');

  //googlefont
  //  drupal_add_css('http://fonts.googleapis.com/css?family=Bree+Serif','external');

}
*/
/*
function wonder_preprocess_region(&$vars,$hook) {
  //  kpr($vars['content']);
}
*/
/*
function wonder_preprocess_block(&$vars, $hook) {
  //  kpr($vars['content']);

  //lets look for unique block in a region $region-$blockcreator-$delta
   $block =
   $vars['elements']['#block']->region .'-'.
   $vars['elements']['#block']->module .'-'.
   $vars['elements']['#block']->delta;

  // print $block .' ';
   switch ($block) {
     case 'header-menu_block-2':
       $vars['classes_array'][] = '';
       break;
     case 'sidebar-system-navigation':
       $vars['classes_array'][] = '';
       break;
    default:

    break;

   }


  switch ($vars['elements']['#block']->region) {
    case 'header':
      $vars['classes_array'][] = '';
      break;
    case 'sidebar':
      $vars['classes_array'][] = '';
      $vars['classes_array'][] = '';
      break;
    default:

      break;
  }

}
*/
/*
function wonder_preprocess_node(&$vars,$hook) {
  //  kpr($vars['content']);

  // add a nodeblock
  // in .info define a region : regions[block_in_a_node] = block_in_a_node
  // in node.tpl  <?php if($noderegion){ ?> <?php print render($noderegion); ?><?php } ?>
  //$vars['block_in_a_node'] = block_get_blocks_by_region('block_in_a_node');
}
*/
/*
function wonder_preprocess_comment(&$vars,$hook) {
  //  kpr($vars['content']);
}
*/
/*
function wonder_preprocess_field(&$vars,$hook) {
  //  kpr($vars['content']);
  //add class to a specific field
  switch ($vars['element']['#field_name']) {
    case 'field_ROCK':
      $vars['classes_array'][] = 'classname1';
    case 'field_ROLL':
      $vars['classes_array'][] = 'classname1';
      $vars['classes_array'][] = 'classname2';
      $vars['classes_array'][] = 'classname1';
    case 'field_FOO':
      $vars['classes_array'][] = 'classname1';
    case 'field_BAR':
      $vars['classes_array'][] = 'classname1';
    default:
      break;
  }

}
*/
/*
function wonder_preprocess_maintenance_page(){
  //  kpr($vars['content']);
}
*/
/*
function wonder_form_alter(&$form, &$form_state, $form_id) {
  //if ($form_id == '') {
  //....
  //}
}
*/

/**
 * Implements hook_preprocess_html().
 */
function wonder_preprocess_html(&$vars) {
  $prefixes = array();
  $namespaces = explode("n", trim($vars['rdf_namespaces']));
  foreach ($namespaces as $name) {
    list($key,$url) = explode('=', $name, 2);
    list($xml,$space) = explode(':',$key, 2);
    $url = trim($url, '"');
    if (!empty($space) && !empty($url)) {
      $prefixes[] = $space . ': ' . $url;
    }
  }
  $prefix = implode(" ", $prefixes);
  $vars['doctype'] = '<!DOCTYPE HTML>' . "n";
  $vars['rdf']->version = '';
  $vars['rdf']->namespaces = ' xmlns="http://www.w3.org/1999/xhtml" prefix="' . $prefix . '"';
  $vars['rdf']->profile = '';
}