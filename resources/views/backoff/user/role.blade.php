<div wire:ignore.self>
    <table class='tableFixHead'>
        <thead>
            <th scope="col">Role</th>
            <th scope="col">Status</th>
        </thead>
        <tbody>

            @foreach($role as $key => $value)
                <tr>
                    <td scope="row">{{ ucwords($key) }}</td>
                    <td>
                        <input type="checkbox" wire:model.defer="role.{{ $key }}" {{ $updateMode ? "" : "disabled" }}>
                    </td>
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
