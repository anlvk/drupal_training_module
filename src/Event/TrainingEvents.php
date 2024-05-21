<?php

/**
 * Defines events for training module.
 */
final class TrainingEvents {
  /**
   * Name of the event fired when prepare content for hook_preprocess_HOOK().
   *
   * @Event
   *
   * @see \Drupal\training\Event\TrainingPreprocessEvent
   *
   * @var string
   */
  const PREPROCESS_HTML = 'training.preprocess_html';

}
