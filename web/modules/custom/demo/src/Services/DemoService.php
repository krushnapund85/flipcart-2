<?php

namespace Drupal\demo\Services;
use Drupal\Core\Database\Connection;
use Drupal\Core\Language\LanguageManagerInterface;
use Drupal\Core\StringTranslation\StringTranslationTrait;

class DemoService {
  use StringTranslationTrait;

  protected $database;
  protected $languageManager;

  /**
   * {@inheritdoc}
   */
  public function __construct(Connection $connection, LanguageManagerInterface $language_manager) {
    $this->database           = $connection;
    $this->languageManager    = $language_manager;
  }

  /**
   * Encoded/Decoded data
   *
   * @var null|string
   */
   protected $data;

   /**
    * Initialization vector value
    *
    * @var string
    */
  protected $initVector;

  /**
   * Error message if operation failed
   *
   * @var null|string
   */
  protected $errorMessage;


  /**
   *
   * @param string $plainText Text for encryption
   *
   * @return self Self object instance with data or error message
   */
  public function encryptStr($plainText) {
    try {
    // Return base64-encoded string: initVector + encrypted result
    $result = base64_encode($plainText);

    // Return successful encoded object
    return  $result;
  } catch (\Exception $e) {
    // Operation failed
    }
  }

  /**
   *
   * @param string $string Encrypted text
   *
   * @return self Self object instance with data or error message
   */
  public function decryptStr($string) {
    try {
      // Get raw encoded data
      $decoded = base64_decode($string);

      return $decoded;
    } catch (\Exception $e) {
      // Operation failed
      }
  }

}
