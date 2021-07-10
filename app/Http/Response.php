<?php

namespace App\Http;

class Response {
  /**
   * Código do estado HTTP
   * @var integer
   */
  private $httpCode = 200;

  /**
   * Cabeçalho da resposta
   * @var array
   */
  private $headers = [];

  /**
   * Tipo de conteúdo que está sendo retornado
   * @var string
   */
  private $contentType;

  /**
   * Conteúdo da resposta
   * @var mixed
   */
  private $content;

  /**
   * Método responsável por iniciar a classe e definir os valores
   * @param integer $httpCode
   * @param mixed $content
   * @param string $contentType
   */
  public function __construct($httpCode, $content, $contentType = "text/html") {
    $this->httpCode = $httpCode;
    $this->content = $content;
    $this->setContentType($contentType);
  }

  /**
   * Método responsável por alterar o tipo de conteúdo da resposta
   * @param string $contentType
   */
  public function setContentType($contentType) {
    $this->contentType = $contentType;
    $this->addHeader("Content-Type", $contentType);
  }

  /**
   * Método responsável por adicionar um registro no cabeçalho da resposta
   * @param string $key
   * @param string $value
   */
  public function addHeader($key, $value) {
    $this->headers[$key] = $value;
  }

  /**
   * Método responsável por enviar os headers para o navegador
   */
  private function sendHeaders() {
    http_response_code($this->httpCode);

    foreach($this->headers as $key => $value) {
      header("$key: $value");
    }
  }

  /**
   * Método responsável por enviar a resposta para o usuário
   * @return string
   */
  public function sendResponse() {
    $this->sendHeaders();

    if($this->contentType === "text/html") {
      echo $this->content;
    }
  }
}
