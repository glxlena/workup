🚀 
WorkUp é uma plataforma robusta desenvolvida para ser o ponto de encontro entre profissionais autônomos e freelancers, e clientes (pessoas ou empresas) em busca de serviços. O sistema oferece ferramentas de divulgação de trabalho, sistema de avaliação mútua e canais de comunicação direta, estabelecendo um ambiente transparente e eficiente para contratação e networking profissional.

🎯 Objetivo do Sistema
* O WorkUp foi criado para aproximar profissionais e clientes, oferecendo uma plataforma simples, intuitiva e funcional que facilita a divulgação de serviços, avaliação de usuários e comunicação direta entre as partes.

📌 Principais Funcionalidades
- 🔐 Autenticação e Perfil
    * Cadastro de novos usuários
    * Login seguro
    * Edição de perfil
    * Visualização de avaliações recebidas
    * Exclusão de avaliações recebidas

- 📝 Postagens
    * Criar posts de oferta de serviço ou procura de profissional
    * Editar posts criados
    * Excluir posts
    * Definir disponibilidade (disponível/indisponível)
    * Visualizar posts próprios
    * Upload e exibição de imagens
    * Filtrar posts por cidade, categoria e tipo

- ⭐ Interações
    * Favoritar posts
    * Avaliar usuários após uma experiência
    * Visualizar avaliações recebidas
    * Entrar em contato com outros usuários via:
        * WhatsApp
        * E-mail

- 🔔 Notificações
    * Notificações ao receber uma nova avaliação
    * Notificações ao ter um post favoritado

- 🏗️ Tecnologias Utilizadas
    * Laravel (framework principal)
    * MySQL (banco de dados)
    * Blade (sistema de templates)
    * Bootstrap (estilização)
    * PHP
    * JavaScript

💻 Instalação e Configuração (Ambiente Local)
Para rodar o WorkUp, você precisará de um ambiente que suporte PHP, Composer, Node.js e MySQL. Não é obrigatório o uso de Docker ou XAMPP.
- 📦 Pré-requisitos
    * PHP: Versão 8.1 ou superior.
    * Composer: Gerenciador de dependências PHP.
    * Node.js e NPM: Para compilar os assets de frontend.
    * MySQL: Um servidor de banco de dados rodando em sua máquina.
    * Git: Para clonar o repositório.

# Rode os seguintes comandos no terminal, dentro do sistema: 

# 1 - CLONAR O REPOSITÓRIO:
git clone https://github.com/glxlena/workup.git
cd workup

# 2 - INSTALAR DEPENDÊNCIAS:
composer install
npm install

# 3 - CONFIGURAR BANCO DE DADOS:
cp .env.example .env
php artisan key:generate

# 4 - EDITE O ARQUIVO .env PARA CONFIGURAR A CONEXÃO COM O MYSQL:
# .env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306 
DB_DATABASE=exemplo_banco
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha

# 5 - EXECUTAR MIGRATIONS:
php artisan migrate

# 6 - PARA QUE O FRONTEND FUNCIONE:
npm run dev

# 7 - INICIE O SERVIDOR:
php artisan serve

# Após isso, se tudo ocorrer de forma certa, o sistema estará rodando de forma local para que você consiga usar

❗Esse projeto foi desenvolvido por Helena de Oliveira, para fim de Trabalho de Conclusão de Curso!
