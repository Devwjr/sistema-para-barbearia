<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Barbearia Estilo</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-black text-white">

  <!-- NAVBAR -->
  <nav class="fixed top-0 left-0 w-full bg-black shadow-md z-50">
    <div class="max-w-7xl mx-auto px-4 flex justify-between items-center py-4">
      <div class="text-yellow-400 font-bold text-xl">Barbearia Estilo</div>
      <ul class="hidden md:flex space-x-6 font-semibold">
        <li><a href="#" class="hover:text-yellow-400">Início</a></li>
        <li><a href="#servicos" class="hover:text-yellow-400">Serviços</a></li>
        <li><a href="#formulario" class="hover:text-yellow-400">Agendamento</a></li>
        <li><a href="#endereco" class="hover:text-yellow-400">Endereço</a></li>
      </ul>
      <div class="md:hidden">
        <!-- Aqui você pode adicionar um botão mobile futuramente -->
      </div>
    </div>
  </nav>

  <!-- HEADER -->
  <header class="h-screen bg-cover bg-center flex items-center justify-center flex-col text-center px-4" style="background-image: url('fundo.jpg'); margin-top: 64px;">
    <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Bem-vindo à Barbearia Estilo</h1>
    <p class="text-lg md:text-xl text-gray-200">Os melhores serviços para você cuidar de si!</p>
  </header>

  <!-- SERVIÇOS -->
  <section id="servicos" class="py-12 bg-black text-white text-center">
    <h1 class="text-3xl font-bold mb-8">Nossos Serviços</h1>
    <div class="flex flex-wrap justify-center gap-6">
      <div class="bg-black border-2 border-yellow-400 rounded-lg p-6 w-80 shadow-lg">
        <h2 class="text-xl text-yellow-400 font-bold mb-2">Barba</h2>
        <p class="text-2xl font-bold text-white mb-4">R$ 30,00</p>
        <ul class="text-left text-gray-300 list-disc list-inside">
          <li>Modelagem e aparo da barba</li>
          <li>Produtos de alta qualidade</li>
          <li>Toalha quente para acabamento</li>
        </ul>
      </div>
      <div class="bg-black border-2 border-yellow-400 rounded-lg p-6 w-80 shadow-lg">
        <h2 class="text-xl text-yellow-400 font-bold mb-2">Cabelo e Barba</h2>
        <p class="text-2xl font-bold text-white mb-4">R$ 35,00</p>
        <ul class="text-left text-gray-300 list-disc list-inside">
          <li>Corte personalizado</li>
          <li>Modelagem da barba</li>
          <li>Lavagem e hidratação</li>
        </ul>
      </div>
      <div class="bg-black border-2 border-yellow-400 rounded-lg p-6 w-80 shadow-lg">
        <h2 class="text-xl text-yellow-400 font-bold mb-2">Corte de Cabelo</h2>
        <p class="text-2xl font-bold text-white mb-4">R$ 20,00</p>
        <ul class="text-left text-gray-300 list-disc list-inside">
          <li>Corte clássico ou moderno</li>
          <li>Descontos em serviços extras</li>
          <li>Conselhos capilares</li>
        </ul>
      </div>
    </div>
  </section>

  <!-- FORMULÁRIO -->
  <section id="formulario" class="py-12 bg-black text-white">
    <div class="max-w-xl mx-auto">
      <h2 class="text-3xl font-bold text-center mb-6">Agende seu horário</h2>
      <form method="POST" action="public/processar_agendamento.php" class="space-y-4 border-2 border-yellow-400 p-6 rounded-lg">
        <div>
          <label for="nome" class="block mb-1">Nome</label>
          <input type="text" id="nome" name="nome" required class="w-full p-2 bg-black border border-yellow-400 rounded text-white">
        </div>
        <div>
          <label for="telefone" class="block mb-1">Telefone</label>
          <input type="tel" id="telefone" name="telefone" required placeholder="(99) 99999-9999" class="w-full p-2 bg-black border border-yellow-400 rounded text-white">
        </div>
        <div>
          <label for="data" class="block mb-1">Data do agendamento</label>
          <input type="date" id="data" name="data" required class="w-full p-2 bg-black border border-yellow-400 rounded text-white">
        </div>
        <div>
          <label for="horario" class="block mb-1">Horário</label>
          <input type="time" id="horario" name="horario" required class="w-full p-2 bg-black border border-yellow-400 rounded text-white">
        </div>
        <div>
          <label for="servico" class="block mb-1">Serviço</label>
          <select id="servico" name="servico" required class="w-full p-2 bg-black border border-yellow-400 rounded text-white">
            <option value="" disabled selected>Selecione o serviço</option>
            <option value="Corte">Corte de cabelo</option>
            <option value="Barba">Aparar barba</option>
            <option value="Corte e Barba">Corte + Barba</option>
          </select>
        </div>
        <button type="submit" class="w-full bg-yellow-400 text-black font-bold py-2 px-4 rounded hover:bg-yellow-500 transition">Agendar</button>
      </form>
    </div>
  </section>

  <!-- ENDEREÇO -->
  <section id="endereco" class="py-12 bg-black text-center">
    <h3 class="text-2xl font-bold text-yellow-400 mb-6">Nosso endereço</h3>
    <div class="w-full max-w-4xl mx-auto">
      <iframe
        class="w-full h-[450px] rounded-lg"
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7476.4115143508725!2d-54.58602051703828!3d-20.45674056051272!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9486e8954ac0b10d%3A0x7149aba0cb5688b8!2sShopping%20Campo%20Grande!5e0!3m2!1sen!2sbr!4v1688840244482!5m2!1sen!2sbr"
        allowfullscreen=""
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade">
      </iframe>
    </div>
  </section>

  <!-- FOOTER -->
  <footer class="bg-black text-yellow-400 text-center py-4">
    &copy; 2024 Barbearia Estilo. Todos os direitos reservados.
  </footer>

</body>

</html>