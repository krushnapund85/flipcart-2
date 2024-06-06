<?php

namespace Drupal\nbsp_filter\Plugin\Filter;

use Drupal\Core\Form\FormStateInterface;
use Drupal\filter\FilterProcessResult;
use Drupal\filter\Plugin\FilterBase;

/**
 * Handles &nbsp; spaces before/after punctuations.
 *
 * @Filter(
 *   id = "nbsp_filter",
 *   title = @Translation("NBSP Filter"),
 *   description = @Translation("Handles &nbps; (non-breaking spaces in contents), depending on configuration"),
 *   type = Drupal\filter\Plugin\FilterInterface::TYPE_TRANSFORM_IRREVERSIBLE,
 *   settings = {
 *     "clean_all" = TRUE,
 *     "insert_before" = "?!;:",
 *     "insert_after" = "¿¡"
 *   },
 * )
 */
class NbspFilter extends FilterBase {

  /**
   * {@inheritdoc}
   */
  public function settingsForm(array $form, FormStateInterface $form_state) {
    $default = $this->defaultConfiguration();
    $form['clean_all'] = [
      '#type' => 'checkbox',
      '#title' => $this->t("Transform all &amp;nbps; (non-breaking spaces) with standard spaces"),
      '#default_value' => $this->settings['clean_all'],
      '#description' => $this->t("Remove non-breaking spaces in content and replace with standard spaces (excepted the ones configured below)"),
    ];
    $form['insert_before'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Insert &amp;nbps; (non-breaking space) before'),
      '#default_value' => $this->settings['insert_before'],
      '#description' => $this->t('List of characters to insert a non-breaking space before.'),
    ];
    $form['insert_after'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Insert &amp;nbps; (non-breaking space) after'),
      '#default_value' => $this->settings['insert_after'],
      '#description' => $this->t('List of characters to insert a non-breaking space after.'),
    ];
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function process($text, $langcode) {

    // Replace all &nbsp; with standard spaces.
    if ($this->settings['clean_all']) {
      $text = str_replace('/([^>])&nbsp;/ui', '$1 ', $text);
    }

    // Replace spaces before configured characters with &nbsp;.
    $before_chars = $this->settings['insert_before'];
    if (!empty($before_chars)) {
      $pattern = "/ ([$before_chars])/i";
      $text = preg_replace($pattern, '&nbsp;$1', $text);
    }

    // Replace spaces after configured characters with &nbsp;.
    $after_chars = $this->settings['insert_after'];
    if (!empty($before_chars)) {
      $pattern = "/([$after_chars]) /i";
      $text = preg_replace($pattern, '$1&nbsp;', $text);
    }

    return new FilterProcessResult($text);
  }
}
