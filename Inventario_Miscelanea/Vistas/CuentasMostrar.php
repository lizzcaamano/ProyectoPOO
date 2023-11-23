<?php

  require_once "../Clases/CuentasPorCobrar.php";
  $cuenta = Cuentas::mostrarCuentas();

  ?>
  <html>
      
      <head>
      <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
      </head>

      <body>

        <table  id="myTable" class="table table-bordered">
            <thead>
            <tr>
                <th>SALDO</th>
                <th>FECHA LIMITE</th>
                <th>CLIENTE</th>
            </tr>
            </thead>
            <tbody>
          <?php foreach ($cuenta as $item): ?>
            <tr>
            <th> <?php echo $item['Monto_Debido']; ?> </th>
            <th> <?php echo $item['Fecha_Limite']; ?> </th>
            <th> <?php echo $item['ID_ClienteFK']; ?> </th>
            </tr>
          <?php endforeach; ?>
            </tbody> 
          </table>

          <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
          <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
          <script>
            $(document).ready(function() {
                $('#myTable').DataTable();
            });
            </script>
      </body>

  </html>