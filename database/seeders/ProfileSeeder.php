<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('profiles')->insert([
            [
                'name' => 'Matematyka i Fizyka',
                'description' => 'Ten kierunek koncentruje się na naukach ścisłych, matematyce, fizyce i logice. Uczniowie będą rozwiązywać zaawansowane zadania matematyczne, eksperymentować w laboratoriach fizycznych i rozwijać umiejętności analitycznego myślenia. Mogą mieć dostęp do dodatkowych kursów z zakresu matematyki i fizyki.',
                'mathematics_multiplier' => '3.5',
                'polish_multiplier' => '1.0',
                'english_multiplier' => '1.6',
                'start_date' => '2023-06-07 00:00:00',
                'end_date' => '2023-06-08 00:00:00',
                'places' => '15',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Informatyka i Matematyka',
                'description' => 'Informatyka i Matematyka" skupia się na rozwijaniu umiejętności w dziedzinach informatyki i matematyki. Jest to intensywny program, który przygotowuje uczniów do zrozumienia i wykorzystania zaawansowanych koncepcji matematycznych oraz umiejętności programowania i rozwiązywania problemów z wykorzystaniem technologii informatycznych. ',
                'mathematics_multiplier' => '3.5',
                'polish_multiplier' => '1.0',
                'english_multiplier' => '2.5',
                'start_date' => '2023-07-01 00:00:00',
                'end_date' => '2023-08-30 00:00:00',
                'places' => '17',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Biol-chem',
                'description' => 'Biol-chem to kierunek dla osób, które interesują się naukami ścisłymi. Studia na tym kierunku są bardzo wymagające, ale dają możliwość zdobycia wiedzy z zakresu biologii i chemii na bardzo wysokim poziomie. Absolwenci tego kierunku mogą pracować w instytucjach naukowych, uczelniach wyższych, a także w firmach zajmujących się badaniami i rozwojem.',
                'mathematics_multiplier' => '3.5',
                'polish_multiplier' => '1.0',
                'english_multiplier' => '1.7',
                'start_date' => '2023-07-02 00:00:00',
                'end_date' => '2023-08-30 00:00:00',
                'places' => '16',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Humanistyka i literatura',
                'description' => 'Ten kierunek skupia się na naukach humanistycznych, językach, literaturze i kulturze. Uczniowie będą zgłębiać literaturę, filozofię, historię sztuki oraz języki obce. Mogą mieć możliwość udziału w debatach, konkursach literackich lub projektach badawczych związanych z naukami humanistycznymi.',
                'mathematics_multiplier' => '1.0',
                'polish_multiplier' => '3.5',
                'english_multiplier' => '1.7',
                'start_date' => '2023-07-02 00:00:00',
                'end_date' => '2023-08-30 00:00:00',
                'places' => '15',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Języki obce',
                'description' => 'Ten kierunek skupia się na nauce języków obcych. Uczniowie będą uczyć się języków obcych, a także historii, kultury i literatury krajów, w których są one używane. Mogą mieć możliwość udziału w konkursach językowych, projektach badawczych lub wymianach międzynarodowych.',
                'mathematics_multiplier' => '1.0',
                'polish_multiplier' => '1.5',
                'english_multiplier' => '3.5',
                'start_date' => '2023-07-01 00:00:00',
                'end_date' => '2023-08-30 00:00:00',
                'places' => '15',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Sztuka i muzyka',
                'description' => 'Ten kierunek skupia się na sztuce i muzyce. Uczniowie będą uczyć się różnych form sztuki, takich jak malarstwo, rzeźba, fotografia, film, teatr i taniec. Mogą mieć możliwość udziału w konkursach sztuki, projektach badawczych lub wystawach.',
                'mathematics_multiplier' => '1.0',
                'polish_multiplier' => '2.5',
                'english_multiplier' => '1.5',
                'start_date' => '2023-07-03 00:00:00',
                'end_date' => '2023-08-30 00:00:00',
                'places' => '16',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
