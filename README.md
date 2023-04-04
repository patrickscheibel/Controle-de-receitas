# Controle-de-receitas
A aplicação está separada em backend e frontend com o foco no cadastro e controle de receitas.

## Itens pendentes

### Autenticação no sistema

Não foi feita uma autenticação complexa por causa de alguns problemas que tive com os recursos do Vue.js e do Node no frontend, aparentemente o sistema ubuntu que eu estava usando me limitou em alguns pontos que não consegui resolver, então escolhi fazer algo mais simples com uma tela de cadastro e login, ambas usam o backend como API para realizar consultas e realizar as ações necessárias para se ter acesso ao site.

### Frontend

Devido a algumas dificuldades técnicas e problemas com o ambiente de desenvolvimento, como bibliotecas desatualizadas e recursos do sistema operacional, acabei tendo um atraso maior na criação do frontend, que acabou ficando incompleto tendo acesso apenas a:
- Tela de cadastro de usuário
- Tela de login
- Dashboard
- Listagem das receitas
- Edição das receitas
Alguns dos botões e funcionalidades, acabaram ficando indisponíveis devido a esse atraso.

### Ordenação do ingredientes

Como alguns recursos não estavam funcionando, acabei optando por não fazer a ordenação dinâmica para os ingredientes na tela, já que não conseguia instalar e usar as bibliotecas, mas o backend está preparado para essa funcionalidade, só não consegui aplicar elas no frontend.

### Observações:

- Nas migrações utilizei um sql convencional para criar as tabelas já que optei por usar o MySQL.
- Pode parecer que faltou muita coisa para concluir o desafio, mas vale lembrar que o backend ficou completo, ficando pendente só fazer as demais requisições para as telas, que eram cadastros que iriam chamar as rotas da API.
