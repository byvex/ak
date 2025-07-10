<x-app-layout>
@if(isset($role))
<form action="{{ route('admin.roles.update', $role) }}" method="POST">
    @method('PUT')
@else
<form action="{{ route('admin.roles.store') }}" method="POST">
@endif
    @csrf
    <div class="card">
        <div class="card-header">
            <h5>{{ isset($role) ? 'Edit' : 'Create' }} Role</h5>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label for="name" class="form-label">Role Name</label>
                <input type="text" class="form-control" id="name" name="name" 
                       value="{{ old('name', $role->name ?? '') }}" required>
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="card-footer text-end">
            <button type="submit" class="btn btn-primary">
                {{ isset($role) ? 'Update' : 'Save' }}
            </button>
        </div>
    </div>
</form>
</x-app-layout>