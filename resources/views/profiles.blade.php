@include('shared.header')

<body>
    @include('shared.nav')

    <div class="container">
        <div class="jumbotron custom-jumbotron">
            <h3>Proces aplikacji na wybrany kierunek:</h3>
            <p>Dziękujemy za zainteresowanie naszym liceum i chęć aplikacji na wybrany kierunek. Poniżej przedstawiamy
                proces aplikacji oraz wymagania, które muszą zostać spełnione:</p>
            <ol>
                <li><i class="bi bi-person-circle"></i> Zaloguj się na swoje konto.</li>
                <li><i class="bi bi-camera"></i> Prześlij swoje aktualne zdjęcie, które zostanie zatwierdzone przez
                    administratora.</li>
                <li><i class="bi bi-currency-dollar"></i> Uiszczenie opłaty rekrutacyjnej. Po zaksięgowaniu wpłaty Twoja
                    aplikacja zostanie uwzględniona w procesie rekrutacji.</li>
            </ol>
        </div>

        <div class="container custom-container">
            <div class="row">

                @foreach ($profiles as $profile)
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-header topHeader">
                                <div class="row">
                                    <h5 class="card-title">{{ $profile->name }}</h5>
                                </div>
                            </div>
                            <div class="card-body ">
                                <p class="card-text">{{ $profile->description }}</p>
                                <p class="card-text">Mnożnik punktów z matematyki:
                                    {{ $profile->mathematics_multiplier }}</p>
                                <p class="card-text">Mnożnik punktów z polskiego: {{ $profile->polish_multiplier }}</p>
                                <p class="card-text">Mnożnik punktów z angielskiego: {{ $profile->english_multiplier }}
                                </p>
                                <p class="card-text">Początek rekrutacji: {{ $profile->start_date }}</p>
                                <p class="card-text">Koniec rekrutacji: {{ $profile->end_date }}</p>
                                <p class="card-text">Miejsca: {{ $profile->places }}</p>
                                @if (auth()->check() && auth()->user()->role_id == 2)
                                    <form action="{{ route('apply', ['profileId' => $profile->id]) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary custom-btn">Aplikuj na ten
                                            kierunek</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    @include('shared.footer')
</body>
