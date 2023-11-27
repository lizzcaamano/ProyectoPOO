<?php

  require_once "../Clases/Categorias.php";
  $categoria = Categorias::mostrarCategoria();

  ?>
  <html>
      
      <head>
      <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
      </head>

      <body>

        <table  id="myTable" class="table table-bordered">
            <thead>
            <tr>
                <th>NOMBRE CATEGORIA</th>
                <th>DESCRIPCIÓN</th>
            </tr>
            </thead>
            <tbody>
          <?php foreach ($categoria as $item): ?>
            <tr>
            <th> <?php echo $item['NombreCategoria']; ?> </th>
            <th> <?php echo $item['DescripcionCat']; ?> </th>
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