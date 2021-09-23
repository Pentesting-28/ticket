<!-- Modal -->
<div wire:ignore.self class="modal fade bd-example-modal-lg" id="createModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xs" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cliente | Agregar Clientes</h5>
                {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button> --}}
            </div>
           <div class="modal-body">
                <form>
                    <div class="col-md-12">
                      <label for="validationCustom01">Nombre</label>
                      <input wire:model="name" type="text" name="name" class="form-control" id="validationCustom01" required placeholder="Nombre del cliente">
                      @error('name') <span class="error text-danger">{{ $message }}</span>@enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="close()"class="btn btn-sm btn-secondary" data-dismiss="modal">Volver</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-sm btn-secondary" data-dismiss="modal" style="background: #6c63ff">Aceptar</button>
            </div>
        </div>
    </div>
</div>
