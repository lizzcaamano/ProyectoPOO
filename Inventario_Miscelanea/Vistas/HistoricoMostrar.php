<?php

  require_once "../clases/HistoricoModificacion.php";
  $HistoricoModificacion = Historicos::mostrarHistoricos();

  ?>
  
  <html>
      <head>
      <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
      </head>

      <body>

        <table  id="myTable" class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Fecha</th>
                <th>Detalles</th>
                <th>ID_ProductoFK</th>
                <th>ID_UsuarioFK</th>
            </tr>
            </thead>
            <tbody>
          <?php foreach ($HistoricoModificacion as $item): ?>
            <th> <?php echo $item['ID_Historico']; ?> </th>
            <th><?php echo $item['Fecha']; ?></th>       
            <th><?php echo $item['Detalles']?></th>
            <th><?php echo $item['ID_ProductoFK']?></th>
            <th><?php echo $item['ID_UsuarioFK']?></th>
            </th>
          </tr>
          <?php endforeach; ?>
            </tbody> 
          </table>

          <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
          <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
          <script>
            $(document).ready(function() {
                $('#myTable').DataTable( {
                    "processing": true,
                    "serverSide": true,
                    "ajax": "../server_side/scripts/server_processing.php"
                } );
            } );
            </script>
      </body>

  </html>