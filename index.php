<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Barbearia do John</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="Style.css">
  <script>
    function toggleMenu() {
      var nav = document.querySelector('.navbar-nav');
      nav.classList.toggle('collapsed');
    }
  </script>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#header">Barbearia do john</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link" href="#header">Início</a></li>
          <li class="nav-item"><a class="nav-link" href="#servicos">Serviços</a></li>
          <li class="nav-item"><a class="nav-link" href="#formulario">Agendamento</a></li>
          <li class="nav-item"><a class="nav-link" href="#endereco">Endereço</a></li>
        </ul>
        <button class="btn btn-warning" id="toggleTheme" title="Alternar tema" onclick="toggleMode()">
          <span id="iconLamp">☀️</span>
        </button>
      </div>
    </div>
  </nav>
  <script>
    function toggleMode() {
      document.body.classList.toggle('light-mode');
      localStorage.setItem('theme', document.body.classList.contains('light-mode') ? 'light' : 'dark');
  document.getElementById('iconLamp').textContent = document.body.classList.contains('light-mode') ? '☀️' : '🌙';
    }
    window.onload = function() {
      if(localStorage.getItem('theme') === 'light') {
        document.body.classList.add('light-mode');
        document.getElementById('iconLamp').textContent = '☀️';
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
    <h1 class="text-center my-4">Nossos Serviços</h1>
    <div class="row justify-content-center">
      <div class="col-md-4 mb-4">
        <div class="card h-100 shadow">
          <img src="https://images.unsplash.com/photo-1605497788044-5a32c7078486?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8Y29ydGUlMjBkZSUyMGNhYmVsb3xlbnwwfHwwfHx8MA%3D%3D class="card-img-top" alt="Corte Masculino">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title">Corte Masculino</h5>
            <p class="card-text"><strong>R$ 35</strong> <span>/ sessão</span></p>
            <ul class="list-unstyled mb-3">
              <li>Estilo clássico ou moderno</li>
              <li>Finalização com produtos premium</li>
            </ul>
            <button class="btn btn-warning mt-auto">Agendar</button>
          </div>
        </div>
      </div>
      
      <div class="col-md-4 mb-4">
        <div class="card h-100 shadow">
          <img src="https://images.unsplash.com/photo-1733995471058-3d6ff2013de3?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8N3x8Y29ydGUlMjBkZSUyMGJhcmJhJTIwYmFyYmVhcmlhfGVufDB8fDB8fHww" class="card-img-top" alt="Barba">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title">Barba</h5>
            <p class="card-text"><strong>R$ 25</strong> <span>/ sessão</span></p>
            <ul class="list-unstyled mb-3">
              <li>Desenho e aparo</li>
              <li>Toalha quente</li>
            </ul>
            <button class="btn btn-warning mt-auto">Agendar</button>
          </div>
        </div>
      </div>

      <div class="col-md-4 mb-4">
        <div class="card h-100 shadow">
          <img src="https://images.unsplash.com/photo-1705976063599-39e79ab87bb1?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8Y29ydGUlMjBiYXJiZWFyaWF8ZW58MHx8MHx8fDA%3D" class="card-img-top" alt="Combo">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title">Combo Corte + Barba</h5>
            <p class="card-text"><strong>R$ 55</strong> <span>/ sessão</span></p>
            <ul class="list-unstyled mb-3">
              <li>Pacote completo</li>
              <li>Desconto especial</li>
            </ul>
            <button class="btn btn-warning mt-auto">Agendar</button>
          </div>
        </div>
      </div>
    </div>
  </section>


  <section class="section light" id="formulario">
    <h1 class="text-center my-4">Agende seu horário</h1>
    <form id="formAgendamento" action="processar_agendamento.php" method="POST" class="row g-3 mx-auto" style="max-width:500px;" onsubmit="return mostrarModal();">
      <div class="col-12">
        <label for="nome" class="form-label">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" required>

      </div>
      <div class="col-12">
        <label for="telefone" class="form-label">Telefone:</label>
        <input type="text" class="form-control" id="telefone" name="telefone" required>
      </div>
      <div class="col-12">
        <label for="servico" class="form-label">Serviço:</label>
        <select class="form-select" id="servico" name="servico" required>
          <option value="Corte Masculino">Corte Masculino</option>
          <option value="Barba">Barba</option>
          <option value="Combo Corte + Barba">Combo Corte + Barba</option>
        </select>
      </div>
        <label for="data" class="form-label">Data:</label>
        <input type="date" class="form-control" id="data" name="data" required>
      </div>
      <div class="col-6">
        <label for="horario" class="form-label">Horário:</label>
        <input type="time" class="form-control" id="horario" name="horario" required>
      </div>
      <div class="col-12 text-center">
        <button type="submit" class="btn btn-warning w-100">Agendar</button>
      </div>
    </form>
    <div id="modalSucesso" class="modal fade" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
            class="card-img-top" alt="Combo Corte + Barba">
          <div class="modal-header">
            <h5 class="modal-title" id="modalLabel" style="color:#d4af37;">Agendamento marcado com sucesso!</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Fechar</button>
          </div>
        </div>
      </div>
    </div>
    <script>
      function mostrarModal() {
        var modal = new bootstrap.Modal(document.getElementById('modalSucesso'));
        modal.show();
        setTimeout(function(){
          document.getElementById('formAgendamento').submit();
        }, 1200);
        return false;
      }
      function fecharModal() {
        var modal = bootstrap.Modal.getInstance(document.getElementById('modalSucesso'));
        modal.hide();
      }
    </script>
  </section>


  <section class="section light" id="endereco">
    <h1 class="text-center my-4">Onde estamos</h1>
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-md-6 mb-4">
          <div class="card shadow">
            <div class="card-body">
              <h5 class="card-title">Endereço</h5>
              <p class="card-text mb-2">Rua do Estilo, 123<br>Centro, Cidade<br>Telefone: (99) 99999-9999</p>
              <a href="https://www.google.com/maps/place/Rua+do+Estilo,+123" target="_blank" class="btn btn-warning">Ver no Google Maps</a>
            </div>
          </div>
        </div>
        <div class="col-md-6 mb-4">
          <div class="ratio ratio-16x9">
            <iframe src="https://www.google.com/maps?q=Rua+do+Estilo,+123&output=embed" allowfullscreen loading="lazy" style="border-radius:8px;"></iframe>
          </div>
        </div>
      </div>
    </div>
  </section>

  <footer class="footer">
    &copy; 2025 Barbearia Estilo. Todos os direitos reservados.
  </footer>
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>