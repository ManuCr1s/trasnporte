<div class="modal fade modal-lg" id="editRateModal" tabindex="-1" aria-labelledby="editRateModal" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Editar Taza de Pago</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="sendUpdateDatesRate">
                <div class="modal-body px-5">
                        <div class="row px-4 py-1 d-flex justify-content-around">
                            <div class="col-2">
                                <label for="">Numero</label>
                                <input type="text" id="idEdit" class="form-control"  name="id" readonly>
                            </div>
                            <div class="col-5">
                                <label for="">Nombre Taza</label>
                                <input type="text" id="nameEdit" class="form-control"  name="name">
                            </div>
                            <div class="col-5">
                                <label for="">Monto de Taza</label>
                                <input type="text" id="amountEdit" class="form-control"  name="amount">
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