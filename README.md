# Setup Docker para projetos com: PHP, MySQL, Nginx e phpMyAdmin no padrão MVC.

Clone o repositório:
```sh
git clone https://github.com/wwanzeller/mvcphp.git mvcphp
```

```sh
cd mvcphp/
```

Remova o versionamento:
```sh
rm -rf .git/
```


Crie o arquivo .env:
```sh
cp .env.example .env
```


Atualize as variáveis de ambiente do arquivo .env:
```dosini
DB_DATABASE=nome_que_desejar
DB_ROOT_PASSWORD=root
DB_PASSWORD=sua_senha
DB_USERNAME=seu_nome
```


Suba os containers do projeto:
```sh
docker-compose up -d
```


Acessar o container:
```sh
docker-compose exec app bash
```


Instalar dependências do projeto:
```sh
composer install
```


Acessar o projeto:
[http://localhost](http://localhost)


Acessar o phpMyAdmin:
[http://localhost:8080](http://localhost:8080)
```dosini
servidor=mysql
Utilizador=root
Senha=root
```
ou

```dosini
servidor=mysql
Utilizador=seu_nome
Senha=sua_senha
```