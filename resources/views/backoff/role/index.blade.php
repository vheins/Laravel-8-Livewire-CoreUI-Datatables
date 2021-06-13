<div>
    @can('role-create')
        <button type="button" class="px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700" data-toggle="modal" data-target="#addRoleModal">
            <i class="mr-2 fas fa-user-shield btn-icon"></i>Add Roles
        </button>
    @endcan
    @include('backoff.role.create')
    @include('backoff.role.view')
    <livewire:tables.roles key='{{ now() }}'>

</div>

@push('js')
<script type="text/javascript">
    window.livewire.on('roleStore', () => {
        $('#addRoleModal').modal('hide');
    });
</script>
@endpush

@push('scripts')
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
        @this.on('triggerDelete', roleId => {
            Swal.fire({
                title: 'Are You Sure?',
                text: 'Conatct record will be deleted!',
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#aaa',
                confirmButtonText: 'Delete!'
            }).then((result) => {
         //if user clicks on delete
                if (result.value) {
             // calling destroy method to delete
                    @this.call('destroy',roleId)
             // success response
                    Swal.fire({title: 'Role deleted successfully!', icon: 'success'});
                } else {
                    Swal.fire({
                        title: 'Operation Cancelled!',
                        icon: 'success'
                    });
                }
            });
        });
    })
</script>
@endpush
