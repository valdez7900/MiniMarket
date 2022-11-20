 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Administradores</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
              <li class="breadcrumb-item active">Administradores</li>
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
            <div class="card-header">
                <h3 class="card-title">
                <button type="button" class="btn btn-info btn-block btn-flat" data-toggle="modal" data-target="#modalAddAdmin"><i class="fas fa-users-cog"></i> Agregar Administrador</button>
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="dtAdmins" class="table table-bordered table-striped tablas">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Usuario</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                  
                  
                  <?php

                  $item = null;
                  $valor = null;

                  $users = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

                  foreach ($users as $key => $value){

                  echo ' <tr>
                          <td>'.($key+1).'</td>
                          <td>'.$value["nombreUsuario"].'</td>';

                          echo '<td>
                              <div class="btn-group">
                                  
                                <button class="btn btn-warning btnEditAdmin" idAdmin="'.$value["idUsuario"].'" data-toggle="modal" data-dismiss="modal" data-target="#modalEditAdmin"><i class="fas fa-pencil-alt"></i></button>

                                <button class="btn btn-danger btnDeleteAdmin" idAdmin="'.$value["idUsuario"].'"><i class="fa fa-times"></i></button>

                              </div>  
                          </td>';
                          
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

        <!-- MODAL ADD ADMINS -->
        <div class="modal fade" id="modalAddAdmin">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Agregar Administrador</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white;">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form id="formAddAdmin" role="form" method="post" enctype="multipart/form-data" autocomplete="off">

                  <div class="row">
                    
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Usuario</label>
                        <input type="text" class="form-control" placeholder="Usuario ..." id="userAdmin" name="userAdmin" required>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Contraseña</label>
                        <input type="password" class="form-control" placeholder="Contraseña ..." id="passAdmin" name="passAdmin" required>
                      </div>
                    </div>

                  </div>


            <br>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary" id="saveAdmin" name="saveAdmin">Guardar Admin</button>
            </div>
            <?php

            $crearAdministrador = new ControladorUsuarios();
            $crearAdministrador -> ctrCrearAdmin();

            ?>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      </div>
      <!-- MODAL ADD ADMINS -->

       <!-- MODAL EDIT ADMINS -->
       <div class="modal fade" id="modalEditAdmin">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Editar Administrador</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form role="form" method="post" enctype="multipart/form-data" autocomplete="off">

                  <div class="row">
                    
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Usuario</label>
                        <input type="text" class="form-control" placeholder="Editar Usuario ..." id="editUserAdmin" name="editUserAdmin" required>
                        <input type="hidden" id="idEditAdmin" name="idEditAdmin">
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Cambiar Contraseña</label>
                        <input type="password" class="form-control" placeholder="Contraseña ..." id="editPassAdmin" name="editPassAdmin">
                        <input type="hidden" id="passwordActual" name="passwordActual">
                      </div>
                    </div>


                  </div>
                
            </div>
            <br>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary" id="editSaveAdmin" name="editSaveAdmin">Guardar Cambios</button>
            </div>
            <?php

            $editarAdministrador = new ControladorUsuarios();
            $editarAdministrador -> ctrEditarAdmin();

            ?>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- MODAL EDIT ADMINS -->

      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->