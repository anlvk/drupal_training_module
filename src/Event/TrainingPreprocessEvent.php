<?php

namespace Drupal\training\Event;

use Drupal\Component\EventDispatcher\Event;

/**
 * Event firing on html preprocesses.
 */
class TrainingPreprocessEvent extends Event {
  /**
   * Called during hook_preprocess_html().
   */
  const PREPROCESS_HTML = 'training.preprocess_html';

  /**
   * Variables from preprocess.
   *
   * @var array
   */
  protected $variables;

  /**
   * TrainingPreprocessEvent constructor.
   */
  public function __construct($variables) {
    $this->variables = $variables;
  }

  /**
   * Returns variables array from preprocess.
   */
  public function getVariables() {
    return $this->variables;
  }

}
