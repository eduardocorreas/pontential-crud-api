# Luiz Eduardo Corrêa da Silva

Estrutura backend desenvolvida com **Laravel** para ser fornecer dados que serão consumidos pelo frontend através de respostas em JSON.
Para este projeto, utilizei o Laravel na sua versão 8.

# Base de dados

O banco de dados selecionado foi **MySQL**

```
nome: varchar
sexo: char
idade: integer
hobby: varchar
datanascimento: date
especialidade: enum
```

# API endpoints

```
GET /developers
Codes 200
```

Retorna todos os desenvolvedores

```
GET /developers?
Codes 200 / 404
```

Retorna os desenvolvedores de acordo com o termo passado via querystring e
paginação

```
GET /developers/{id}
Codes 200 / 404
```

Retorna os dados de um desenvolvedor

```
POST /developers
Codes 201 / 400
```

Adiciona um novo desenvolvedor

```
PUT /developers/{id}
Codes 200 / 400
```

Atualiza os dados de um desenvolvedor

```
DELETE /developers/{id}
Codes 204 / 400
```

Apaga o registro de um desenvolvedor

# Testes

No desenvolvimento do backend da aplicação implementei **teste unitário** como descritos abaixo: <br/>

**check_if_user_column_is_correct:** Utilizado para validar se o número de colunas do banco de dados é igual ao fillable do model <br/>

Foi implementado também **testes de integração** como descritos abaixo: <br/>
**get_all_developers:** Verifica se a rota /developers retorna status 200 <br/>
**get_developers_by_id:** Verifica se a rota /developers/{id} retorna status 200 quando passado um id válido <br/>
**error_when_pass_a_failure_id:** Verifica se a rota /developers/{id} retorna status 404 quando passado um id inválido <br/>
