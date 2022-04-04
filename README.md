# Instalação

Test-Client requer [PHP](https://www.php.net) 7.4 + para funcionar.

### Índice

- [Clone o repositório](#1-clone-o-reposit%C3%B3rio)
- [Instale as dependências](#2-instale-as-depend%C3%AAncias)
- [Crie o banco de dados](#3-crie-o-banco-de-dados)
- [Execute as migrations](#4-execute-as-migrations)
- [Modifique o arquivo hosts no Windows](#5-modifique-o-arquivo-hosts-no-windows)
- [Crie Virtual Hosts no Apache](#6-crie-virtual-hosts-no-apache)
- [Acesse o site](#7-acesse-o-site)

## 1) Clone o repositório

```sh
$ git clone https://github.com/deoliveirarogerio/test-client.git
```

## 2) Instale as dependências

```sh
$ composer i
$ npm i
```

## 3) Configure o banco de dados

1. Crie um banco de dados com colação a `utf8mb4_general_ci`
1.1 Modifique o arquivo .env com os dados de acesso ao banco de dados, como exemplo abaixo:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nome-do-seu-banco
DB_USERNAME=nome-usuário-do-banco
DB_PASSWORD=sua-senha 0u vazio

## 4) Execute as migrations

```sh
$ php artiasan make:migrate
```

## 5) Modifique o arquivo hosts no Windows

Caminho:

> C:\Windows\System32\drivers\etc\hosts

Instrução:

```
127.0.0.1	test-clients.test
```

## 6) Crie Virtual Hosts no Apache

Caminho:

| Software | Path |
| ------ | ------ |
| [XAMPP](https://www.apachefriends.org/pt_br/index.html) | C:\xampp\apache\conf\extra\httpd-vhosts.conf |
| [WampServer](https://www.wampserver.com/en) | C:\wamp64\bin\apache\apache2.4.46\conf\extra\httpd-vhosts.conf |

Instrução:

```conf
<VirtualHost uniline.test:80>
    DocumentRoot "C:/xampp/htdocs/clientes/uniline"
    ServerName uniline.test
</VirtualHost>
```

## 7) Acesse o site

| Url | User | Password |
| ------| ------ | ------ |
| [http://test-clients.test](http://test-clients.test)

