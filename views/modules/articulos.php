 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Articulos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
              <li class="breadcrumb-item active">Articulos</li>
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
                <button type="button" class="btn btn-info btn-block btn-flat" data-toggle="modal" data-target="#modalAddArticulos"><i class="fas fa-users-cog"></i> Agregar Articulos</button>
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="dtArticulos" class="table table-bordered table-striped tablas">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Nombre Articulo</th>
                    <th>Foto Articulo</th>
                    <th>Precio Articulo</th>
                    <th>Descuento Articulo</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                  
                  
                  <?php

                  $item = null;
                  $valor = null;

                  $articulos = ControladorArticulos::ctrMostrarArticulos($item, $valor);

                  foreach ($articulos as $key => $value){

                  echo ' <tr>
                          <td>'.($key+1).'</td>
                          <td>'.$value["nombreArticulo"].'</td>';

                          if($value["fotoArticulo"] != ""){

                            echo '<td><img src="'.$value["fotoArticulo"].'" class="img-thumbnail" width="40px"></td>';

                          }else{

                            echo '<td><img src="views/assets/img/box.png" class="img-thumbnail" width="40px"></td>';

                          }

                          echo '<td>'.$value["precioArticulo"].'</td>';

                          echo '<td>'.$value["precioDescuento"].'</td>';

                          echo '<td>
                              <div class="btn-group">
                                  
                                <button class="btn btn-warning btnEditArticulo" idArticulo="'.$value["idArticulo"].'" data-toggle="modal" data-dismiss="modal" data-target="#modalEditArticulo"><i class="fas fa-pencil-alt"></i></button>

                                <button class="btn btn-danger btnDeleteArticulo" idArticulo="'.$value["idArticulo"].'"><i class="fa fa-times"></i></button>

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

        <!-- MODAL ADD ARTICULOS -->
        <div class="modal fade" id="modalAddArticulos">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Agregar Articulos</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white;">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form id="formAddAdmin" role="form" method="post" enctype="multipart/form-data" autocomplete="off">

            <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Nombre Articulo</label>
                        <input type="text" class="form-control" placeholder="Nombre Articulo ..." id="nombreArticuloA" name="nombreArticuloA" required>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Precio Articulo</label>
                        <input type="number" step="0.01" class="form-control" placeholder="Precio Articulo ..." id="precioArticuloA" name="precioArticuloA" required>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                   <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Precio Descuento</label>
                        <input type="number" step="0.01" class="form-control" placeholder="Precio Descuento ..." id="precioDescuentoA" name="precioDescuentoA" required>
                      </div>
                    </div>
                   

                    <div class="col-sm-6">
                  <div class="form-group">
                  <label>Foto Articulo</label>
                    <!-- <label for="customFile">Custom File</label> -->

                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="fotoArticuloA" name="fotoArticuloA">
                      <label class="custom-file-label" for="fotoArticuloA">Escoge una Foto</label>
                      <p class="help-block">Peso máximo de la foto 2MB</p>
                      <img src="views/assets/img/box.png" class="img-thumbnail previsualizar" width="100px">
                      <button type="button" id="quitarPic" name="quitarPic"
                      class="btn btn-danger btn-sm" style="visibility:hidden;">quitar</button>
                      
                    </div>
                  </div>
                </div>
                  </div>
                
  </div>


            <br>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary" id="saveArticulo" name="saveArticulo">Guardar Articulo</button>
            </div>
            <?php

            $crearArticulo = new ControladorArticulos();
            $crearArticulo -> ctrCrearArticulo();

            ?>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      
      <!-- MODAL ADD ARTICULOS -->

       <!-- MODAL EDIT ARTICULO -->
       <div class="modal fade" id="modalEditArticulo">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Editar Articulo</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form role="form" method="post" enctype="multipart/form-data" autocomplete="off">

            <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Nombre Articulo</label>
                        <input type="text" class="form-control" placeholder="Nombre Articulo ..." id="nombreArticuloE" name="nombreArticuloE" required>
                        <input type="hidden" id="idEditArticulo" name="idEditArticulo">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Precio Articulo</label>
                        <input type="number" step="0.01"  class="form-control" placeholder="Precio Articulo ..." id="precioArticuloE" name="precioArticuloE" required>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                   <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Precio Descuento</label>
                        <input type="number" step="0.01"  class="form-control" placeholder="Precio Descuento ..." id="precioDescuentoE" name="precioDescuentoE" required>
                      </div>
                    </div>
                   

                    <div class="col-sm-6">
                  <div class="form-group">
                  <label>Foto Articulo</label>
                    <!-- <label for="customFile">Custom File</label> -->

                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="fotoArticuloE" name="fotoArticuloE">
                      <input type="hidden" id="fotoE" name="fotoE">
                      <label class="custom-file-label" for="fotoArticuloE">Escoge una Foto</label>
                      <p class="help-block">Peso máximo de la foto 2MB</p>
                      <img src="views/assets/img/box.png" class="img-thumbnail previsualizarEdit" width="100px">
                      <button type="button" id="editQPic" name="editQPic"
                      class="btn btn-danger btn-sm" style="visibility:hidden;">quitar</button>
                      
                    </div>
                  </div>
                </div>
                  </div>
                
            </div>
            <br>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary" id="editSaveArticulo" name="editSaveArticulo">Guardar Cambios</button>
            </div>
            <?php

            $editarArticulo = new ControladorArticulos();
            $editarArticulo -> ctrEditarArticulo();

            ?>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- MODAL EDIT ARTICULO -->

      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->