<?php

  require_once "../Clases/Productos.php";
  $producto = Productos::mostrarProductos();

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
                <th>CÓDIGO</th>
                <th>DESCRIPCIÓN</th>
                <th>PRECIO UNIDAD</th>
                <th>PRECIO COMPRA</th>
                <th>STOCK</th>
                <th>CATEGORIA</th>
            </tr>
            </thead>
            <tbody>
          <?php foreach ($producto as $item): ?>
            <tr>
            <th> <?php echo $item['NombreProd']; ?> </th>
            <th> <?php echo $item['CodigoProducto']; ?> </th>
            <th> <?php echo $item['DescripcionProd']; ?> </th>
            <th> <?php echo $item['PrecioUnitario']; ?> </th>
            <th> <?php echo $item['PrecioCompra']; ?> </th>
            <th> <?php echo $item['Cantidad_Disponible']; ?> </th>
            <th> <?php echo $item['ID_CategoriaFK']; ?> </th>
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