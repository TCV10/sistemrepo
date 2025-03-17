<script>
    document.addEventListener("DOMContentLoaded", function() {
        const roleSelect = document.getElementById("role");
        const levelInput = document.getElementById("level");

        function updateLevel() {
            if (roleSelect.value === "admin") {
                levelInput.value = 1;
            } else if (roleSelect.value === "mahasiswa") {
                levelInput.value = 2;
            } else {
                levelInput.value = "";
            }
        }

        roleSelect.addEventListener("change", updateLevel);

        // Set default saat halaman dimuat
        updateLevel();
    });
</script>
<x-admin>
    @section('title', 'Edit User')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit User</h3>
            <div class="card-tools"><a href="{{ route('admin.user.index') }}" class="btn btn-sm btn-dark">Back</a></div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.user.update', $user) }}" method="POST">
                @method('PUT')
                @csrf
                <input type="hidden" name="id" value="{{ $user->id }}">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="name" class="form-label">Name:*</label>
                            <input type="text" class="form-control" name="name" required
                                value="{{ $user->name }}">
                            <x-error>name</x-error>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="Email" class="form-label">Email:*</label>
                            <input type="email" class="form-control" name="email" required
                                value="{{ $user->email }}">
                            <x-error>email</x-error>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="level" class="form-label">Level</label>
                            <input type="number" class=" form-control" name="level" id="level" required
                                value="{{ $user->level }}" readonly>
                            <x-error field="level" />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="username" class="form-label">Username:*</label>
                            <input type="text" class="form-control" name="username" required
                                value="{{ $user->username }}">
                            <x-error field="username" />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="password" class="form-label">Password:*</label>
                            <input type="password" class="form-control" name="password">
                            <x-error field="password" />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="role" class="form-label">Role:*</label>
                            <select name="role" id="role" class="form-control" required>
                                <option value="" selected disabled>selecte the role</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}"
                                        {{ $user->roles->first()->name === $role->name ? 'selected' : '' }}>
                                        {{ $role->name }}
                                        {{-- {{ $user->roles[0]['name'] === $role->name ? 'selected' : '' }}>
                                        {{ $role->name }}</option> --}}
                                @endforeach
                            </select>
                            <x-error>role</x-error>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="float-right">
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-admin>
