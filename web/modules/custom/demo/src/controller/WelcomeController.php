<?php

namespace Drupal\demo\Controller;
class WelcomeController {
  public function welcome() {
    return array(
      '#markup' =----> 'Welcome to our Website.'
    );
  }
}