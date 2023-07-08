# tray
Criação de uma API e uma Aplicação que consome essa API.

## Rquisitos
* Git
* Docker
* Docker Copmpose

## Instalação do Banco
1. Clone esse repositorio
2. Rode o docker-compose
   ```
   $ docker-compose up -d
   ```
3. Entre no container "tray-fpm" e execute os comandos
   ```
   $ cd api
   $ composer install
   $ chmod -Rf  775 ./storage
   $ php artisan migrate --seed
   $ cd ../app
   $ composer install
   $ exit
   ```
4. Add os hosts no seu "/etc/hosts"
   ```
   127.0.0.1 loja
   127.0.0.1 loja.api
   ```

Seguindo esses passos, você já deve conseguir acessar no navegador, o endereço "http://loja/vendedores", que é a aplicação que consome a api, para acessar a api você deve usar a url "http://loja.api/vendedores"

Caso algum dos passos apresente erro, verifique o passo anterior a ele. Se atente também, as versões especificadas na parte de Requisitos.

## Informações sobre o projeto
O Sistema consiste em uma api que recebe dados do cliente e salva no banco, e pega do banco e apresenta para o cliente.