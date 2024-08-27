# **SIEGE (Sistema Informativo e Gerenciamento Escolar)**

O **SIEGE** (Informative and Management School System) é um sistema acadêmico projetado para facilitar a comunicação entre a escola e os pais, permitindo que o boletim dos alunos seja enviado remotamente. Além disso, ele proporciona funcionalidades de gestão escolar, permitindo que diretores, professores e alunos interajam com o sistema de acordo com suas permissões.

## **Funcionalidades**

### **Para Gestores (Diretores, Vice-Diretores, Supervisores e Secretários)**
- Registro, atualização e exclusão de usuários, turmas e disciplinas.
- Publicação, atualização e exclusão de notas de todos os alunos registrados.
- Consulta de informações registradas sobre todos os aspectos do sistema.

### **Para Professores**
- Publicação, atualização e exclusão de notas de seus alunos.
- Consulta de informações sobre suas turmas, disciplinas e alunos.

### **Para Alunos**
- Consulta de seu próprio boletim.
- Acesso a informações relacionadas às suas turmas e disciplinas.

### **Para Visitantes**
- Visualização de informações sobre a escola como um site público.

## **Tecnologias Utilizadas**

- **Frontend:**
  - HTML (integrado em arquivos .php)
  - CSS
  - Bootstrap
  - JavaScript (para interações do usuário e AJAX)
  
- **Backend:**
  - PHP
  - MySQL (banco de dados local durante o desenvolvimento)
  - JSON (para configurações e respostas AJAX)

## **Instalação**

1. Clone o repositório:
   ```bash
   git clone https://github.com/seu-usuario/SIEGE.git
   ```
2. Navegue até o diretório do projeto:
   ```bash
   cd SIEGE
   ```
3. Configure o banco de dados MySQL local:
   - Importe o arquivo SQL localizado em `/BancoDados` para criar as tabelas necessárias.
   
4. Configure as credenciais de banco de dados no arquivo `config.php` (ou equivalente).
   
5. Inicie o servidor local:
   - Utilize o XAMPP, WAMP ou qualquer servidor local de sua escolha.
   
6. Acesse o sistema via navegador:
   ```http
   http://localhost/SIEGE
   ```

## **Uso**

- **Login:** Use suas credenciais para acessar o sistema.
- **Gestão:** Navegue pelas diferentes seções para gerenciar usuários, turmas, disciplinas, e notas.
- **Consulta:** Alunos e professores podem consultar as informações relevantes através de suas contas.

## **Contribuição**

Contribuições são bem-vindas! Se você deseja contribuir com o projeto, siga as etapas abaixo:

1. Faça um fork do repositório.
2. Crie uma branch para a sua feature ou correção de bug:
   ```bash
   git checkout -b minha-feature
   ```
3. Commit suas alterações:
   ```bash
   git commit -m 'Adiciona minha nova feature'
   ```
4. Faça o push para a branch:
   ```bash
   git push origin minha-feature
   ```
5. Abra um Pull Request.

## **Licença**

<!-- Este projeto é licenciado sob a licença MIT. Consulte o arquivo [LICENSE](LICENSE) para mais informações. -->
