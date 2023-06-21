@include('shared.header')

<body>
    @include('shared.nav')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header topHeader">
                        Szczegóły profilu
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $profile->name }}</h5>
                        <p class="card-text">Opis: {{ $profile->description }}</p>
                        <p class="card-text">Mnożnik punktów z matematyki: {{ $profile->mathematics_multiplier }}</p>
                        <p class="card-text">Mnożnik punktów z polskiego: {{ $profile->polish_multiplier }}</p>
                        <p class="card-text">Mnożnik punktów z angielskiegor: {{ $profile->english_multiplier }}</p>
                        <p class="card-text">Początek: {{ $profile->start_date }}</p>
                        <p class="card-text">Koniec: {{ $profile->end_date }}</p>
                        <p class="card-text">Miejsca: {{ $profile->places }}</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('admin.profiles.index') }}" class="btn btn-primary custom-btn">Wróć do
                            profili</a>
                        <a href="{{ route('admin.profiles.edit', $profile->id) }}" class="btn btn-primary">Edytuj</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('shared.footer')
</body>
