@include('shared.header')

<body>
    @include('shared.nav')

    <div class="card mt-5 mb-5">
        <div class="card-header topHeader">
            <h5 class="card-title">Edytuj użytkownika</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-2">
                        <div class="mb-3">
                            <label for="photo" class="form-label">Zdjęcie:</label><br />
                            <img
                                src="{{ $user->photo ? asset('storage/' . $user->photo) : asset('img/anonim.jpg') }}" />
                            <input type="file" class="form-control" id="photo" name="photo">
                            <p class="text-primary">Maksymalny rozmiar zdjęcia to 400KB.</p>
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                    </div>
                    <div class="col-md-8">
                        <div class="mb-3">
                            <label for="name" class="form-label">Imię:</label>
                            <input type="text" class="form-control" id="first_name" name="first_name"
                                value="{{ $user->first_name }}">
                        </div>
                        <div class="mb-3">
                            <label for="last_name" class="form-label">Nazwisko:</label>
                            <input type="text" class="form-control" id="last_name" name="last_name"
                                value="{{ $user->last_name }}">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ $user->email }}">
                        </div>
                        @if ($user->role_id == 2)
                            <div class="exam-info">
                                <div class="mb-3">
                                    <label for="math_score" class="form-label">Wynik z matematyki:</label>
                                    <input type="text" class="form-control" id="math_score" name="math_score"
                                        value="{{ $user->candidate->mathematics_score }}">
                                </div>
                                <div class="mb-3">
                                    <label for="polish_score" class="form-label">Wynik z języka polskiego:</label>
                                    <input type="text" class="form-control" id="polish_score" name="polish_score"
                                        value="{{ $user->candidate->polish_score }}">
                                </div>
                                <div class="mb-3">
                                    <label for="english_score" class="form-label">Wynik z języka angielskiego:</label>
                                    <input type="text" class="form-control" id="english_score" name="english_score"
                                        value="{{ $user->candidate->english_score }}">
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary custom-btn">Zapisz</button>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Anuluj</a>
                </div>
            </form>
        </div>
    </div>

    @include('shared.footer')
</body>
