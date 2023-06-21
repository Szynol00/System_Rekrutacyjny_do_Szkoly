@include('shared.header')

<body>
    @include('shared.nav')

    <div class="container custom-container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header topHeader">
                        <i class="bi bi-person-plus"></i> Dodaj nowego użytkownika
                    </div>
                    <div class="card-body">
                        <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Dodaj</a>

                    </div>
                </div>
            </div>
        </div>
        <div class="container custom-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header topHeader">
                            Administratorzy
                        </div>
                        <div class="card-body">
                            <div class="row mt-3">
                                @foreach ($users as $user)
                                    @if ($user->role_id == 1)
                                        <div class="col-md-4">
                                            <div class="card mb-3">
                                                <img src="{{ $user->photo ? asset('storage/' . $user->photo) : asset('img/anonim.jpg') }}"
                                                    class="card-img-top" alt="User Photo">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $user->first_name }}
                                                        {{ $user->last_name }}</h5>
                                                    <p class="card-text">{{ $user->email }}</p>
                                                    <div class="btn-group" role="group" aria-label="User Actions">
                                                        <button type="button" class="btn btn-primary">Edytuj</button>
                                                        <button type="button" class="btn btn-danger">Usuń</button>
                                                        <button type="button"
                                                            class="btn btn-primary">Szczegóły</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="container custom-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header topHeader">
                            Kandydaci
                        </div>
                        <div class="card-body">
                            <div class="row mt-3">
                                @foreach ($users as $user)
                                    @if ($user->role_id == 2)
                                        <div class="col-md-4">
                                            <div class="card mb-3">
                                                <img src="{{ $user->photo ? asset('storage/' . $user->photo) : asset('img/anonim.jpg') }}"
                                                    class="card-img-top" alt="Zdjęcie użytkownika">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $user->first_name }}
                                                        {{ $user->last_name }}</h5>
                                                    <p class="card-text">{{ $user->email }}</p>
                                                    <div class="btn-group" role="group" aria-label="User Actions">
                                                        <a href="{{ route('admin.users.show', $user->id) }}"
                                                            class="btn btn-primary custom-btn">Szczegóły</a>
                                                        <a href="{{ route('admin.users.edit', $user->id) }}"
                                                            class="btn btn-primary">Edytuj</a>
                                                        <a href="{{ route('admin.users.destroy', $user->id) }}"
                                                            class="btn btn-danger rounded-right"
                                                            onclick="event.preventDefault();
                                                            if (confirm('Czy na pewno chcesz usunąć tego użytkownika?')) {
                                                                document.getElementById('delete-user-form-{{ $user->id }}').submit();
                                                            }">
                                                            Usuń
                                                        </a>
                                                        <form id="delete-user-form-{{ $user->id }}"
                                                            action="{{ route('admin.users.destroy', $user->id) }}"
                                                            method="POST" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>

    </div>


    @include('shared.footer')
</body>
