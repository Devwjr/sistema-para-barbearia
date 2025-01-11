<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Barbearia Estilo</title>
  <link rel="stylesheet" href="Style.css">
</head>
<body>
<nav class="navbar">
  <div class="container">
    <ul class="navbar-nav">
      <li class="nav-item"><a href="#">Início</a></li>
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

<header class="header">
  <div class="container">
    <h1>Bem-vindo à Barbearia Estilo</h1>
    <p>Os melhores serviços para você cuidar de si!</p>
  </div>
</header>

<section class="serviços" id="servicos">
  <h1>Nossos Serviços</h1>
  <div class="cards">
    <!-- Cartões de serviços -->
    <div class="card">
      <h2>Barba</h2>
      <p class="preco">R$ 30,00</p>
      <ul>
        <li>Modelagem e aparo da barba</li>
        <li>Produtos de alta qualidade</li>
        <li>Toalha quente para acabamento</li>
      </ul>
    </div>
    <div class="card">
      <h2>Cabelo e Barba</h2>
      <p class="preco">R$ 35,00</p>
      <ul>
        <li>Corte personalizado</li>
        <li>Modelagem da barba</li>
        <li>Lavagem e hidratação</li>
      </ul>
    </div>
    <div class="card">
      <h2>Corte de Cabelo</h2>
      <p class="preco">R$ 20,00</p>
      <ul>
        <li>Corte clássico ou moderno</li>
        <li>Descontos em serviços extras</li>
        <li>Conselhos capilares</li>
      </ul>
    </div>
  </div>
</section>

<section id="formulario" class="section light">
  <div class="container">
    <h2>Agende seu horário</h2>
    <form method="POST" action="processar_agendamento.php">
      <label for="nome">Nome</label>
      <input type="text" name="nome" id="nome" placeholder="Digite seu nome" required>

      <label for="telefone">Telefone</label>
      <input type="tel" name="telefone" id="telefone" placeholder="(99) 99999-9999" required>

      <label for="data">Data do agendamento</label>
      <input type="date" name="data" id="data" required>

      <label for="horario">Horário</label>
      <input type="time" name="horario" id="horario" required>

      <label for="servico">Serviço</label>
      <select name="servico" id="servico" required>
        <option value="" disabled selected>Selecione o serviço</option>
        <option value="Corte">Corte de cabelo</option>
        <option value="Barba">Aparar barba</option>
        <option value="Corte e Barba">Corte + Barba</option>
      </select>

      <button type="submit">Agendar</button>
    </form>
  </div>
</section>

<section id="endereco" class="endereço">
  <h3>Nosso endereço</h3>
  <iframe
    width="100%"
    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7476.4115143508725!2d-54.58602051703828!3d-20.45674056051272!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9486e8954ac0b10d%3A0x7149aba0cb5688b8!2sShopping%20Campo%20Grande!5e0!3m2!1sen!2sbr!4v1688840244482!5m2!1sen!2sbr"
    width="600"
    height="450"
    style="border:0;"
    allowfullscreen=""
    loading="lazy"
    referrerpolicy="no-referrer-when-downgrade">
  </iframe>
</section>

<footer class="footer">
  <div class="container">
    &copy; 2024 Barbearia Estilo. Todos os direitos reservados.
  </div>
</footer>

<script>
  function toggleMenu() {
    const nav = document.querySelector('.navbar-nav');
    nav.classList.toggle('collapsed');
  }
</script>
</body>
</html>
