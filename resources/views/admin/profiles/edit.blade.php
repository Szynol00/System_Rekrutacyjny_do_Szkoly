@include('shared.header')

<body>
    @include('shared.nav')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header topHeader">
                        Edytuj profil klasy
                    </div>
                    <div class="card-body">
                        <form id="profiles_form" action="{{ route('admin.profiles.update', $profile->id) }}"
                            method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="name">Nazwa</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ $profile->name }}" required>
                                <span id="name_error" class="form-text text-danger"></span>
                            </div>

                            <div class="form-group">
                                <label for="description">Opis</label>
                                <textarea class="form-control form-control" id="description" name="description" rows="5" required>{{ $profile->description }}</textarea>
                                <span id="description_error" class="form-text text-danger"></span>
                            </div>

                            <div class="form-group">
                                <label for="mathematics_multiplier">Mnożnik punktów z matematyki</label>
                                <input type="text" class="form-control" id="mathematics_multiplier"
                                    name="mathematics_multiplier" value="{{ $profile->mathematics_multiplier }}"
                                    required>
                                <span id="mathematics_multiplier_error" class="form-text text-danger"></span>
                            </div>

                            <div class="form-group">
                                <label for="polish_multiplier">Mnożnik punktów z polskiego</label>
                                <input type="text" class="form-control" id="polish_multiplier"
                                    name="polish_multiplier" value="{{ $profile->polish_multiplier }}" required>
                                <span id="polish_multiplier_error" class="form-text text-danger"></span>
                            </div>

                            <div class="form-group">
                                <label for="english_multiplier">Mnożnik punktów z angielskiego</label>
                                <input type="text" class="form-control" id="english_multiplier"
                                    name="english_multiplier" value="{{ $profile->english_multiplier }}" required>
                                <span id="english_multiplier_error" class="form-text text-danger"></span>
                            </div>

                            <div class="form-group">
                                <label for="start_date">Początek</label>
                                <input type="datetime-local" class="form-control" id="start_date" name="start_date"
                                    value="{{ $profile->start_date }}" required>
                                <span id="start_date_error" class="form-text text-danger"></span>
                            </div>

                            <div class="form-group">
                                <label for="end_date">Koniec</label>
                                <input type="datetime-local" class="form-control" id="end_date" name="end_date"
                                    value="{{ $profile->end_date }}" required>
                                <span id="end_date_error" class="form-text text-danger"></span>
                            </div>

                            <div class="form-group">
                                <label for="places">Miejsca</label>
                                <input type="text" class="form-control" id="places" name="places"
                                    value="{{ $profile->places }}" required>
                                <span id="places_error" class="form-text text-danger"></span>
                            </div>

                            <div class="btn-group">
                                <button type="submit" class="btn btn-primary mt-3 mb-3 mr-2 custom-btn">Zaktualizuj
                                    profil klasy</button>
                                <a href="{{ route('admin.profiles.index') }}"
                                    class="btn btn-secondary mt-3 mb-3">Anuluj</a>
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
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('shared.footer')
</body>

<script>
    document.getElementById('profiles_form').addEventListener('submit', function(event) {
        var nameInput = document.getElementById('name');
        var nameError = document.getElementById('name_error');

        if (!nameInput.value.match(/^[a-zA-ZąćęłńóśźżĄĆĘŁŃÓŚŹŻ\s+]+$/)) {
            nameError.textContent = 'Podaj poprawną nazwę.';
            event.preventDefault();
        } else {
            nameError.textContent = '';
        }

        var descriptionInput = document.getElementById('description');
        var descriptionError = document.getElementById('description_error');

        if (descriptionInput.value.trim() === '') {
            descriptionError.textContent = 'Podaj opis.';
            event.preventDefault();
        } else {
            descriptionError.textContent = '';
        }


        var mathematicsMultiplierInput = document.getElementById('mathematics_multiplier');
        var mathematicsMultiplierError = document.getElementById('mathematics_multiplier_error');
        var mathematicsMultiplier = parseInt(mathematicsMultiplierInput.value);

        if (isNaN(mathematicsMultiplier) || mathematicsMultiplier < 0 || mathematicsMultiplier > 10) {
            mathematicsMultiplierError.textContent = 'Podaj poprawny mnożnik punktów z matematyki (0-10).';
            event.preventDefault();
        } else {
            mathematicsMultiplierError.textContent = '';
        }

        var polishMultiplierInput = document.getElementById('polish_multiplier');
        var polishMultiplierError = document.getElementById('polish_multiplier_error');
        var polishMultiplier = parseInt(polishMultiplierInput.value);

        if (isNaN(polishMultiplier) || polishMultiplier < 0 || polishMultiplier > 10) {
            polishMultiplierError.textContent = 'Podaj poprawny mnożnik punktów z polskiego (0-10).';
            event.preventDefault();
        } else {
            polishMultiplierError.textContent = '';
        }

        var englishMultiplierInput = document.getElementById('english_multiplier');
        var englishMultiplierError = document.getElementById('english_multiplier_error');
        var englishMultiplier = parseInt(englishMultiplierInput.value);

        if (isNaN(englishMultiplier) || englishMultiplier < 0 || englishMultiplier > 10) {
            englishMultiplierError.textContent = 'Podaj poprawny mnożnik punktów z angielskiego (0-10).';
            event.preventDefault();
        } else {
            englishMultiplierError.textContent = '';
        }

    });
</script>
