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
                        <form action="{{ route('admin.profiles.update', $profile->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="name">Nazwa</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ $profile->name }}">
                            </div>

                            <div class="form-group">
                                <label for="description">Opis</label>
                                <textarea class="form-control form-control" id="description" name="description" rows="5">{{ $profile->description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="mathematics_multiplier">Mnożnik punktów z matematyki</label>
                                <input type="text" class="form-control" id="mathematics_multiplier"
                                    name="mathematics_multiplier" value="{{ $profile->mathematics_multiplier }}">
                            </div>

                            <div class="form-group">
                                <label for="polish_multiplier">Mnożnik punktów z polskiego</label>
                                <input type="text" class="form-control" id="polish_multiplier"
                                    name="polish_multiplier" value="{{ $profile->polish_multiplier }}">
                            </div>

                            <div class="form-group">
                                <label for="english_multiplier">Mnożnik punktów z angielskiego</label>
                                <input type="text" class="form-control" id="english_multiplier"
                                    name="english_multiplier" value="{{ $profile->english_multiplier }}">
                            </div>

                            <div class="form-group">
                                <label for="start_date">Początek</label>
                                <input type="text" class="form-control" id="start_date" name="start_date"
                                    value="{{ $profile->start_date }}">
                            </div>

                            <div class="form-group">
                                <label for="end_date">Koniec</label>
                                <input type="text" class="form-control" id="end_date" name="end_date"
                                    value="{{ $profile->end_date }}">
                            </div>

                            <div class="form-group">
                                <label for="places">Miejsca</label>
                                <input type="text" class="form-control" id="places" name="places"
                                    value="{{ $profile->places }}">
                            </div>

                            <form action="{{ route('admin.profiles.update', $profile->id) }}" method="POST">

                                <div class="btn-group">
                                    <button type="submit" class="btn btn-primary mt-3 mb-3 mr-2 custom-btn">Zaktualizuj
                                        profil
                                        klasy</button>
                                    <a href="{{ route('admin.profiles.index') }}"
                                        class="btn btn-secondary mt-3 mb-3">Anuluj</a>
                                </div>
                            </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('shared.footer')
</body>
