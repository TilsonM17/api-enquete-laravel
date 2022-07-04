## Desafio Enquete

Uma enquete é uma pesquisa, na qual as pessoas respondem uma pergunta escolhendo
dentre algumas alternativas pré-definidas.

O seu objetivo é criar uma API RESTful para a utilização de uma enquete e apresentá-la
em telas utilizando Vue acoplado ao Laravel.

Leia com atenção:

 - A sua solução deverá prezar pelo serviço principal. `GET /poll/:id` 
 - Para manter a simplicidade, não haverá autenticação nas APIs.

 ---
 ### Get `/poll/:id` 
Deve retornar os dados de uma enquete:


    {
        "poll_id": 1,
        "poll_description": "Teste" 
        "options": [
            {"option_id": 1,"option_description": "First option"},
            {"option_id": 2,"option_description": "Second option"},
            {"option_id": 3,"option_description": "Third option"},
             ]
    }

***Caso o id não exista no sistema, o retorno deverá ser um 404 Not Found***.

### Post `/poll`
Deve criar uma nova enquete.

    {
       
        "poll_description": "Teste" 
        "options": [
             "First option"
             "Second option"
            "Third option"
             ]
    }

E o retorno id da poll:

       {
        "poll_id": 103,
       }


### Post `/poll/:id/vote/:id_option` 


Deve registrar um voto para uma opção.

     {
        "poll_id": 1,
     }


**Caso o id não exista no sistema, o retorno deverá ser um 404 Not Found.**

## Get `/poll/:id/stats`


Deve retornar estatísticas sobre a enquete. As views de uma enquete devem ser
incrementadas sempre que uma requisição Get /poll/:id seja feita.
    
    {
        "views": 125    
        "votes": [
            {"option_id": 1,"qty": 10},
            {"option_id": 2,"qty": 25},
            {"option_id": 3,"qty": 1},
             ]
    }