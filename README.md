# tray
Criação de uma API e uma Aplicação que consome essa API.

## Rquisitos
* Git
* Docker
* Docker Copmpose

## Instalação do Banco
1. Clone esse repositorio
2. Rode o docker-compose
   > $ docker-compose up -d
3. Entre no container "api" e execute os comandos
   > $ docker exec -it tray_api_1 /bin/bash
   > $ cd /var/www/html
   > $ composer install
   > $ php artisan migrate
   > $ php artisan db:seed
   > $ chmod -Rf  775 ./storage
   > $ exit
4. Entre no container "app" e execute os comandos
   > $ docker exec -it tray_app_1 /bin/bash
   > $ cd /var/www/html
   > $ composer install
   > $ exit

Seguindo esses passos, você já deve conseguir acessar no navegador, o endereço "http://localhost:8081/vendedores", que é a aplicação que consome a api, para acessar a api você deve usar a url "http://localhost:8080/vendedores"

Caso algum dos passos apresente erro, verifique o passo anterior a ele. Se atente também, as versões especificadas na parte de Requisitos.

## Informações sobre o projeto
O Sistema consiste em uma api que recebe dados do cliente e salva no banco, e pega do banco e apresenta para o cliente.