<x-app-layout>
    {{-- SweetAlert2 CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Roles</h5>
            @can('manage roles')
            <a href="{{ route('admin.roles.create') }}" class="btn btn-primary">
                <i class="icon-base ti tabler-plus icon-sm"></i> Create Role
            </a>
            @endcan
        </div>
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

        <div class="table-responsive text-nowrap">
            <div class="card-body">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>Permissions</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach($roles as $role)
                        <tr>
                            <td></td>
                            <td>{{ $role->name }}</td>
                            <td>
                                @foreach($role->permissions as $permission)
                                <span class="badge bg-primary">{{ $permission->name }}</span>
                                @endforeach
                            </td>
                           <td>
    <a href="{{ route('admin.role-permissions.index', $role) }}" class="btn btn-sm btn-info">Permissions</a>

    @can('manage roles')

        {{-- Only show Edit button if not admin --}}
        @if(strtolower($role->name) !== 'admin')
            <a href="{{ route('admin.roles.edit', $role) }}" class="btn btn-sm btn-warning">Edit</a>

            {{-- Delete button --}}
            <form action="{{ route('admin.roles.destroy', $role) }}" method="POST" class="d-inline delete-form">
                @csrf
                @method('DELETE')
                <button type="button" class="btn btn-sm btn-danger delete-btn">Delete</button>
            </form>
        @else
            {{-- Show disabled Edit/Delete buttons for admin --}}
            <button type="button" class="btn btn-sm btn-secondary" onclick="Swal.fire('Protected!', 'The admin role cannot be edited.', 'info')">Edit</button>
            <button type="button" class="btn btn-sm btn-secondary" onclick="Swal.fire('Protected!', 'The admin role cannot be deleted.', 'info')">Delete</button>
        @endif

    @endcan
</td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- SweetAlert delete logic --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const deleteButtons = document.querySelectorAll('.delete-btn');

            deleteButtons.forEach(function (button) {
                button.addEventListener('click', function () {
                    const form = this.closest('.delete-form');

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
</x-app-layout>
