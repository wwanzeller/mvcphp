<?php

namespace App\Http;

class Response
{
    /**
     * Código do Status HTTP.
     *
     * @var Int
     */
    private Int $httpCode = 200;

    /**
     * Cabeçalho do Response.
     *
     * @var Array
     */
    private Array $headers = [];

    /**
     * Tipo de conteúdo retornado.
     *
     * @var String
     */
    private String $contentType = 'text/html';

    /**
     * Conteúdo do response.
     *
     * @var mixed
     */
    private mixed $content;

    /**
     * Método responsável por iniciar a classe e definir os valores.
     *
     * @param Int $httpCode
     * @param Mixed $content
     * @param String $contentType
     * @return void
     */
    public function __construct(Int $httpCode, Mixed $content, String $contentType = 'text/html')
    {
        $this->httpCode    = $httpCode;
        $this->content     = $content;
        $this->setContentType($contentType);
    }

    /**
     * Método responsável por alterar o content type do response.
     *
     * @param String $contentType
     * @return void
     */
    public function setContentType(String $contentType)
    {
        $this->contentType = $contentType;
        $this->addHeaders('Content-Type', $contentType);
    }

    /**
     * Método responsável por adicionar um registo no cabeçalho do response.
     *
     * @param String $key
     * @param String $value
     * @return void
     */
    public function addHeaders(String $key, String $value)
    {
        $this->headers[$key] = $value;
    }

    /**
     * Método responsável por enviar os Headers para o navegador.
     *
     * @return void
     */
    private function sendHeaders()
    {
        //STATUS
        http_response_code($this->httpCode);

        //ENVIA HEADERS
        foreach ($this->headers as $key => $value) {
            header($key .': ' . $value);
        }
    }

    /**
     * Método responsável por enviar a resposta ao usuário. 
     *
     * @return void
     */
    public function sendResponse()
    {
        //ENVIA OS HEADERS
        $this->sendHeaders();

        //IMPRIME O CONTEÚDO
        switch ($this->contentType) {
            case 'text/html':
                echo $this->content;
                exit;
        }
    }


}
