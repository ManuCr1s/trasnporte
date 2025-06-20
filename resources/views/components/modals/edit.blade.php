<div class="modal fade modal-lg" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edtar Usuario</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <form id="editDatesUser">
                <div class="modal-body px-5">
                        <div class="row px-4 py-3">
                            <div class="col-md-4 px-1">
                                <div class="form-group">
                                    <label>Ingrese Dni</label>
                                </div>
                                <div class="form-group d-flex">
                                    <input type="text" class="form-control edit-user" placeholder="Numero DNI" name="dni" id="dniEdit">
                                </div>
                            </div>
                            <div class="col-md-4 px-1">
                                <div class="form-group">
                                    <label>Ingrese Nombre</label>
                                    <input type="text" class="form-control edit-user" placeholder="Ingrese Nombres" name="nombres" id="nombresEdit">
                                </div>
                            </div>
                            <div class="col-md-4 px-1">
                                <div class="form-group">
                                    <label>Ingrese Apellido</label>
                                    <input type="text" class="form-control edit-user" placeholder="Ingrese Apellidos" name="apellidos" id="apellidosEdit">
                                </div>
                            </div>
                        </div>
                        <div class="row px-4 py-3">
                            <div class="col-md-12 px-1">
                                <div class="form-group">
                                    <label for="email" class="form-label">Ingrese Correo Electronico</label>
                                    <input type="email" class="form-control edit-user" name="email" id="emailEdit" placeholder="Ingrese Correo Electronico" required>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerar</button>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </form>
      </div>
    </div>
  </div>
</div>