<?php

namespace App\Http;

use Closure;
use Exception;
use ReflectionFunction;

class Router 
{
    /**
     * URL Completa da raiz projeto.
     *
     * @var String
     */
    private String $url = '';

    /**
     * Prefixo de todas as rotas.
     *
     * @var String
     */
    private String $prefix = '';

    /**
     * Indice de rotas.
     *
     * @var Array
     */
    private Array $routes = [];

    /**
     * Instância de Request.
     *
     * @var Request
     */
    private Request $request;

    /**
     * Método responsável por iniciar a classe. 
     *
     * @param String $url
     */
    public function __construct(String $url)
    {
        $this->request = new Request();
        $this->url     = $url;
        $this->setPrefix();
    }

    /**
     * Método responsável por adicionar um prefixo na URL.
     *
     * @return void
     */
    private function setPrefix()
    {
        //INFORMAÇÕES DA URL ATUAL
        $parseUrl = parse_url($this->url);

        //DEFINE O PREFIXO
        $this->prefix = $parseUrl['path'] ?? '';
    }

    /**
     * Método responsável por adicionar uma rota na classe.
     *
     * @param String $method
     * @param String $route
     * @param array $params
     * @return void
     */
    private function addRoute(String $method, String $route, Array $params = [])
    {
        //VALIDAÇÃO DOS PARÂMETROS
        foreach ($params as $key=>$value) {
            if ($value instanceof Closure) {
                $params['controller'] = $value;
                unset($params[$key]);
                continue;
            }
        }

        //VARIÁVEIS DA ROTA
        $params['variables'] = [];

        //PADRÃO DE VALIDAÇÃO DAS VARIÁVEIS DAS ROTAS
        $patternVariable = '/{(.*?)}/';
        if (preg_match_all($patternVariable, $route, $matches)) {
            $route =  preg_replace($patternVariable, '(.*?)', $route);
            $params['variables'] = $matches[1];
        }

        //PADRÃO DE VALIDAÇÃO DA URL
        $patternRoute = '/^' . str_replace('/', '\/', $route). '$/';

        //ADICIONA ROTA DENTRO DA CLASSE
        $this->routes[$patternRoute][$method] = $params;
    }

    /**
     * Método responsável por definir uma rota de GET.
     *
     * @param String $route
     * @param array $params
     * @return void
     */
    public function get(String $route, Array $params = [])
    {
        return $this->addRoute('GET', $route, $params);
    }

    /**
     * Método responsável por definir uma rota de POST.
     *
     * @param String $route
     * @param array $params
     * @return void
     */
    public function post(String $route, Array $params = [])
    {
        return $this->addRoute('POST', $route, $params);
    }

    /**
     * Método responsável por definir uma rota de PUT.
     *
     * @param String $route
     * @param array $params
     * @return void
     */
    public function put(String $route, Array $params = [])
    {
        return $this->addRoute('PUT', $route, $params);
    }
       
    /**
     * Método responsável por definir uma rota de DELETE.
     *
     * @param String $route
     * @param array $params
     * @return void
     */
    public function delete(String $route, Array $params = [])
    {
        return $this->addRoute('DELETE', $route, $params);
    }

    /**
     * Método responsável por retornar a URI desconsiderando o prefixo.
     *
     * @return String
     */
    private function getUri() : String
    {
        //URI DA REQUEST
        $uri = $this->request->getUri();
        
        //FATIA A URI COM PREFIXO
        $xUri = strlen($this->prefix) ? explode($this->prefix, $uri) : [$uri];

        //RETORNA A URI SEM PREFIXO
        return end($xUri);
    }

    /**
     * Método responsável por retornar os dados da rota atual.
     *
     * @return Array
     */
    private function getRoute()
    {
        //URI
        $uri = $this->getUri();

        //METHOD
        $httpMethod = $this->request->getHttpMethod();    
        
        //VALIDA AS ROTAS
        foreach($this->routes as $patternRoute => $methods){            
            
            //VERIFICA SE URI BATE COM O PADRÃO
            if (preg_match($patternRoute,$uri, $matches)) {
                
                //VERIFICA O MÉTODO
                if(isset($methods[$httpMethod])) {
                    //REMOVE A PRIMEIRA POSIÇÃO
                    unset($matches[0]);

                    //VARIÁVEIS PROCESSADAS
                    $keys = $methods[$httpMethod]['variables'];
                    $methods[$httpMethod]['variables'] = array_combine($keys, $matches);
                    $methods[$httpMethod]['variables']['request'] = $this->request;
                 
                    //RETORNO DOS PARÂMETROS DA ROTA                    
                    return $methods[$httpMethod];
                }
                throw new Exception('Método não permitido', 405);
            }
        }
        //URL NÃO ENCONTRADA
        throw new Exception('URL não encontrada', 404);
    }
    
    /**
     * Método responsável por executar a rota atual.
     *
     * @return Response|Exception
     */
    public function run() : Response|Exception
    {
        try {
            //OBTER A ROTA ATUAL
            $route = $this->getRoute();

            //VERIFICA CONTROLODAR
            if (!isset($route['controller'])) {
                throw new Exception("A URL não pôde ser processada", 500);
            }
            
            //ARGUMENTOS DA FUNÇÃO
            $args = [];

            //REFLECTION
            $reflection = new ReflectionFunction($route['controller']);
            foreach ($reflection->getParameters() as $parameter) {
                $name = $parameter->getName();
                $args[$name] = $route['variables'][$name] ?? '';
            }

            //RETORNA A EXECUÇÃO DA FUNÇÃO
            return call_user_func_array($route['controller'], $args);

            throw new Exception("Página não encontrada.", 404);

        } catch (Exception $e) {
            return new Response($e->getCode(), $e->getMessage());
        }
    }
}