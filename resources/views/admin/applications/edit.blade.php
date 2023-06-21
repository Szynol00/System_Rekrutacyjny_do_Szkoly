@include('shared.header')

<body>
    @include('shared.nav')

    <div class="container custom-container">
        <div class="row">
            <div class="col-md-12">
                <h1>Edycja aplikacji</h1>

                <form action="{{ route('admin.applications.update', $application->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group mt-2">
                        <label for="submitted_at">Data złożenia:</label>
                        <input type="text" class="form-control" id="submitted_at" name="submitted_at"
                            value="{{ $application->submitted_at }}">
                    </div>

                    <div class="form-group mt-2">
                        <label for="is_qualified">Status kwalifikacji:</label>
                        <select class="form-control" id="is_qualified" name="is_qualified">
                            <option value="1" {{ $application->is_qualified ? 'selected' : '' }}>Zakwalifikowano
                            </option>
                            <option value="0" {{ !$application->is_qualified ? 'selected' : '' }}>Nie
                                zakwalifikowano
                            </option>
                        </select>
                    </div>

                    <div class="form-group mt-2">
                        <label for="is_photo_valid">Status zdjęcia:</label>
                        <select class="form-control" id="is_photo_valid" name="is_photo_valid">
                            <option value="1" {{ $application->is_photo_valid ? 'selected' : '' }}>Zdjęcie ważne
                            </option>
                            <option value="0" {{ !$application->is_photo_valid ? 'selected' : '' }}>Zdjęcie
                                nieważne</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="payment_status">Status płatności:</label>
                        <select class="form-control" id="payment_status" name="payment_status">
                            <option value="1" {{ $application->payment_status ? 'selected' : '' }}>Opłacone
                            </option>
                            <option value="0" {{ !$application->payment_status ? 'selected' : '' }}>Nieopłacone
                            </option>
                        </select>
                    </div>


                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary custom-btn">Zapisz</button>
                        <a href="{{ route('admin.applications.index') }}" class="btn btn-secondary">Powrót</a>
                    </div>
                </form>
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
        </div>
    </div>

    @include('shared.footer')
</body>
