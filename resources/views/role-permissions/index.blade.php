<x-app-layout>
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Manage Permissions for Role: <strong>{{ $role->name }}</strong></h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.role-permissions.store', $role) }}" method="POST">
                @csrf
                <div class="row">
                    @foreach($permissions as $permission)
                        <div class="col-md-3 mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox"
                                       name="permissions[]" value="{{ $permission->id }}"
                                       id="perm_{{ $permission->id }}"
                                       {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }}>
                                <label class="form-check-label" for="perm_{{ $permission->id }}">
                                    {{ $permission->name }}
                                </label>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-4 d-flex justify-content-start gap-2">
                    <button type="submit" class="btn btn-primary">Update Permissions</button>
                    <a href="{{ route('admin.roles.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
