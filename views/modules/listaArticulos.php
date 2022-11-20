 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Lista de Productos (Clientes)</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
              <li class="breadcrumb-item active">Lista Productos Clientes</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <table id="dtAdmins" class="table table-bordered table-striped tablas">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Nombre Cliente</th>
                    <th>Correo Cliente</th>
                    <th>Lista Productos Cliente</th>
                  </tr>
                  </thead>
                  <tbody>
                  
                  
                  <?php

                  $item = null;
                  $valor = null;

                  $users = ControladorLista::ctrMostrarListasClientes($item, $valor);

                  foreach ($users as $key => $value){

                  echo ' <tr>
                          <td>'.($key+1).'</td>
                          <td>'.$value["nombreCliente"].'</td>
                          <td>'.$value["correoCliente"].'</td>
                          <td>'.$value["listaProductos"].'</td>';
                        '</tr>';
                  }


                  ?>

                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->