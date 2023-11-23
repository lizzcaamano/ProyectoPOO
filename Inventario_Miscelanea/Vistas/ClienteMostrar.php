<?php

  require_once "../Clases/Clientes.php";
  $cliente = Clientes::mostrarClientes();

  ?>
  <html>
      
      <head>
      <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
      </head>

      <body>

        <table  id="myTable" class="table table-bordered">
            <thead>
            <tr>
                <th>NOMBRE</th>
                <th>DIRECCIÓN</th>
                <th>TELEFONO</th>
            </tr>
            </thead>
            <tbody>
          <?php foreach ($cliente as $item): ?>
            <tr>
            <th> <?php echo $item['NombreCli']; ?> </th>
            <th> <?php echo $item['DireccionCli']; ?> </th>
            <th> <?php echo $item['Telefono']; ?> </th>
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