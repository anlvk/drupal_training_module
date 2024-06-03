<?php

namespace Drupal\training\Plugin\Field\FieldFormatter;

use Drupal\Component\Render\FormattableMarkup;
use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Form\FormStateInterface;

/** *
 * @FieldFormatter(
 *   id = "field_training_color_box_formatter",
 *   label = @Translation("A 'box' with background color"),
 *   field_types = {
 *     "field_training_color"
 *   }
 * )
 */
class TrainingColorBoxFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   *
   * Default settings for output format.
   */
  public static function defaultSettings() {
    return [
      'width' => '80',
      'height' => '80',
    ] + parent::defaultSettings();
  }

  /**
   * {@inheritdoc}
   *
   * Form with settings for the output format.
   */
  public function settingsForm(array $form, FormStateInterface $form_state) {
    $elements = parent::settingsForm($form, $form_state);

    $elements['width'] = array(
      '#type' => 'number',
      '#title' => t('Width'),
      '#field_suffix' => 'px.',
      '#default_value' => $this->getSetting('width'),
      '#min' => 1,
    );

    $elements['height'] = array(
      '#type' => 'number',
      '#title' => t('Height'),
      '#field_suffix' => 'px.',
      '#default_value' => $this->getSetting('height'),
      '#min' => 1,
    );

    return $elements;
  }

  /**
   * {@inheritdoc}
   *
   * This method allows to display brief information about the current field settings
   * on the display control page.
   */
  public function settingsSummary() {
    $summary = [];
    $settings = $this->getSettings();

    $summary[] = t('Width: @width px', array('@width' => $settings['width']));
    $summary[] = t('Height: @height px', array('@height' => $settings['height']));

    return $summary;
  }

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $element = array();
    $settings = $this->getSettings();

    foreach ($items as $delta => $item) {
      // Render each element as markup.
      $element[$delta] = [
        '#type' => 'markup',
        '#markup' => new FormattableMarkup(
          '<div style="width: @width; height: @height; background-color: @color;"></div>',
          [
            '@width' => $settings['width'] . 'px',
            '@height' => $settings['height'] . 'px',
            '@color' => $item->value,
          ]
        ),
      ];
    }

    return $element;
  }
}
