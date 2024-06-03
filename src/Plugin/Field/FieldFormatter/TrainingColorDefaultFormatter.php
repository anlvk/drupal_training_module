<?php

namespace Drupal\training\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Field\FieldItemListInterface;

/** *
 * @FieldFormatter(
 *   id = "field_training_color_default_formatter",
 *   label = @Translation("HEX color"),
 *   field_types = {
 *     "field_training_color"
 *   }
 * )
 */
class TrainingColorDefaultFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public function settingsSummary() {
    $summary = [];
    $settings = $this->getSettings();

    $summary[] = t('Color value as text in HEX format');

    return $summary;
  }

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $element = [];

    foreach ($items as $delta => $item) {
      $element[$delta] = [
        '#type' => 'markup',
        '#markup' => $item->value,
      ];
    }

    return $element;
  }
}
