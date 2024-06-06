/**
 * @file
 * Custom JS Functions .*/

(function ($, Drupal, drupalSettings) {
    'use strict';
  
    Drupal.behaviors.demo = {
      attach: function (context, settings) {
        $(document).ready(function() {
            $('.card-wrap .whishlist-icon').click(function(e) { 
                 
              alert($(this).parent().find("a").text()+ " is added in whishlist!!!");
            });
        });
      }
    };
  })(jQuery, Drupal, drupalSettings);