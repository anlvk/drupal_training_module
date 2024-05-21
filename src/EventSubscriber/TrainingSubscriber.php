<?php

namespace Drupal\training\EventSubscriber;

use Drupal\Core\Messenger\MessengerInterface;
use Drupal\Core\Session\AccountProxyInterface;
use Drupal\training\Event\TrainingPreprocessEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Training event subscriber.
 */
class TrainingSubscriber implements EventSubscriberInterface {

  public function __construct(
    protected MessengerInterface $messenger,
    protected AccountProxyInterface $current_user,
  ) {
    $this->messenger = $messenger;
    $this->current_user = $current_user;
  }

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() {
    return [
      TrainingPreprocessEvent::PREPROCESS_HTML => ['preprocessHtml', 100],
    ];
  }

  /**
   * Example for TrainingPreprocessEvent::PREPROCESS_HTML.
   * 
   * @todo: do something with $variables.
   */
  public function preprocessHtml(TrainingPreprocessEvent $event) {
    $this->messenger->addMessage('Training module. Event for preprocess HTML called: PREPROCESS_HTML.');

    $userRoles = $this->current_user->getRoles();

    if (array_key_exists(1, $userRoles)) {
      $this->messenger->addMessage('Additional message for Administrator role.');
    }
    // Stop further execution.
    $event->stopPropagation();
  }

}
