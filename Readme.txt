Para poder rodar o projeto trocateca localmente, inicialmente será necessário colar o seguinte comando no terminal:
- git clone https://github.com/IgorNogueiraPessoa/TrocaTeca-TCC

Agora com o trocateca instalado na maquina será necessário instalar suas dependencias, o composer e o NodeJS
Para liberar a biblioteca no seu dispositivo, baixe a versão mais recente dessas ferramentas nesses sites:
- https://getcomposer.org/download
- https://nodejs.org/en

Depois de instalar, selecione a pasta do trocateca no terminal usando:
- cd TrocaTeca-TCC

Agora uma serie de comandos deverá ser executada:
- copy .env.example .env
- composer install
- npm i
- php artisan key:generate
- php artisan migrate

(A partir desse momento o projeto já está pronto para rodar, porém aqui você pode importar o banco de dados para popular as tabelas)

Agora sim está tudo pronto, para rodar o projeto execute os comandos:
- php artisan serve
e em outro terminal ao mesmo tempo execute
- npm run dev

Na guia do navegador você pode abrir o site no endereço local "127.0.0.1:8000"