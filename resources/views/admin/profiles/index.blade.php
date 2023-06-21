@include('shared.header')

<body>
    @include('shared.nav')

    <div class="container custom-container">
        <div class="row">
            <div class="col-md-12">
                <div class="text-right mb-3">
                    <a href="{{ route('admin.profiles.create') }}" class="btn btn-primary custom-btn">
                        <i class="bi bi-plus-circle-dotted"></i> Dodaj nowy profil
                    </a>
                </div>
            </div>
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
                            <p class="card-text">Mnożnik punktów z matematyki: {{ $profile->mathematics_multiplier }}
                            </p>
                            <p class="card-text">Mnożnik punktów z polskiego: {{ $profile->polish_multiplier }}</p>
                            <p class="card-text">Mnożnik punktów z angielskiego: {{ $profile->english_multiplier }}</p>
                            <p class="card-text">Początek rekrutacji: {{ $profile->start_date }}</p>
                            <p class="card-text">Koniec rekrutacji: {{ $profile->end_date }}</p>
                            <p class="card-text">Miejsca: {{ $profile->places }}</p>
                            <a href="#" class="btn btn-primary custom-btn">Aplikuj na ten kierunek</a>
                        </div>
                        <div class="card-body">
                            <div class="btn-group" role="group" aria-label="Profile Actions">
                                <a href="{{ route('admin.profiles.show', $profile->id) }}"
                                    class="btn btn-primary custom-btn">Szczegóły</a>
                                <a href="{{ route('admin.profiles.edit', $profile->id) }}"
                                    class="btn btn-primary">Edytuj</a>
                                <a href="{{ route('admin.profiles.destroy', $profile->id) }}"
                                    class="btn btn-danger rounded-right"
                                    onclick="event.preventDefault();
            if (confirm('Czy na pewno chcesz usunąć ten profil?')) {
                document.getElementById('delete-profile-form-{{ $profile->id }}').submit();
            }">
                                    Usuń
                                </a>
                                <form id="delete-profile-form-{{ $profile->id }}"
                                    action="{{ route('admin.profiles.destroy', $profile->id) }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @include('shared.footer')
</body>
