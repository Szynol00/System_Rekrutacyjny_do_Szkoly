@include('shared.header')

<body>

    @include('shared.nav')

    <div class="container custom-container">
        <div class="row">
            <div class="col-md-4">
                <a href="{{ route('admin.users.index') }}" class="text-decoration-none">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">
                            <h5 class="card-title"><i class="bi bi-people"></i> Użytkownicy</h5>
                            <p class="card-text">Zarządzaj użytkownikami</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-4">
                <a href="{{ route('admin.profiles.index') }}" class="text-decoration-none">
                    <div class="card bg-secondary text-white mb-4">
                        <div class="card-body">
                            <h5 class="card-title"><i class="bi bi-back"></i> Profile klas</h5>
                            <p class="card-text">Zarządzaj profilami</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-4">
                <a href="{{ route('admin.applications.index') }}" class="text-decoration-none">
                    <div class="card bg-info text-white mb-4">
                        <div class="card-body">
                            <h5 class="card-title"><i class="bi bi-clipboard-check"></i> Rekrutacja</h5>
                            <p class="card-text">Zarządzaj rekrutacją</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    @include('shared.footer')

</body>
