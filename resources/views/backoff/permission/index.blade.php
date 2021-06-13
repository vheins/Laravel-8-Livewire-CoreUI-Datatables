<div>
    @can('user-create')
        <button type="button" class="px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700" data-toggle="modal" data-target="#addPermissionModal">
            <i class="mr-2 fas fa-user-lock btn-icon"></i>Add Permissions
        </button>
    @endcan
    @include('backoff.permission.create')
    @include('backoff.permission.view')
    <livewire:tables.permissions key='{{ now() }}'>

</div>

@push('js')
<script type="text/javascript">
    window.livewire.on('roleStore', () => {
        $('#addPermissionModal').modal('hide');
    });
</script>
@endpush
