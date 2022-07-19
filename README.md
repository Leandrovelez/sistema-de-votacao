<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## Sobre o sistema (Em desenvolvimento)

Esse é um sistema de votação. O backend retorna uma API, que será consumida no front com React. As características do sistema são:

- Cada votação tem um título e data/hora de ínicio e término.
- O cadastro de opções de resposta é dinâmico, com no mínimo 3 respostas.

### Visualização da votação

- Lista todas as votações cadastradas com título e data/hora de ínicio e término, e separa por status: não iniciada / em andamento / finalizada.
- Tela de votação, com opção para responder e com as seguintes característcas:
- O número de votos ao lado de cada opção de resposta.
- Se a votação não estiver ativa, as opções e o botão de votar ficam desabilitados.
- Os números de votos são apresentados em tempo real.

