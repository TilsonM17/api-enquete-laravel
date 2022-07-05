# Desafio Enquete

 - [Introdução](#introdução)
 - [Descrição](#descrição)
 - [Obter o projecto](#obter-o-projecto)


## Introdução

>Este projecto consiste em criar uma API RESTfull de enquete desenvolvido em Laravel, e consumir em telas usando Vue no ecossistema Laravel. O serviço principal da api sera `GET /poll/:id`.Para manter a simplicidade, não houve autenticação nas APIs.

**Nota**:
Uma enquete é uma pesquisa, na qual as pessoas respondem uma pergunta escolhendo
dentre algumas alternativas pré-definidas

## Descrição

 #### Get `/poll/:id` 
Vai retornar os dados de uma enquete:

    {
    "status": 200,
    "statusText": "OK",
    "data": {
        "poll_id": 7,
        "poll_description": "Teste",
        "options": [
                {"option_id": 1,"option_description": "First option"},
                 {"option_id": 2,"option_description": "Second option"},
                 {"option_id": 3,"option_description": "Third option"},
             ]
    }
}


***Caso o id não exista no sistema, o retorno sera um 404 Not Found***.

---

#### Post `/poll`
Vai criar uma nova enquete.

    {
       
        "poll_description": "Voçe é bonito?" 
        "options": [
             "Sim"
             "Não"
             "Talvez"
             ]
    }

E o retorno sera o  id da poll:

       {
        "poll_id": 103,
       }

---

#### Post `/poll/:id/vote/:id_option` 


Vai registrar um novo voto para uma opção.

     {
        "poll_id": 1,
     }


**Caso o id não exista no sistema, o retorno deverá ser um 404 Not Found.**

---

#### Get `/poll/:id/stats`


Vai retornar estatísticas sobre a enquete. As views de uma enquete devem ser
incrementadas sempre que uma requisição `Get /poll/:id` seja feita.
    
    {
        "views": 125    
        "votes": [
            {"option_id": 1,"qty": 10},
            {"option_id": 2,"qty": 25},
            {"option_id": 3,"qty": 1},
             ]
    }

---

## Obter o projecto 

Faça um clone do projecto com o comando:

    $ git clone https://github.com/TilsonM17/teste-enquete-laravel.git

Vamos entrar na pasta do projecto, e instalar as dependecias com os comandos:

    $ cd teste-enquete-laravel
    $ composer install

Defina as configurações do Banco de Dados Mysql no o arquivo `.env`, ou se preferir no arquivo `config/database.php`.

Depois rode as `migration`

    $ php artisan migrate

Depois rode o projecto com o comando
    
    $ php artisan serve

E em seguida acesse a url:

> http://localhost:8000/api/poll/7

**NOTA** : Usei o id 7 como exemplo

## Screenshot


