<?php

/**
 * @file
 * Implements custom theme settings.
 */

/**
 * Implements template_preprocess_HOOK().
 */
function template_preprocess_training_theme_second(&$variables) {
  // For convenience, store the value of the list_type variable
  // into a local variable as a link.
  $list_type = &$variables['list_type'];
  // Allowed list types.
  $allowed_list_types = ['ol', 'ul'];
  // If a value is passed not from the array above, we set the default value.
  if (!in_array($list_type, $allowed_list_types)) {
    $list_type = 'ul';
  }
}
