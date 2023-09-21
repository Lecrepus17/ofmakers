INSTRUÇÕES DE COMO UTILIZAR O PROGRAMA:

Instalação do Laravel do zero

- Escolher uma pasta
- composer create-project laravel/laravel <nome_da_pasta>
    - composer create-project laravel/laravel pw23-teste2
- Acessar a pasta
    - cd pw23-teste2
    - php artisan serve

Clonando do repositório e rodando

- Acessar a pasta
    - cd pasta_do_laravel
    - composer install
    - cp .env.example .env
    - php artisan key:generate
    - php artisan migrate --seed


-------------------------------------------------------------------------------------
Instalação do Laravel a partir do zero:

    Instale o Composer:
        Você pode instalar o Composer usando o seguinte comando:

   - sudo apt-get update
   - sudo apt-get install composer

Crie um novo projeto Laravel:

    Use o Composer para criar um novo projeto Laravel em sua pasta escolhida (substitua <nome_da_pasta> pelo nome desejado da pasta):

- composer create-project --prefer-dist laravel/laravel <nome_da_pasta>

Por exemplo:

   - composer create-project --prefer-dist laravel/laravel pw23-teste2

Acesse a pasta do projeto:

- cd <nome_da_pasta>

Inicie o servidor de desenvolvimento do Laravel:

- php artisan serve

-------------------------------------------------------------------------------------

Clonando do repositório e rodando:

    Acesse a pasta onde você clonou o repositório do Laravel no Raspberry Pi.

    Instale as dependências do Composer:

- composer install

Crie um arquivo de ambiente a partir do modelo:

- cp .env.example .env

Gere a chave de criptografia do aplicativo Laravel:

- php artisan key:generate

Execute as migrações do banco de dados (se você tiver migrações definidas no projeto Laravel):

- php artisan migrate --seed
