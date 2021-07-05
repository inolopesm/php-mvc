<?php

namespace App\Controllers\Pages;

use \App\Utils\View;
use \App\Models\Entities\Organization;

class Home extends Page {
  /**
   * Método responsável por retornar o conteúdo (view) da nossa home
   * @return string
   */
  public static function getHome() {
    $organization = new Organization();

    $content = View::render("pages/home", [
      "name" => $organization->name,
      "description" => $organization->description,
      "site" => $organization->site
    ]);

    return parent::getPage("WDEV - Canal - HOME", $content);
  }
}
