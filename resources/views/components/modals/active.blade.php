<div class="modal fade modal-lg" id="modalActiveUser" tabindex="-1" aria-labelledby="modalActiveUser" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="title"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="activeUserForm">
                <div class="modal-body px-5">
                        <div class="row px-4 py-3 d-inline-flex">
                            <div class="col-4 d-flex align-items-center">
                                <input type="text" id="dniUser" class="form-control" readonly name="dniUser">
                                <input type="text" id="status" class="d-none" name="status">
                            </div>
                            <div class="col-8">
                                <h5 class="text-center" id="messages"></h5>
                                <p class="text-center" id="resumen"></p>
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