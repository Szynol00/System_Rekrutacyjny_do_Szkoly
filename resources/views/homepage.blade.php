<!doctype html>
<html lang="en">

@include('shared.header')

<body>


    @include('shared.nav')



    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="\img\school_picture5.jpg" class="d-block w-100" alt="school">
                <div class="carousel-caption  d-none d-md-block text-center">
                    <h1>Przygotuj się na przyszłość</h1>
                    <p>W naszym liceum kładziemy nacisk na rozwój umiejętności, które są niezbędne w dynamicznie
                        zmieniającym się świecie. Z nami będziesz gotowy na wyzwania przyszłości.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="\img\teacher.jpg" class="d-block w-100" alt="teacher">
                <div class="carousel-caption  d-none d-md-block text-center">
                    <h1>Wzbogać swoją wiedzę dzięki naszym nauczycielom</h1>
                    <p>Doświadczeni nauczyciele w XV LOO w Rzeszowie są dedykowani wzbogaceniu
                        Twojej wiedzy i rozwoju intelektualnego. Dzięki nim odkryjesz nowe horyzonty i zdobędziesz cenne
                        umiejętności.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="\img\students.jpg" class="d-block w-100" alt="students">
                <div class="carousel-caption  d-none d-md-block text-center">
                    <h1>Odkryj swój potencjał i pasję</h1>
                    <p>Nasi uczniowie w XV LO Rzeszowie tworzą inspirującą społeczność, w
                        której możesz znaleźć wsparcie, motywację i możliwości rozwinięcia swoich zainteresowań. Razem
                        odkryjemy Twoje talenty i osiągniemy sukcesy.</p>
                </div>
            </div>

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>






    <div class="container mt-5">
        <div class="jumbotron">
            <h1 class="display-5">Witamy w XV LO w Rzeszowie</h1>
            <p class="lead">Przygotuj się na przyszłość pełną możliwości w VII Liceum Ogólnokształcącym w Rzeszowie,
                gdzie pasja spotyka się z doskonałością edukacyjną. Nasi doświadczeni nauczyciele i innowacyjne metody
                nauczania zapewnią Ci solidne fundamenty wiedzy i umiejętności, które prowadzą do sukcesu i osiągania
                swoich celów. </p>

            <p class="lead"> W naszej szkole stawiamy na rozwój całej osobowości ucznia, nie tylko w dziedzinie
                akademickiej, ale
                także w sferze społecznej i kulturalnej. Będziesz miał szansę uczestniczyć w inspirujących projektach,
                debatach, konkursach i wydarzeniach artystycznych, które rozwijają umiejętności interpersonalne,
                kreatywność i liderowanie. </p>


            <p class="lead">Nie czekaj dłużej - dołącz do naszej szkoły i otwórz drzwi do nieograniczonych możliwości
                i sukcesów w
                przyszłości!</p>
        </div>
        <div class="container mb-5 custom-container">
            <div class="row">
                <div class="col-md-3">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body">
                            <h5 class="card-title"><i class="bi bi-award"></i> Mistrzostwo w ogólnopolskim konkursie
                                matematycznym
                            </h5>
                            <p class="card-text mb-5">Nasza szkoła zdobyła pierwsze miejsce w prestiżowym konkursie
                                matematycznym, potwierdzając wysoki poziom naszych uczniów w tej dziedzinie.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-info text-white mb-4">
                        <div class="card-body">
                            <h5 class="card-title"><i class="bi bi-award"></i> Nagroda za innowacyjne podejście do
                                nauczania</h5>
                            <p class="card-text">Nasza szkoła została uhonorowana nagrodą za innowacyjne metody
                                nauczania, które angażują uczniów i rozwijają ich umiejętności w sposób kreatywny i
                                inspirujący.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-warning text-dark mb-4">
                        <div class="card-body">
                            <h5 class="card-title"><i class="bi bi-award"></i> Sukcesy sportowe na arenie regionalnej
                            </h5>
                            <p class="card-text">Reprezentanci naszej szkoły odnieśli liczne sukcesy w różnych
                                dyscyplinach sportowych, zdobywając medale i wyróżnienia na zawodach regionalnych.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-body">
                            <h5 class="card-title"><i class="bi bi-award"></i> Program edukacyjny z zakresu
                                przedsiębiorczości</h5>
                            <p class="card-text"> Nasza szkoła wprowadziła innowacyjny program edukacyjny, który
                                kształci uczniów w zakresie przedsiębiorczości i rozwija ich umiejętności związane z
                                tworzeniem i zarządzaniem własnymi projektami.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

@include('shared.footer')


</html>
