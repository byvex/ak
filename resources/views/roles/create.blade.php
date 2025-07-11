<x-app-layout>
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Create New Role</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.roles.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Role Name</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autofocus>
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Create</button>
                <a href="{{ route('admin.roles.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</x-app-layout>
