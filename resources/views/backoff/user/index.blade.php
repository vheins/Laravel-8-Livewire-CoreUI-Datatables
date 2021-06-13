<div>
    @can('user-create')
        <button type="button" class="px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700" data-toggle="modal" data-target="#addUserModal">
            <i class="mr-2 fas fa-user-edit btn-icon"></i>Add User
        </button>
    @endcan
    @include('backoff.user.create')
    @include('backoff.user.view')
    <livewire:tables.users key='{{ now() }}'>

</div>

@push('js')
<script type="text/javascript">
    window.livewire.on('userStore', () => {
        $('#addUserModal').modal('hide');
    });
</script>
@endpush
