 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Nosotros</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
              <li class="breadcrumb-item active">Nosotros</li>
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
                <table id="dtNosotros" class="table table-bordered table-striped tablas">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Nosotros</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                  
                  
                  <?php

                  $item = null;
                  $valor = null;

                  $nosotros = ControladorNosotros::ctrMostrarNosotros($item, $valor);

                  foreach ($nosotros as $key => $value){

                  echo ' <tr>
                          <td>'.($key+1).'</td>
                          <td>'.$value["nosotros"].'</td>';

                          echo '<td>
                              <div class="btn-group">
                                  
                                <button class="btn btn-warning btnEditNosotros" idNosotros="'.$value["idNosotros"].'" data-toggle="modal" data-dismiss="modal" data-target="#modalEditNosotros"><i class="fas fa-pencil-alt"></i></button>

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

    
       <!-- MODAL EDIT NOSOTROS -->
       <div class="modal fade" id="modalEditNosotros">
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
                    
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Editar Sobre Nosotros</label>
                        <textarea id="editTxtNosotros" name="editTxtNosotros" rows="5" cols="50" placeholder="Editar Sobre Nosotros ..."></textarea>
                        <input type="hidden" id="idEditNosotros" name="idEditNosotros">
                      </div>
                    </div>

                  </div>
                
            </div>
            <br>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary" id="editSaveNosotros" name="editSaveNosotros">Editar Nosotros</button>
            </div>
            <?php

            $editarNosotros = new ControladorNosotros();
            $editarNosotros -> ctrEditarNosotros();

            ?>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- MODAL EDIT NOSOTROS -->

      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->