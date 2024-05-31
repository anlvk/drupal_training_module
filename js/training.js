/**
 * @file
 * Simple JavaScript hello world file.
 */

(function ($, Drupal, settings) {

  "use strict";

  Drupal.behaviors.training = {
    attach: function (context) {
      $('h1', context).addClass('grass-green');
    }
  }
  
})(jQuery, Drupal, drupalSettings);
