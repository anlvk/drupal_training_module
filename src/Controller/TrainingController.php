<?php

namespace Drupal\training\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Provides route responses for the Training module.
 */
class TrainingController extends ControllerBase {

  /**
   * Returns a simple page with custom hook_theme().
   *
   * @return array
   *   A simple renderable array.
   */
  public function testPage() {
    $results = [];
    // hook_theme №1.
    $results[] = [
      '#theme' => 'training_theme_first',
    ];
    // hook_theme №2.
    $results[] = [
      '#theme' => 'training_theme_second',
      '#list_type' => 'ol',
      '#items' => [
        [
          'title' => 'Title One',
          'text' => 'Content one.',
        ],
        [
          'title' => 'Title Two',
          'text' => 'Content Two.',
        ],
      ],
    ];

    return $results;
  }

}
