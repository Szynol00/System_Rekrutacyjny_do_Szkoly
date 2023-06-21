@include('shared.header')

<body>
    @include('shared.nav')
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Profile') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.profiles.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Nazwa') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Opis') }}</label>

                                <div class="col-md-6">
                                    <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" required>{{ old('description') }}</textarea>

                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="mathematics_multiplier"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Mnożnik punktów z matematyki') }}</label>

                                <div class="col-md-6">
                                    <input id="mathematics_multiplier" type="number"
                                        class="form-control @error('mathematics_multiplier') is-invalid @enderror"
                                        name="mathematics_multiplier" value="{{ old('mathematics_multiplier') }}"
                                        required>

                                    @error('mathematics_multiplier')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="polish_multiplier"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Mnożnik punktów z polskiego') }}</label>

                                <div class="col-md-6">
                                    <input id="polish_multiplier" type="number"
                                        class="form-control @error('polish_multiplier') is-invalid @enderror"
                                        name="polish_multiplier" value="{{ old('polish_multiplier') }}" required>

                                    @error('polish_multiplier')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="english_multiplier"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Mnożnik punktów z angielskiego') }}</label>

                                <div class="col-md-6">
                                    <input id="english_multiplier" type="number"
                                        class="form-control @error('english_multiplier') is-invalid @enderror"
                                        name="english_multiplier" value="{{ old('english_multiplier') }}" required>

                                    @error('english_multiplier')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="start_date"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Początek') }}</label>

                                <div class="col-md-6">
                                    <input id="start_date" type="date"
                                        class="form-control @error('start_date') is-invalid @enderror" name="start_date"
                                        value="{{ old('start_date') }}" required>

                                    @error('start_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="end_date"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Koniec') }}</label>

                                <div class="col-md-6">
                                    <input id="end_date" type="date"
                                        class="form-control @error('end_date') is-invalid @enderror" name="end_date"
                                        value="{{ old('end_date') }}" required>

                                    @error('end_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="places"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Miejsca') }}</label>

                                <div class="col-md-6">
                                    <input id="places" type="number"
                                        class="form-control @error('places') is-invalid @enderror" name="places"
                                        value="{{ old('places') }}" required>

                                    @error('places')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Stwórz profil kalasy') }}
                                    </button>
                                    <a href="{{ route('admin.profiles.index') }}" class="btn btn-secondary">
                                        {{ __('Anuluj') }}
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('shared.footer')
</body>
