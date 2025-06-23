<div class="modal fade modal-lg" id="modalAddYear" tabindex="-1" aria-labelledby="modalAddYear" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Crear Periodo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="sendDatesPeriod">
                <div class="modal-body px-5">
                        <div class="row px-4 py-3 d-flex justify-content-around">
                            <div class="col-5">
                                <label for="">Ingrese Año</label>
                                <input type="text" id="year" class="form-control"  name="name" maxlength="4" placeholder="2025,2024,2023">
                            </div>
                            <div class="col-5">
                                <label for="">Ingrese Descriçion</label>
                                <input type="text" id="description" class="form-control"  name="description" placeholder="Periodo 2025, Periodo 2024">
                            </div>
                            
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerar</button>
                    <button type="submit" class="btn btn-primary">Enviar Datos</button>
                </div>
            </form> 
        </div>
    </div>
</div>