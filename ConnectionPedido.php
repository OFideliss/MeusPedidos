<?php
$host = "localhost";
$username = "root";
$password = "";
$DB = "loja";

$conn = mysqli_connect($host, $username, $password) or die("Impossível conectar ao banco de dados.");
@mysqli_select_db($conn, $DB) or die("Impossível conectar ao banco de dados");

$query = "SELECT * FROM pedidos";
$result = mysqli_query($conn, $query) or die("Impossível executar a query");

$pedidos = array();

while ($row = mysqli_fetch_assoc($result)) {
    $numPedido = $row['numPedido'];

    if (!array_key_exists($numPedido, $pedidos)) {
        $pedidos[$numPedido] = array(
            'info' => $row,
            'itens' => array(),
            'total' => 0 
        );
    }

    $pedidos[$numPedido]['itens'][] = $row;
    $pedidos[$numPedido]['total'] += $row['valor'];
}

mysqli_close($conn);

?>
