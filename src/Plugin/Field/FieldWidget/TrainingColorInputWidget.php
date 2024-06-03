<?php

namespace Drupal\training\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * @FieldWidget(
 *   id = "field_training_color_input_widget",
 *   module = "training",
 *   label = @Translation("HTML5 Color Picker"),
 *   field_types = {
 *     "field_training_color"
 *   }
 * )
 */
class TrainingColorInputWidget extends WidgetBase {

  /**
   * {@inheritdoc}
   *
   * This method sets up a form in which our value for the field will be
   * entered and edited - this is what users see in the admin panel when working
   * with this field.
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $element += [
      '#type' => 'color',
      '#default_value' => isset($items[$delta]->value) ? $items[$delta]->value : '',
      '#size' => 7,
      '#maxlength' => 7,
      '#element_validate' => [
        [$this, 'hexColorValidation'],
      ],
    ];

    return ['value' => $element];
  }

  /**
   * {@inheritdoc}
   *
   * In fact, validation as such is not needed, because HTML5 input does not allow
   * enter the color manually, but if the browser does not support this
   * element, or some other anomalies, it is best to check it for
   * compliance with HEX format #FFFFFF.
   */
  public function hexColorValidation($element, FormStateInterface $form_state) {
    $value = $element['#value'];
    if (!preg_match('/^#([a-f0-9]{6})$/iD', strtolower($value))) {
      $form_state->setError($element, t('Color is not in HEX format'));
    }
  }
}
