# tray
Criação de uma API e uma Aplicação que consome essa API.

## Rquisitos
* Apache 2.4.~
* PHP 7.4.~
* MySQL 5.7.~ 
* Composer
* Git
* Docker

## Instalação do Banco
1. Depois de Clonar esse projeto, acesse a pasta tray, baixe da imagem do banco
   > $ docker build -t mysql-image -f ./db/Dockerfile
2. Vamos rodar o container do banco MySQL
   > $ docker run -d -v $(pwd)/db/data:/var/lib/mysql -p 3306:3306 --rm --name mysql-container mysql-image
3. Vamos descobrir o ip do banco, no retorno do comando procure por IPAddress
   > $ docker inspect mysql-container
4. Vamos dar permissão para o usuario do banco acessar de qualquer lugar
   > $ docker exec -it mysql-container /bin/bash
   > $ mysql -u root -p 101010
   > $ update mysql.user set Host="%" where user='root';
   > $ quit
   > $ exit

## Instalação da API
1. Acesse a pasta api e instale o projeto com composer
   > $ composer install
2. Configure os dados de conexão com o banco no arquivo .env "lembrese do ip do container"
3. Rode o migration para criar a estrutura de tabelas
   > $ php artisan migrate
4. Rode o seeder para ter uma massa de dados para testes
   > $ php artisan db:seed
5. Suba o servidor embutido do php apontando para a pasta public
   > $ php -S localhost:90 -t public
6. Add a seguinte linha no crontab
   > * * * * * php /path-to-project/artisan schedule:run >> /dev/null 2>&1

## Instalação da Aplicação
1. Acesse a pasta app e instale o projeto com o composer
   > $ composer install
2. Suba o servidor embutido do php apontando para a pasta public
   > $ php -S localhost:91 -t public

Seguindo esses passos, você já deve conseguir acessar no navegador, o endereço "http://localhost:91/vendedores".

Caso algum dos passos apresente erro, verifique o passo anterior a ele. Se atente também, as versões especificadas na parte de Requisitos.

## Informações sobre o projeto
O Sistema consiste em uma api que recebe dados do cliente e salva no banco, e pega do banco e apresenta para o cliente.

## Melhorias e mudanças
Pretendo Criar um container para a api também.