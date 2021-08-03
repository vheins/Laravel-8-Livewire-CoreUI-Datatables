<!-- Modal -->
<div wire:ignore.self class="modal fade" id="addMenuModal" tabindex="-1" role="dialog" aria-labelledby="addMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addMenuModalLabel"><b>Add New Menu</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="nameAdd"><b>Permission</b></label>
                        {{--<input type="text" class="form-control" id="canAdd" placeholder="Enter can" wire:model.defer="can">--}}

                        <livewire:component.select-permission
                            name="can"
                            placeholder="Select Permission"
                            :searchable="true"
                            wire:model.defer="can"
                        />
                    </div>

                    <div class="form-group">
                        <label for="nameAdd"><b>Parent Menu</b></label>
                        <select class="custom-select"  wire:model.defer="parent_id">
                            <option selected>Select Parent Menu</option>
                            @foreach ($selectMenu as $menu)
                                <option value="{{$menu->id}}">
                                    {{$menu->text}}
                                    @if(is_null($menu->url) && is_null($menu->route))
                                    @else
                                        @if($menu->is_route == 1 )
                                            #Route({{$menu->route}})
                                        @else
                                            #Link({{$menu->url}})
                                        @endif
                                    @endif
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nameAdd"><b>Text</b></label>
                            <input type="text" class="form-control" id="textAdd" placeholder="Enter text" wire:model.defer="text">
                            <div class="mb-2 form-check">
                                <input type="checkbox" class="form-check-input" id="is_sectionAdd" placeholder="Enter is_section" wire:model.defer="is_section"> Is Section
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="nameAdd"><b>Route/Url</b></label>
                            <input type="text" class="form-control" id="urlAdd" placeholder="Enter url" wire:model.defer="url">
                            <div class="mb-2 form-check">
                                <input type="checkbox" class="form-check-input" id="is_routeAdd" placeholder="Enter is_route" wire:model.defer="is_route"> Is Route
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nameAdd"><b>Target</b></label>
                        <select class="custom-select" wire:model.defer="target">
                            <option selected>Select Link Target</option>
                            <option value="_blank">Blank</option>
                            <option value="_self">Self</option>
                            <option value="_parent">Parent</option>
                            <option value="_top">Top</option>
                        </select>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nameAdd"><b>Font Awesome Family</b></label>
                            <input type="text" class="form-control" id="fa_familyAdd" placeholder="Enter fa_family" wire:model.defer="fa_family">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="nameAdd"><b>Icon</b></label>
                            <input type="text" class="form-control" id="iconAdd" placeholder="Enter icon" wire:model.defer="icon">
                        </div>
                    </div>

                    <label><b>Badge</b></label>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="nameAdd">Text</label>
                            <input type="text" class="form-control" id="badge_textAdd" placeholder="Enter badge_text" wire:model.defer="badge_text">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="nameAdd">Context</label>
                            <input type="text" class="form-control" id="badge_contextAdd" placeholder="Enter badge_context" wire:model.defer="badge_context">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="nameAdd">Pill</label>
                            <input type="text" class="form-control" id="badge_pillAdd" placeholder="Enter badge_pill" wire:model.defer="badge_pill">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nameAdd"><b>sec_no</b></label>
                        <input type="text" class="form-control" id="sec_noAdd" placeholder="Enter sec_no" wire:model.defer="sec_no">
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store()" data-dismiss="modal" class="btn btn-primary close-modal">Save changes</button>
            </div>
        </div>
    </div>
</div>
