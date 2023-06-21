@include('shared.header')

<body>
    @include('shared.nav')

    <div class="container custom-container">
        <div class="row">
            <div class="col-md-12">
                <h1>Szczegóły aplikacji</h1>

                <div class="card mt-4">
                    <div class="card-header topHeader">
                        <h3>Informacje o aplikacji</h3>
                    </div>
                    <div class="card-body">
                        <p><strong>ID:</strong> {{ $application->id }}</p>
                        <p><strong>Data złożenia:</strong> {{ $application->submitted_at }}</p>
                        <p>
                            <strong>Status kwalifikacji: </strong>
                            @if ($application->is_qualified)
                                <i class="bi bi-check2-circle text-success"></i> Zakwalifikowano
                            @else
                                <i class="bi bi-x-circle text-danger"></i> Nie zakwalifikowano
                            @endif
                        </p>
                        <p>
                            <strong>Status zdjęcia: </strong>
                            @if ($application->is_photo_valid)
                                <i class="bi bi-check2-circle text-success"></i> Zdjęcie ważne
                            @else
                                <i class="bi bi-x-circle text-danger"></i> Zdjęcie nieważne
                            @endif
                        </p>
                        <p>
                            <strong>Status płatności: </strong>
                            @if ($application->payment_status)
                                <i class="bi bi-check2-circle text-success"></i> Zaksięgowano
                            @else
                                <i class="bi bi-x-circle text-danger"></i> Nie zaksięgowano
                            @endif
                        </p>
                        <p><strong>Punkty:</strong> {{ $application->score }}</p>

                        <hr>

                        <h3>Informacje o kandydacie</h3>
                        @if ($application->candidate->user->photo)
                            <img src="{{ asset('storage/' . $application->candidate->user->photo) }}"
                                style="width: 300px; height: 400px;" class="card-img-top" alt="User Photo">
                        @else
                            <img src="{{ asset('img/anonim.jpg') }}" class="card-img-top" alt="User Photo ">
                        @endif
                        <p><strong>Imię:</strong> {{ $application->candidate->user->first_name }}</p>
                        <p><strong>Nazwisko:</strong> {{ $application->candidate->user->last_name }}</p>
                        <p><strong>Email:</strong> {{ $application->candidate->user->email }}</p>


                        <div class="mt-4">
                            <a href="{{ route('admin.applications.index') }}" class="btn btn-secondary">Powrót</a>
                            <a href="{{ route('admin.applications.edit', $application->id) }}"
                                class="btn btn-primary">Edytuj</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('shared.footer')
</body>
