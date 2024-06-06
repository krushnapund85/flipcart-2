/**
 * @file
 * Custom JS Functions .*/

(function ($, Drupal, drupalSettings) {
  'use strict';

  Drupal.behaviors.demo = {
    attach: function (context, settings) {
       console.log('Heloo there!!!');
    }
  };
})(jQuery, Drupal, drupalSettings);