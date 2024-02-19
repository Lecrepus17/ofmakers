# ofmakers
A pasta termometro é usada apenas para o rasp com a adição dos componentes desejados.
Comandos para utilização do código para testes.

  cd projetoSensor2
  composer install
  cp .env.example .env
  php artisan key:generate 
 
  php artisan migrate --seed 
- Os dados gerados poderão gerar um gráfico do dia com erros, isso se deve a ter sido criado pensando em usar um banco de dados compativel com o criado pelo rasp.
 
  php artisan serve

