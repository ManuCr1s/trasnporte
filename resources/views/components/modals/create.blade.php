<div class="modal fade modal-lg" id="modalCreateUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Ingrese Usuario</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="datesAddNewUser">
                <div class="modal-body px-5">
                        <div class="row px-4 py-3">
                            <div class="col-md-4 px-1">
                                <div class="form-group">
                                    <label>Ingrese Dni</label>
                                </div>
                                <div class="form-group d-flex">
                                    <input type="text" class="form-control" placeholder="Numero DNI" name="dni" id="dni" >
                                    <button type="button" class="btn btn-primary" id="btnDni"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                            <div class="col-md-4 px-1">
                                <div class="form-group">
                                    <label>Ingrese Nombre</label>
                                    <input type="text" class="form-control" placeholder="Ingrese Nombres" name="nombres" id="nombres" readonly required>
                                </div>
                            </div>
                            <div class="col-md-4 px-1">
                                <div class="form-group">
                                    <label>Ingrese Apellido</label>
                                    <input type="text" class="form-control" placeholder="Ingrese Apellidos" name="apellidos" id="apellidos" readonly required>
                                </div>
                            </div>
                        </div>
                        <div class="row px-4 py-3">
                            <div class="col-md-12 px-1">
                                <div class="form-group">
                                    <label for="email" class="form-label">Ingrese Correo Electronico</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Ingrese Correo Electronico" required>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerar</button>
                    <button type="submit" class="btn btn-primary">Guardar Usuario</button>
                </div>
            </form>
        </div>
    </div>
</div>