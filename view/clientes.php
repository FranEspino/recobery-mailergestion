<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0 d-flex justify-content-between">
              <h6>Usuarios </h6>
              <button type="button" class="btn btn-primary btn-sm"
              type="button"  data-bs-toggle="modal" data-bs-target="#exampleModal" 
              data-bs-whatever="@mdo">Agregar</button>
            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nuevo usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form method="post" id="cliente-form"  enctype="multipart/form-data">
                      <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Nombres:</label>
                        <input name="name_user" type="text" class="form-control" placeholder="Ingrese el nombre del usuario" >
                      </div>
                      <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Correo:</label>
                        <input name="email_user" type="text" class="form-control" placeholder="Ingrese el correo del usuario" >
                      </div>
                      <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Categoria:</label>
                        <input name="categoria" type="text" class="form-control" placeholder="Ingrese la categoria del usuario" >
                      </div>
                      <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Telefono:</label>
                        <input name="phone_user" type="number" class="form-control" placeholder="Ingrese el telefono del usuario" >
                      </div>
                      <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <input  type="submit" name="send_cliente" class="btn btn-primary" value="Registrar">
                    </div>
                          <div id="error-form" class="d-none alert hide alert-danger text-light fw-bold" role="alert">
                         </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>

            <div class="modal fade" id="editDriver" tabindex="-1" aria-labelledby="editDriverLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="editDriverLabel">Editar cliente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form method="post" id="cliente-form"  enctype="multipart/form-data">
                      <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Nombres:</label>
                        <input id="name_user" name="name_user"   type="text" class="form-control" placeholder="Ingrese el nombre del usuario" >
                      </div>
                      <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Correo:</label>
                        <input name="email_user" type="text" class="form-control" placeholder="Ingrese el correo del usuario" >
                      </div>
                      <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Categoria:</label>
                        <input name="categoria" type="text" class="form-control" placeholder="Ingrese la categoria del usuario" >
                      </div>
                      <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Telefono:</label>
                        <input name="phone_user" type="number" class="form-control" placeholder="Ingrese el telefono del usuario" >
                      </div>
                      <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <input  type="submit" name="send_cliente" class="btn btn-primary" value="Registrar">
                    </div>
                          <div id="error-form" class="d-none alert hide alert-danger text-light fw-bold" role="alert">
                         </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nombre completo</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Correo</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Categoria</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Telefono</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Accion</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody id="clients">
                  
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>