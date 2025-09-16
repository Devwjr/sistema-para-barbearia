
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Barbearia Estilo</title>
  <link rel="stylesheet" href="Style.css">
  <script>
    function toggleMenu() {
      var nav = document.querySelector('.navbar-nav');
      nav.classList.toggle('collapsed');
    }
  </script>
</head>
<body>
  <nav class="navbar">
    <div class="container">
      <ul class="navbar-nav">
        <li class="nav-item"><a href="#header">Início</a></li>
        <li class="nav-item"><a href="#servicos">Serviços</a></li>
        <li class="nav-item"><a href="#formulario">Agendamento</a></li>
        <li class="nav-item"><a href="#endereco">Endereço</a></li>
      </ul>
      <div class="navbar-toggle" onclick="toggleMenu()">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </nav>

  <header class="header" id="header">
    <h1>Barbearia Estilo</h1>
    <p>Seu estilo começa aqui. Agende seu horário e garanta o melhor atendimento!</p>
  </header>

  <section class="serviços section" id="servicos">
    <h1>Nossos Serviços</h1>
    <div class="cards">
      <div class="card">
        <h2>Corte Masculino</h2>
        <div class="preco">R$ 35 <span>/ sessão</span></div>
        <ul>
          <li>Estilo clássico ou moderno</li>
          <li>Finalização com produtos premium</li>
        </ul>
        <button onclick="document.getElementById('formulario').scrollIntoView()">Agendar</button>
      </div>
      <div class="card">
        <h2>Barba</h2>
        <div class="preco">R$ 25 <span>/ sessão</span></div>
        <ul>
          <li>Desenho e aparo</li>
          <li>Toalha quente</li>
        </ul>
        <button onclick="document.getElementById('formulario').scrollIntoView()">Agendar</button>
      </div>
      <div class="card">
        <h2>Combo Corte + Barba</h2>
        <div class="preco">R$ 55 <span>/ sessão</span></div>
        <ul>
          <li>Pacote completo</li>
          <li>Desconto especial</li>
        </ul>
        <button onclick="document.getElementById('formulario').scrollIntoView()">Agendar</button>
      </div>
    </div>
  </section>


  <section class="section light" id="formulario">
    <h1>Agende seu horário</h1>
    <form id="formAgendamento" action="processar_agendamento.php" method="POST" onsubmit="return mostrarModal();">
      <label for="nome">Nome:</label>
      <input type="text" id="nome" name="nome" required>

      <label for="telefone">Telefone:</label>
      <input type="text" id="telefone" name="telefone" required>

      <label for="servico">Serviço:</label>
      <select id="servico" name="servico" required>
        <option value="Corte Masculino">Corte Masculino</option>
        <option value="Barba">Barba</option>
        <option value="Combo Corte + Barba">Combo Corte + Barba</option>
      </select>

      <label for="data">Data:</label>
      <input type="date" id="data" name="data" required>

      <label for="horario">Horário:</label>
      <input type="time" id="horario" name="horario" required>

      <button type="submit">Agendar</button>
    </form>
    <div id="modalSucesso" style="display:none;position:fixed;top:0;left:0;width:100vw;height:100vh;background:rgba(0,0,0,0.7);z-index:999;justify-content:center;align-items:center;">
      <div style="background:#fff;color:#222;padding:40px 30px;border-radius:10px;text-align:center;max-width:300px;margin:auto;">
        <h2 style="color:#d4af37;">Agendamento marcado com sucesso!</h2>
        <button onclick="fecharModal()" style="margin-top:20px;background:#d4af37;color:#000;padding:10px 20px;border:none;border-radius:5px;cursor:pointer;">Fechar</button>
      </div>
    </div>
    <script>
      function mostrarModal() {
        document.getElementById('modalSucesso').style.display = 'flex';
        setTimeout(function(){
          document.getElementById('formAgendamento').submit();
        }, 1200);
        return false;
      }
      function fecharModal() {
        document.getElementById('modalSucesso').style.display = 'none';
      }
    </script>
  </section>


  <section class="section light" id="endereco">
    <h1>Onde estamos</h1>
    <div style="display:grid;grid-template-columns:1fr 1fr;gap:30px;align-items:center;max-width:800px;margin:auto;">
      <div>
        <p style="font-size:1.2rem;">Rua do Estilo, 123<br>Centro, Cidade<br>Telefone: (99) 99999-9999</p>
        <a href="https://www.google.com/maps" target="_blank" style="color:#d4af37;text-decoration:underline;">Ver no Google Maps</a>
      </div>
      <img src="Img/fundo.jpg" alt="Barbearia" style="max-width:400px; width:100%; border-radius:8px; box-shadow:0 4px 12px rgba(0,0,0,0.3);">
    </div>
  </section>

  <footer class="footer">
    &copy; 2025 Barbearia Estilo. Todos os direitos reservados.
  </footer>
</body>
</html>