<!-- Modal -->
<div wire:ignore.self class="modal fade" id="addPermissionModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPermission ModalLabel">Add New Permission </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="nameAdd">Name</label>
                        <input type="text" class="form-control" id="nameAdd" placeholder="Enter Permission  Name" wire:model="name">
                        @error('name') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="isBulk" wire:model="isBulk">
                        <label class="form-check-label" for="exampleCheck1">Add Index, Create, View, Edit, Delete</label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store()" data-dismiss="modal" class="btn btn-primary close-modal">Add Permission</button>
            </div>
        </div>
    </div>
</div>
