<div class="modal fade modal-lg" id="modalCreateOrder" tabindex="-1" aria-labelledby="modalCreateOrder" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Ingrese Orden de Pago</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="datesAddNewOrder">
                <div class="modal-body">
                        <div class="modal-body">
                            <div class="row">
                                    <div class="col-md-12 col-sm-6">
                                      
                                            <div class="card ">
                                                <div class="card-body ">
                                                    <div class="row py-3">
                                                        <div class="col-md-5">
                                                            <div class="form-group">
                                                                <label>Periodo (Desabilitado)</label>
                                                                <input type="text" class="form-control" readonly placeholder="Año" id="period" name="year">
                                                                <input type="text" class="d-none" id="idPeriod" name="period">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <div class="form-group">
                                                                <label>Dni</label>
                                                                <input type="text" class="form-control" placeholder="Numero DNI" name="dni" id="dni" >
                                                            </div>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Buscar</label>
                                                                <button type="button" class="btn btn-warning" id="btnDni"><i class="fa fa-search"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row py-3">
                                                        <div class="col-md-4 pr-1">
                                                            <div class="form-group">
                                                                <label>Nombres</label>
                                                                <input type="text" class="form-control" placeholder="Nombres" name="name" readonly="" id="name" >
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 pl-1">
                                                            <div class="form-group">
                                                                <label>Apellidos</label>
                                                                <input type="text" class="form-control" placeholder="Apellidos" name="lastname" readonly="" id="lastname" >
                                                            </div>
                                                        </div>
                                                         <div class="col-md-4 pr-1">
                                                            <div class="form-group">
                                                                <label>Concepto de Pago</label>
                                                                <select name="rate" id="rate" class="form-control rate" ></select>
                                                            </div>
                                                        </div>
                                                    </div>
                                
                                                    <div class="row py-3">
                                                        <div class="col-12">
                                                                <label for="description">Descripcion</label>
                                                                <textarea name="description" id="description" class="form-control"></textarea>  
                                                        </div>
                                                    </div>                                               
                                                </div>
                                            </div>
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