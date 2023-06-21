@include('shared.header')

<body>
    @include('shared.nav')

    {{-- <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Dodaj użytkownika</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="first_name" class="form-label">Imię:</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="last_name" class="form-label">Nazwisko:</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Hasło:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="photo" class="form-label">Zdjęcie:</label>
                        <input type="file" class="form-control" id="photo" name="photo">
                    </div>
                    <div class="mb-3">
                        <label for="role_id" class="form-label">Rola:</label>
                        <select class="form-control" id="role_id" name="role_id" required>
                            <option value="2">Użytkownik</option>
                            <option value="1">Administrator</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Dodaj</button>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Anuluj</a>
                </form>
            </div>
        </div>
    </div> --}}

    @include('shared.footer')
</body>
