<?php

namespace App\Http;

/**
 * Class Request
 * @package App\Http
 * @property-read string $httpMethod
 * @property-read string $uri
 * @property-read array $queryParams
 * @property-read array $postVars
 * @property-read array $headers
 */
class Request 
{
    /**
     * Método HTTP da requisição.
     *
     * @var [type]
     */
    private String $httpMethod;

    /**
     * URI da página (Rota).
     *
     * @var String
     */
    private String $uri;

    /**
     * Parâmetros da URL ($_GET).
     *
     * @var Array
     */
    private Array $queryParams = [];

    /**
     * Variáveis recebidas no POST do formulário ($_POST).
     *
     * @var Array
     */
    private Array $postVars = [];

    /**
     * Cabeçalho da requisição.
     *
     * @var Array
     */
    private Array $headers = [];

    public function __construct()
    {
        $this->httpMethod  = $_SERVER['REQUEST_METHOD'] ?? '';
        $this->uri         = $_SERVER['REQUEST_URI'] ?? '';
        $this->queryParams = $_GET ?? [];
        $this->postVars    = $_POST ?? [];
        $this->headers     = getallheaders();
    }

    /**
     * Método responsável por retornar o método HTTP da requisição.
     *
     * @return String
     */
    public function getHttpMethod() : String
    {
        return $this->httpMethod;
    }

    /**
     * Método responsável por retornar a URI da requisição.
     *
     * @return String
     */
    public function getUri() : String
    {
        return $this->uri;
    }

    /**
     * Método responsável por retornar os headers da requisição.
     *
     * @return Array
     */
    public function getHeaders() : Array
    {
        return $this->headers;
    }

    /**
     * Método responsável por retornar os parâmetros da requisição.
     *
     * @return Array
     */
    public function getQueryParams() : Array
    {
        return $this->queryParams;
    }

      /**
     * Método responsável por retornar as variáveis do POST.
     *
     * @return Array
     */
    public function getPostVars() : Array
    {
        return $this->postVars;
    }


}