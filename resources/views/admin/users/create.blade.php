<x-app-layout>
    <div class="card mb-6">
        <h5 class="card-header">Create New User</h5>

        <form class="card-body" method="POST" action="{{ route('admin.users.store') }}">
            @csrf
            <div class="row g-4">
                <div class="col-md-6">
                    <label class="form-label" for="name">Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}"
                           class="form-control @error('name') is-invalid @enderror"
                           placeholder="John Doe" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="email">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}"
                               class="form-control @error('email') is-invalid @enderror"
                               placeholder="john.doe@example.com" required>
                    @error('email')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="password">Password</label>
                    <div class="input-group input-group-merge form-password-toggle">
                        <input type="password" id="password" name="password"
                               class="form-control @error('password') is-invalid @enderror"
                               placeholder="••••••••••••" required>
                        <span class="input-group-text cursor-pointer">
                            <i class="icon-base ti tabler-eye-off"></i>
                        </span>
                    </div>
                    @error('password')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="password_confirmation">Confirm Password</label>
                    <div class="input-group input-group-merge form-password-toggle">
                        <input type="password" id="password_confirmation" name="password_confirmation"
                               class="form-control" placeholder="••••••••••••" required>
                        <span class="input-group-text cursor-pointer">
                            <i class="icon-base ti tabler-eye-off"></i>
                        </span>
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="role">Select Role</label>
                    <select id="role" name="role" class="form-select @error('role') is-invalid @enderror" required>
                        <option value="">Choose...</option>
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}" {{ old('role') == $role->id ? 'selected' : '' }}>
                                {{ $role->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('role')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="pt-5">
                <button type="submit" class="btn btn-primary me-3">Create User</button>
                <a href="{{ route('admin.users.index') }}" class="btn btn-label-secondary">Cancel</a>
            </div>
        </form>
    </div>
</x-app-layout>
