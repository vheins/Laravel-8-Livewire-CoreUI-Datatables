<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="mr-2 fas fa-menu-edit"></i><b>Menu Info {{ $text }}</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <input type="hidden" wire:model="user_id">
                        <label for="nameView">Name</label>
                        <input type="text" class="form-control" wire:model.defer="name" id="nameView" {{ $updateMode ? "" : "readonly" }} >
                        @error('name') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="emailView">Email address</label>
                        <input type="email" class="form-control" wire:model.defer="email" id="emailView" {{ $updateMode ? "" : "readonly" }} >
                        @error('email') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Close</button>
                @if($updateMode)
                    <button type="button" wire:click.prevent="update()" data-dismiss="modal" class="btn btn-primary close-modal">Save changes</button>
                @endif
            </div>
        </div>
    </div>
</div>
