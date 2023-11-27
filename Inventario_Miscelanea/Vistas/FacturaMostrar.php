<?php

  require_once "../Clases/Facturas.php";
  $factura = Facturas::mostrarFacturas();

  ?>
  <html>
      
      <head>
      <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
      </head>

      <body>

        <table  id="myTable" class="table table-bordered">
            <thead>
            <tr>
                <th>FECHA</th>
                <th>CANTIDAD</th>
                <th>PRODUCTO</th>
                <th>CLIENTE</th>
                <th>TOTAL</th>
            </tr>
            </thead>
            <tbody>
          <?php foreach ($factura as $item): ?>
            <tr>
            <th> <?php echo $item['Fecha']; ?> </th>
            <th> <?php echo $item['Cantidad']; ?> </th>
            <th> <?php echo $item['ID_ProductoFK']; ?> </th>
            <th> <?php echo $item['ID_ClienteFK']; ?> </th>
            <th> <?php echo $item['Total']; ?> </th>
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