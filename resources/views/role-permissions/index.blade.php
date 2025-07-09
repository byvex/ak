<x-app-layout>
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create New Role</div>
<div class="card">
    <div class="card-header">
        <h5>Manage Permissions for Role: {{ $role->name }}</h5>
    </div>
    <form action="{{ route('role-permissions.store', $role) }}" method="POST">
        @csrf
        <div class="card-body">
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
        </div>
        <div class="card-footer text-end">
            <button type="submit" class="btn btn-primary">Update Permissions</button>
        </div>
    </form>
</div>
</div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>