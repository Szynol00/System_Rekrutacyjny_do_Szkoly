@include('shared.header')

<body>
    @include('shared.nav')

    <div class="container">
        <div class="card mt-5 mb-5">
            <div class="card-header topHeader">
                <h5 class="card-title">Informacje o użytkowniku</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="photo" class="form-label">Zdjęcie:</label><br />
                            <img src="{{ $user->photo ? asset('storage/' . $user->photo) : asset('img/anonim.jpg') }}"
                                class="img-fluid" />
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="mb-3">
                            <label for="name" class="form-label">Imię:</label>
                            <input type="text" class="form-control" id="name" value="{{ $user->first_name }}"
                                readonly>
                        </div>
                        <div class="mb-3">
                            <label for="last_name" class="form-label">Nazwisko:</label>
                            <input type="text" class="form-control" id="last_name" value="{{ $user->last_name }}"
                                readonly>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="email" value="{{ $user->email }}"
                                readonly>
                        </div>
                        @if ($user->role_id == 2)
                            <div class="mb-3">
                                <label for="index" class="form-label">Indeks:</label>
                                <input type="text" class="form-control" id="index"
                                    value="{{ $user->candidate->candidate_index }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="math_score" class="form-label">Wynik z matematyki:</label>
                                <input type="text" class="form-control" id="math_score"
                                    value="{{ $user->candidate->mathematics_score }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="polish_score" class="form-label">Wynik z języka polskiego:</label>
                                <input type="text" class="form-control" id="polish_score"
                                    value="{{ $user->candidate->polish_score }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="english_score" class="form-label">Wynik z języka angielskiego:</label>
                                <input type="text" class="form-control" id="english_score"
                                    value="{{ $user->candidate->english_score }}" readonly>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('admin.users.index') }}" class="btn btn-secondary custom-btn">Powrót</a>
                <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary">Edytuj</a>
            </div>
        </div>
    </div>

    @include('shared.footer')
</body>
