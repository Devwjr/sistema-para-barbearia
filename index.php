
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
      <button class="toggle-mode" id="toggleTheme" title="Alternar tema" onclick="toggleMode()">
        <span id="iconLamp">💡</span>
      </button>
      <div class="navbar-toggle" onclick="toggleMenu()">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </nav>
  <script>
    function toggleMode() {
      document.body.classList.toggle('light-mode');
      localStorage.setItem('theme', document.body.classList.contains('light-mode') ? 'light' : 'dark');
      document.getElementById('iconLamp').textContent = document.body.classList.contains('light-mode') ? '🔆' : '💡';
    }
    window.onload = function() {
      if(localStorage.getItem('theme') === 'light') {
        document.body.classList.add('light-mode');
        document.getElementById('iconLamp').textContent = '🔆';
      }
    }
  </script>


  <header class="header" id="header">
    <div style="background:rgba(0,0,0,0.55);border-radius:18px;display:inline-block;padding:32px 48px;margin-top:60px;box-shadow:0 4px 24px rgba(0,0,0,0.18);">
      <h1 style="font-size:2.8rem;color:#d4af37;margin-bottom:10px;letter-spacing:2px;font-weight:800;text-shadow:0 2px 8px #000;">Barbearia Estilo</h1>
      <p style="font-size:1.3rem;color:#fff;max-width:500px;margin:0 auto;">Seu estilo começa aqui. Agende seu horário e garanta o melhor atendimento!</p>
    </div>
  </header>


  <section class="serviços section" id="servicos">
    <h1>Nossos Serviços</h1>
    <div class="cards" style="display:grid;grid-template-columns:repeat(auto-fit,minmax(320px,1fr));gap:40px;justify-items:center;align-items:stretch;">
      <div class="card" style="display:flex;flex-direction:column;align-items:center;justify-content:space-between;">
        <img src="https://images.unsplash.com/photo-1517836357463-d25dfeac3438?w=400&q=80" alt="Corte Masculino" style="width:100%;max-width:220px;border-radius:12px;box-shadow:0 2px 12px rgba(0,0,0,0.12);margin-bottom:18px;">
        <h2>Corte Masculino</h2>
        <div class="preco">R$ 35 <span>/ sessão</span></div>
        <ul>
          <li>Estilo clássico ou moderno</li>
          <li>Finalização com produtos premium</li>
        </ul>
        <button onclick="document.getElementById('formulario').scrollIntoView()">Agendar</button>
      </div>
      <div class="card" style="display:flex;flex-direction:column;align-items:center;justify-content:space-between;">
        <img src="https://images.unsplash.com/photo-1511367461989-f85a21fda167?w=400&q=80" alt="Barba" style="width:100%;max-width:220px;border-radius:12px;box-shadow:0 2px 12px rgba(0,0,0,0.12);margin-bottom:18px;">
        <h2>Barba</h2>
        <div class="preco">R$ 25 <span>/ sessão</span></div>
        <ul>
          <li>Desenho e aparo</li>
          <li>Toalha quente</li>
        </ul>
        <button onclick="document.getElementById('formulario').scrollIntoView()">Agendar</button>
      </div>
      <div class="card" style="display:flex;flex-direction:column;align-items:center;justify-content:space-between;">
        <img src="https://images.unsplash.com/photo-1520880867055-1e30d1cb001c?w=400&q=80" alt="Combo Corte + Barba" style="width:100%;max-width:220px;border-radius:12px;box-shadow:0 2px 12px rgba(0,0,0,0.12);margin-bottom:18px;">
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