<div>
    @can('menu-create')
        <button type="button" class="px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700" data-toggle="modal" data-target="#addMenuModal">
            <i class="mr-2 fas fa-th btn-icon"></i>Add Menu
        </button>
    @endcan
    @include('backoff.menu.create')
    <livewire:tables.menus key='{{ now() }}'>

</div>

@push('js')
<script type="text/javascript">
    window.livewire.on('menuStore', () => {
        $('#addMenuModal').modal('hide');
    });
</script>
@endpush
