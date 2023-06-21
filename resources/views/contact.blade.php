@include('shared.header')

<body>
    @include('shared.nav')

    <div class="container mt-5 text-center">
        <div class="row">
            <div class="col-12 mb-2">
                <div class="card card-custom">
                    <div class="card-body">
                        <h5 class="card-title">Kontakt</h5>
                        <ul class="list-unstyled">
                            <li><i class="bi bi-geo-alt-fill"></i> Adres: ul. Przykładowa 123, 00-000 Warszawa</li>
                            <li><i class="bi bi-door-open-fill"></i> Numer pokoju: 105 (sekretariat)</li>
                            <li><i class="bi bi-telephone-fill"></i> Telefon: 123-456-789</li>
                            <li><i class="bi bi-envelope-fill"></i> E-mail: example@example.com</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card card-custom text-center">
                    <div class="card-body">
                        <h5 class="card-title">Lokalizacja</h5>
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item"
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2560.257884491675!2d21.999099215972344!3d50.040925397115375!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x473eed1017e6dfb1%3A0xc5ad6e736ab61472!2sRzesz%C3%B3w!5e0!3m2!1sen!2spl!4v1623636164482"
                                allowfullscreen allowfullscreen style="width: 100%; height: 500px;"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('shared.footer')
</body>
