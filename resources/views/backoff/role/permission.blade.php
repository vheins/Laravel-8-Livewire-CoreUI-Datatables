<div wire:ignore.self>
    <table class='tableFixHead'>
        <thead>
            <th scope="col">Name</th>
            <th scope="col">Index</th>
            <th scope="col">Create</th>
            <th scope="col">View</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </thead>
        <tbody>
            @foreach($permissions as $name => $cruds)
                <tr>
                    <td scope="row">{{ ucwords($name) }}</td>
                    @foreach($cruds as $crud)
                        <td>
                            <input type="checkbox" wire:model.defer="permission.{{ $name }}-{{ $crud['crud'] }}" {{ $updateMode ? "" : "disabled" }}>
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
    @error('name') <span class="text-danger">{{ $message }}</span>@enderror
</div>

<style>
.tableFixHead          { overflow: auto; height: 100px; }
.tableFixHead thead th { position: sticky; top: 0; z-index: 1; }

/* Just common table stuff. Really. */
table  { border-collapse: collapse; width: 100%; }
th, td { padding: 8px 16px; }
th     { background:#eee; }
</style>
