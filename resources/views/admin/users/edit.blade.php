@include('shared.header')

<body>
    @include('shared.nav')

    <div class="container">
        <div class="card mt-5 mb-5">
            <div class="card-header topHeader">
                <h5 class="card-title">Edytuj użytkownika</h5>
            </div>
            <div class="card-body">
                <form id="user_form" action="{{ route('admin.users.update', $user->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="photo" class="form-label">Zdjęcie:</label><br />
                                <img src="{{ $user->photo ? asset('storage/' . $user->photo) : asset('img/anonim.jpg') }}"
                                    class="img-fluid" />
                                <input type="file" class="form-control" id="photo" name="photo"
                                    accept="image/*" />
                                <small id="photoError" class="form-text text-danger"></small>
                                <small class="form-text text-primary">Maksymalny rozmiar zdjęcia to 400KB.</small>
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
                                    value="{{ $user->first_name }}" required>
                                <span id="first_name_error" class="text-danger"></span>

                            </div>
                            <div class="mb-3">
                                <label for="last_name" class="form-label">Nazwisko:</label>
                                <input type="text" class="form-control" id="last_name" name="last_name"
                                    value="{{ $user->last_name }}" required>
                                <span id="last_name_error" class="text-danger"></span>

                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ $user->email }}" required>
                                <span id="email_error" class="text-danger"></span>
                            </div>
                            @if ($user->role_id == 2)
                                <div class="exam-info">
                                    <div class="mb-3">
                                        <label for="math_score" class="form-label">Wynik z matematyki:</label>
                                        <input type="text" class="form-control" id="math_score" name="math_score"
                                            value="{{ $user->candidate->mathematics_score }}" required>
                                        <span id="math_score_error" class="text-danger"></span>
                                    </div>
                                    <div class="mb-3">
                                        <label for="polish_score" class="form-label">Wynik z języka polskiego:</label>
                                        <input type="text" class="form-control" id="polish_score" name="polish_score"
                                            value="{{ $user->candidate->polish_score }}" required>
                                        <span id="polish_score_error" class="text-danger"></span>
                                    </div>
                                    <div class="mb-3">
                                        <label for="english_score" class="form-label">Wynik z języka
                                            angielskiego:</label>
                                        <input type="text" class="form-control" id="english_score"
                                            name="english_score" value="{{ $user->candidate->english_score }}" required>
                                        <span id="english_score_error" class="text-danger"></span>
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
    </div>

    @include('shared.footer')
</body>


<script>
    document.getElementById('user_form').addEventListener('submit', function(event) {
        var photoInput = document.getElementById('photo');
        var photoError = document.getElementById('photoError');
        var maxFileSize = 400 * 1024; // 400KB

        var photoInput = document.getElementById('photo');
        var photoError = document.getElementById('photoError');
        var maxFileSize = 400 * 1024; // 400KB

        if (photoInput.files.length > 0) {
            var fileSize = photoInput.files[0].size;

            if (fileSize > maxFileSize) {
                photoError.textContent = 'Zdjęcie przekracza maksymalny rozmiar.';
                event.preventDefault();

            } else {
                photoError.textContent = '';
            }
        } else {
            photoError.textContent = '';
        }

        var firstNameInput = document.getElementById('first_name');
        var firstNameError = document.getElementById('first_name_error');

        if (!firstNameInput.value.match(/^[a-zA-ZąćęłńóśźżĄĆĘŁŃÓŚŹŻ\s+]+$/)) {
            firstNameError.textContent = 'Podaj poprawne imię.';
            event.preventDefault();
        } else {
            firstNameError.textContent = '';
        }

        var lastNameInput = document.getElementById('last_name');
        var lastNameError = document.getElementById('last_name_error');

        if (!lastNameInput.value.match(/^[a-zA-ZąćęłńóśźżĄĆĘŁŃÓŚŹŻ\s+]+$/)) {
            lastNameError.textContent = 'Podaj poprawne nazwisko.';
            event.preventDefault();
        } else {
            lastNameError.textContent = '';
        }

        var emailInput = document.getElementById('email');
        var emailError = document.getElementById('email_error');

        var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (!emailPattern.test(emailInput.value)) {
            emailError.textContent = 'Podaj poprawny adres email.';
            event.preventDefault();
        } else {
            emailError.textContent = '';
        }
        var mathScoreInput = document.getElementById('math_score');
        var mathScoreError = document.getElementById('math_score_error');
        var mathScore = parseInt(mathScoreInput.value);

        if (isNaN(mathScore) || mathScore < 0 || mathScore > 100) {
            mathScoreError.textContent = 'Podaj poprawny wynik z matematyki (0-100).';
            event.preventDefault();
        } else {
            mathScoreError.textContent = '';
        }

        var polishScoreInput = document.getElementById('polish_score');
        var polishScoreError = document.getElementById('polish_score_error');
        var polishScore = parseInt(polishScoreInput.value);

        if (isNaN(polishScore) || polishScore < 0 || polishScore > 100) {
            polishScoreError.textContent = 'Podaj poprawny wynik z polskiego (0-100).';
            event.preventDefault();
        } else {
            polishScoreError.textContent = '';
        }

        var englishScoreInput = document.getElementById('english_score');
        var englishScoreError = document.getElementById('english_score_error');
        var englishScore = parseInt(englishScoreInput.value);

        if (isNaN(englishScore) || englishScore < 0 || englishScore > 100) {
            englishScoreError.textContent = 'Podaj poprawny wynik z angielskiego (0-100).';
            event.preventDefault();
        } else {
            englishScoreError.textContent = '';
        }
    });
</script>
