<?php

  require_once "../Clases/Compras.php";
  $compra = Compras::mostrarCompras();

  ?>
  <html>
      
      <head>
      <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
      </head>

      <body>

        <table  id="myTable" class="table table-bordered">
            <thead>
            <tr>
                <th>CANTIDAD</th>
                <th>PRECIO COMPRA</th>
                <th>PRECIO VENTA</th>
                <th>PRODUCTO</th>
                <th>PROVEEDOR</th>
            </tr>
            </thead>
            <tbody>
          <?php foreach ($compra as $item): ?>
            <tr>
            <th> <?php echo $item['CantidadCompra']; ?> </th>
            <th> <?php echo $item['Precio_Compra']; ?> </th>
            <th> <?php echo $item['Precio_Venta']; ?> </th>
            <th> <?php echo $item['ID_ProductoFK']; ?> </th>
            <th> <?php echo $item['ID_ProveedorFK']; ?> </th>
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