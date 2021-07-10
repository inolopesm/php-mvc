<?php

namespace App\Controllers\Pages;

use \App\Utils\View;
use \App\Models\Entities\Organization;

class About extends Page {
  /**
   * Método responsável por retornar o conteúdo (view) de sobre
   * @return string
   */
  public static function getAbout() {
    $organization = new Organization();

    $content = View::render("pages/about", [
      "name" => $organization->name,
      "description" => $organization->description,
      "site" => $organization->site
    ]);

    return parent::getPage("SOBRE > WDEV", $content);
  }
}
