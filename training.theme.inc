<?php

/**
 * Implements template_preprocess_HOOK().
 */
function template_preprocess_training_theme_second(&$variables) {
  // Для удобства записываю значение переменной list_type в локальную переменную
  // в виде ссылки.
  $list_type = &$variables['list_type'];
  // Задаем список допустимых типов.
  $allowed_list_types = ['ol', 'ul'];
  // Если передано значение не из массива выше, мы устанавливаем значение по
  // умолчанию.
  if (!in_array($list_type, $allowed_list_types)) {
    $list_type = 'ul';
  }
}
