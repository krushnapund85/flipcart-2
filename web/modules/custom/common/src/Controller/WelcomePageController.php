<?php
namespace Drupal\common\Controller;
use Drupal\Core\Controller\ControllerBase;
/**
* Provides route responses for the Welcome page module.
*/
class WelcomePageController extends ControllerBase {
 /**
  * Returns a simple message page.
  *
  * @return array
  *   A simple renderable array.
  */
 public function homePage() {
   return [
     '#markup' => '<h2>Welcome to Flipcart!!!!</h2>',
   ];
 }
}