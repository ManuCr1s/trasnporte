<div class="modal fade modal-lg" id="editOrderModal" tabindex="-1" aria-labelledby="editOrderModal" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Editar Taza de Pago</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="sendUpdateDatesOrder">
                <div class="modal-body px-5">
                        <div class="row px-4 py-1">
                            <div class="col-6">
                                <label for="nameEdit">Concepto de Orden</label>
                                <input type="text" name="id" id="idEdit" class="d-none">
                                <select name="rate" id="rateEdit" class="form-control rate" required></select>
                            </div>
                             <div class="col-6">
                                <label for="description">Descripcion Orden</label>
                                <textarea name="description" id="descriptionEdit" class="form-control" required></textarea>
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