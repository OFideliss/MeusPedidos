<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Meus Pedidos</title>
  <link rel="stylesheet" href="pedidos.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
  <!--  -->
  <Section>
    <div class="tituloPedidos">
      <h1>MEUS PEDIDOS</h1>
      <form class=" d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Buscar Pedido" aria-label="Search">
      </form>
    </div>
    <div class="botoesPedidos">
      <button type="submit" class="btn-primary  bg-blue " value="Todos" onclick="Todos()">Todos</button>
      <button type="submit" class="btn-primary  bg-blue " value="Concluidos" onclick="Concluidos()">Concluidos</button>
      <button type="submit" class="btn-primary  bg-blue " value="Abertos" onclick="Abertos()">Abertos</button>
      <button type="submit" class="btn-primary  bg-blue " value="Cancelados" onclick="Cancelados()">Cancelados</button>
    </div>


    <?php
    include 'ConnectionPedido.php';
    ?>



    <div class="Pedido">

      <?php foreach ($pedidos as $pedido): ?>
        <div class="infoPedido">
          <!-- Exibir informações do pedido -->
          <div class='container-fluid'>
            <div class='row'>
              <div class='col-3'>
                <h3 class='texto'>REALIZADO EM <br></h3>
                <br>
                <p>
                  <?php echo  $pedido['info']['data']; ?>
                </p>
              </div>
              <div class='col-3'>
                <h3>TOTAL <br>  </h3>
                <br>
                <p>
                  R$
                  <?php echo $pedido['total']; ?>
                </p>
              </div>
              <div class='col-3'>
                <h3>CEP DESTINO</h3>
                <br>
                <p class = "enderecoCSS">
                  <?php echo $pedido['info']['endereco']; ?>
                </p>
              </div>
              <div class='col-3'>
                <h3>N° PEDIDO <br> </h3>
                <br>
                <p>
                  <?php echo $pedido['info']['numPedido']; ?>
                </p>
              </div>
            </div>
          </div>
        </div>

        <div class="itensPedido">
          <!-- Exibir itens do pedido -->
          <?php foreach ($pedido['itens'] as $item): ?>
            <div class='fundoItens'>
              <div class='imgItem'>
                <img src='images/<?php echo $item['img']; ?>' alt='Imagem do produto'>
              </div>
              <div class='descricao'>
                <h5>
                  <?php echo $item['descricao']; ?>
                </h5>
                
                 <div class='comprNov'>
                 <h6>R$
                  <?php echo $item['valor']; ?>
                </h6>
                <button type='submit' class='btn-primary bg-blue' value='Todos' onclick='CompNov()'>COMPRAR
                  NOVAMENTE</button>
              </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endforeach; ?>

    </div>
    </div>
    </div>
  </Section>
  
</body>

</html>