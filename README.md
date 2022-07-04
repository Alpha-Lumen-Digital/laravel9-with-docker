# Laravel 9 with Docker
Setup inicial de um projeto Laravel 9 com Docker. Ambiente PHP8, MySQL, NGINX e PHPMyAdmin.

## Como iniciar o projeto
Clone o repositório com o git
```powershell
git clone https://github.com/daniloamsilva/laravel9-with-docker.git
````
Crie um arquivo **.env** na raiz do projeto utilizando o .**env.example** como base \
Utilize o **docker-compose** para iniciar os containers
```powershell
docker-compose up -d
```
Acesse o terminal do container da aplicação
```powershell
docker exec -it l9wd-app /bin/bash
```
Utilize o **composer** para instalar as depêndencias
```powershell
composer install
```
Por fim precisamos gerar a chave do projeto
```
php artisan key:generate
```
Acesse **http://localhost:8000**. Deve ser exibida a página inicial do Laravel.

## Dicas para o desenvolvimento
Sempre utilize o terminal do container para realizar comandos **Artisan** por exemplo. O teminal pode ser acessado com o comando abaixo e digite **exit** para sair.
```powershell
docker exec -it l9wd-app /bin/powershell
```
Para visualizar os logs utilize o seguinte comando fora do container. (CTRL+C para sair)
```powershell
docker logs l9wd-app -f
```
Para visualizar o banco de dados é possível acessar o endereço **http://localhost:8080** para visualizar o **PHPMyAdmin**. O usuário, senha e nome do banco estão no **.env** que por padrão estão com os seguintes valores:
```env
DB_DATABASE=l9wd
DB_USERNAME=root
DB_PASSWORD=root
```

## Dicas de comandos Docker
Lista os containers em execução
```powershell
docker ps
```
Lista todos os containers existentes
```powershell
docker ps -a
```
Inicia todos os containers do proejto (quando já foram criados)
```powershell
docker-compose start
```
Suspende todos os containers do projeto
```powershell
docker-compose stop
```
Remove todos os containers do projeto
```powershell
docker-compose down
```
