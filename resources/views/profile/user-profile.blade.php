<!doctype html>
<html lang="en">

@include('shared.header')

<body>
    @include('shared.nav')

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header topHeader">{{ __('Twój profil') }}</div>

                    <div class="card-body d-flex">
                        <div class="me-3 p-3">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <img src="{{ asset('storage/' . auth()->user()->photo) }}" alt="Zdjęcie użytkownika"
                                class="img-fluid">
                        </div>
                        <div class="text-center mt-3">
                            <p><strong>Imię:</strong> {{ auth()->user()->first_name }}</p>
                            <p><strong>Nazwisko:</strong> {{ auth()->user()->last_name }}</p>
                            <p><strong>Adres email:</strong> {{ auth()->user()->email }}</p>
                            @if (auth()->user()->role_id == 2)
                                @if ($candidate)
                                    <p><strong>Indeks kandydata:</strong> {{ $candidate->candidate_index }}</p>
                                    <p><strong>Wynik z matematyki:</strong> {{ $candidate->mathematics_score }}</p>
                                    <p><strong>Wynik z języka polskiego:</strong> {{ $candidate->polish_score }}</p>
                                    <p><strong>Wynik z języka angielskiego:</strong> {{ $candidate->english_score }}</p>
                                    <a href="{{ route('profile.edit') }}" class="btn btn-primary custom-btn">Edytuj
                                        swoje dane</a>
                                @else
                                    <p>Nie masz jeszcze przypisanego kandydata.</p>
                                @endif

                            @endif
                            @if (session('error'))
                                <div class="alert alert-danger mt-1">
                                    {{ session('error') }}
                                </div>
                            @endif

                        </div>
                    </div>


                    @if (auth()->user()->role_id == 2)
                        <div class="card-header topHeader mt-2">{{ __('Twoje aplikacje') }}</div>
                        <div class="card">
                            <div class="card-body">
                                @if ($applications->count() > 0)
                                    @foreach ($applications as $application)
                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $application->profile->name }}</h5>
                                                <p class="card-text">
                                                    <strong>Status Zdjęcia:</strong>
                                                    @if ($application->is_photo_valid)
                                                        <i class="bi bi-check2-circle text-success"></i> Zaakceptowane
                                                    @else
                                                        <i class="bi bi-x-circle text-danger"></i> Nie zaakceptowane
                                                    @endif
                                                </p>
                                                <p class="card-text">
                                                    <strong>Status Płatności:</strong>
                                                    @if ($application->payment_status)
                                                        <i class="bi bi-check2-circle text-success"></i> Zaksięgowano
                                                    @else
                                                        <i class="bi bi-x-circle text-danger"></i> Nie zaksięgowano
                                                    @endif
                                                </p>
                                                <p class="card-text">
                                                    <strong>Kwalifikacja:</strong>
                                                    @if ($application->is_qualified)
                                                        <i class="bi bi-check2-circle text-success"></i> Zakwalifikowany
                                                    @else
                                                        <i class="bi bi-x-circle text-danger"></i> Nie zakwalifikowany
                                                    @endif
                                                </p>
                                                <p class="card-text">
                                                    <strong>Punkty:</strong> {{ $application->score }}
                                                </p>
                                                <p class="card-text">
                                                    <strong>Początek rekrutacji:</strong>
                                                    {{ $application->profile->start_date }}
                                                </p>
                                                <p class="card-text">
                                                    <strong>Koniec rekrutacji:</strong>
                                                    {{ $application->profile->end_date }}
                                                </p>
                                            </div>

                                        </div>
                                    @endforeach
                                @else
                                    <p>Nie masz jeszcze przypisanych zgłoszeń.</p>
                                @endif
                            </div>
                        </div>
                    @endif



                </div>

            </div>
        </div>
    </div>

    @include('shared.footer')
</body>

</html>
