<?php

namespace App\Utils;

class View {
  /**
   * Método responsável por retornar o conteúdo de uma view
   * @param string $view
   * @return string
   */
  private static function getContentView($view) {
    $file = __DIR__ . "/../../resources/view/" . $view . ".html";
    return file_exists($file) ? file_get_contents($file) : "View not found";
  }

  /**
   * Método responsável por retornar o conteúdo de uma view
   * @param string $view
   * @param array $vars (string/numeric)
   * @return string
   */
  public static function render($view, $vars = []) {
    $contentView = self::getContentView($view);
    // echo "<pre>"; print_r($vars); echo "</pre>"; exit();
    $keys = array_keys($vars);
    // echo "<pre>"; print_r($keys); echo "</pre>"; exit();
    $keys = array_map(function($item) { return "{{" . $item . "}}"; }, $keys);
    // echo "<pre>"; print_r($keys); echo "</pre>"; exit();
    return str_replace($keys, array_values($vars), $contentView);
  }
}
