@include('shared.header')

<body>
    @include('shared.nav')

    <div class="container custom-container">
        <div class="row">
            <form action="{{ route('admin.recruitment.refresh') }}" method="POST"
                class="d-flex justify-content-center align-items-center">
                @csrf
                <button type="submit" class="btn btn-primary custom-btn">
                    <i class="bi bi-arrow-clockwise"></i> Odśwież rekrutację
                </button>
            </form>

            <div class="col-md-12">
                <h1>Lista aplikacji</h1>

                @foreach ($applicationsByProfile as $profileName => $applications)
                    <div class="card mt-4">
                        <div class="card-header topHeader">{{ $profileName }}</div>
                        <div class="card-body">
                            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 mt-3">
                                @foreach ($applications as $application)
                                    <div class="col mb-4">
                                        <div class="card">
                                            <div class="card-body">
                                                @if ($application->candidate->user->photo)
                                                    <img src="{{ asset('storage/' . $application->candidate->user->photo) }}"
                                                        class="card-img-top" alt="User Photo">
                                                @else
                                                    <img src="{{ asset('img/anonim.jpg') }}" class="card-img-top"
                                                        alt="User Photo">
                                                @endif

                                                <p class="card-text">ID: {{ $application->id }}</p>
                                                <p class="card-text">Data złożenia: {{ $application->submitted_at }}</p>
                                                <p class="card-text">
                                                    Status kwalifikacji:
                                                    @if ($application->is_qualified)
                                                        <i class="bi bi-check2-circle text-success"></i> Zakwalifikowano
                                                    @else
                                                        <i class="bi bi-x-circle text-danger"></i> Nie zakwalifikowano
                                                    @endif
                                                </p>

                                                <p class="card-text">
                                                    Status zdjęcia:
                                                    @if ($application->is_photo_valid)
                                                        <i class="bi bi-check2-circle text-success"></i> Zdjęcie ważne
                                                    @else
                                                        <i class="bi bi-x-circle text-danger"></i> Zdjęcie nieważne
                                                    @endif
                                                </p>

                                                <p class="card-text">
                                                    Status płatności:
                                                    @if ($application->payment_status)
                                                        <i class="bi bi-check2-circle text-success"></i> Zaksięgowano
                                                    @else
                                                        <i class="bi bi-x-circle text-danger"></i> Nie zaksięgowno
                                                    @endif
                                                </p>

                                                <p class="card-text">Punkty: {{ $application->score }}</p>

                                            </div>
                                            <div class="card-footer">
                                                <div class="btn-group" role="group" aria-label="Application Actions">
                                                    <a href="{{ route('admin.applications.show', $application->id) }}"
                                                        class="btn btn-primary custom-btn">Pokaż</a>
                                                    <a href="{{ route('admin.applications.edit', $application->id) }}"
                                                        class="btn btn-primary">Edytuj</a>
                                                    <a href="{{ route('admin.applications.destroy', $application->id) }}"
                                                        class="btn btn-danger"
                                                        onclick="event.preventDefault();
                                            if (confirm('Czy na pewno chcesz usunąć tę aplikację?')) {
                                                document.getElementById('delete-application-form-{{ $application->id }}').submit();
                                            }">
                                                        Usuń
                                                    </a>
                                                    <form id="delete-application-form-{{ $application->id }}"
                                                        action="{{ route('admin.applications.destroy', $application->id) }}"
                                                        method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </div>

    @include('shared.footer')
</body>
