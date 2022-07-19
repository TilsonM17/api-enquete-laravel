# Desafio Enquete

 - [Introdução](#introdução)
 - [Docs](#descrição)
 - [Obter o projecto](#obter-o-projecto)


## Introdução

> Este é uma api feita com Laravel e o Banco de Dados PostgresSql . O serviço principal da api sera `GET api/poll/:id`. Para manter a simplicidade, não houve autenticação nas APIs.

**Nota**:
Uma enquete é uma pesquisa, na qual as pessoas respondem uma pergunta escolhendo
dentre algumas alternativas pré-definidas

## Descrição

 #### Get  `api/poll/:id` 
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

#### Post  `api/poll`
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

#### Post `api/poll/:id/vote/:id_option` 


Vai registrar um novo voto para uma opção.

     {
        "poll_id": 1,
     }


**Caso o id não exista no sistema, o retorno deverá ser um 404 Not Found.**

---

#### Get `api/poll/:id/stats`


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

Defina as configurações do Banco de Dados no o arquivo `.env`, ou se preferir no arquivo `config/database.php`.

Depois rode as `migration`

    $ php artisan migrate

Depois rode o projecto com o comando
    
    $ php artisan serve

E em seguida acesse a url:

> http://localhost:8000/api/poll/1

**NOTA** : Usei o id 1 como exemplo




