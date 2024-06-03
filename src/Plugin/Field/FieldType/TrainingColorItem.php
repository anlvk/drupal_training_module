<?php

namespace Drupal\training\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\TypedData\DataDefinition;

/**
 * @FieldType(
 *   id = "field_training_color",
 *   label = @Translation("Training color"),
 *   module = "training",
 *   description = @Translation("A field to display color."),
 *   category = @Translation("Color"),
 *   default_widget = "field_training_color_input_widget",
 *   default_formatter = "field_training_color_default_formatter"
 * )
 */
class TrainingColorItem extends FieldItemBase {

  /**
   * {@inheritdoc}
   *
   * Declare columns for a table where values will be stored.
   * One value is enough of type text and of tiny size.
   *
   * @see https://www.drupal.org/node/159605
   */
  public static function schema(FieldStorageDefinitionInterface $field_definition) {
    return [
      'columns' => [
        'value' => [
          'type' => 'text',
          'size' => 'tiny',
          'not null' => FALSE,
        ],
      ],
    ];
  }

  /**
   * {@inheritdoc}
   *
   * This tells Drupal how to store the values ​​of these fields.
   * For example, integer, string or any.
   */
  public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition) {
    $properties['value'] = DataDefinition::create('string')
      ->setLabel(t('Hex color'));

    return $properties;
  }
}
