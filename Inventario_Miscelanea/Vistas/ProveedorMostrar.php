<?php

  require_once "../Clases/Proveedores.php";
  $proveedor = Proveedores::mostrarProveedor();

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
                <th>CORREO</th>
            </tr>
            </thead>
            <tbody>
          <?php foreach ($proveedor as $item): ?>
            <tr>
            <th> <?php echo $item['NombreProv']; ?> </th>
            <th> <?php echo $item['DireccionProv']; ?> </th>
            <th> <?php echo $item['Telefono']; ?> </th>
            <th> <?php echo $item['Correo']; ?> </th>
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