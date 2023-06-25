<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'first_name' => 'Szymon',
                'last_name' => 'Mazur',
                'email' => 'szymon.mazur@email.com',
                'password' => Hash::make('password123'),
                'photo' => 'img/admin_photo.jpg',
                'email_verified_at' => now(),
                'role_id' => 1, // admin
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Jan',
                'last_name' => 'Kowal',
                'email' => 'jan.kowal@email.com',
                'password' => Hash::make('password123'),
                'photo' => 'img/id_photo4.jpg',
                'email_verified_at' => now(),
                'role_id' => 2, // user
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Natalia',
                'last_name' => 'Nowak',
                'email' => 'natalia.nowak@email.com',
                'password' => Hash::make('password123'),
                'photo' => 'img/id_photo1.jpg',
                'email_verified_at' => now(),
                'role_id' => 2, // user
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Kamil',
                'last_name' => 'Kopeć',
                'email' => 'kamil.kopec@email.com',
                'password' => Hash::make('password123'),
                'photo' => 'img/id_photo4.jpg',
                'email_verified_at' => now(),
                'role_id' => 2, // user
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Sylwia',
                'last_name' => 'Bielecka',
                'email' => 'bielecka.sylwia@email.com',
                'password' => Hash::make('password123'),
                'photo' => 'img/id_photo2.jpg',
                'email_verified_at' => now(),
                'role_id' => 2, // user
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'first_name' => 'Jan',
                'last_name' => 'Mazur',
                'email' => 'jan.mazur@email.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'photo' => 'img/id_photo3.jpg',
                'role_id' => 2, // user
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Szymon',
                'last_name' => 'Panek',
                'email' => 'szymon.panek@email.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'photo' => 'img/id_photo3.jpg',
                'role_id' => 2, // user
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'first_name' => 'Natan',
                'last_name' => 'Nowak',
                'email' => 'natan.nowak@email.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'photo' => 'img/id_photo4.jpg',
                'role_id' => 2, // user
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'first_name' => 'Gabriela',
                'last_name' => 'Adamczyk',
                'email' => 'gabreila.adamczyk@email.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'photo' => 'img/id_photo1.jpg',
                'role_id' => 2, // user
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Mateusz',
                'last_name' => 'Baran',
                'email' => 'mateusz.baran@email.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'photo' => 'img/id_photo3.jpg',
                'role_id' => 2, // user
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Rafał',
                'last_name' => 'Marciniak',
                'email' => 'rafal.marciniak@email.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'photo' => 'img/id_photo4.jpg',
                'role_id' => 2, // user
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Natalia',
                'last_name' => 'Chmielowiec',
                'email' => 'natalia.chmieloweic@email.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'photo' => 'img/id_photo2.jpg',
                'role_id' => 2, // user
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Maria',
                'last_name' => 'Michalska',
                'email' => 'maria.michalska@email.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'photo' => 'img/id_photo1.jpg',
                'role_id' => 2, // user
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'first_name' => 'Martyna',
                'last_name' => 'Mielczarek',
                'email' => 'martyna.mielczarek@email.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'photo' => 'img/id_photo2.jpg',
                'role_id' => 2, // user
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Nikola',
                'last_name' => 'Adamczyk',
                'email' => 'nikola.adamczyk@email.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'photo' => 'img/id_photo1.jpg',
                'role_id' => 2, // user
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Krzysztof',
                'last_name' => 'Majewski',
                'email' => 'krzysztof.majewski@email.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'photo' => 'img/id_photo3.jpg',
                'role_id' => 2, // user
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'first_name' => 'Adam',
                'last_name' => 'Hałka',
                'email' => 'adam.halka@email.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'photo' => 'img/id_photo4.jpg',
                'role_id' => 2, // user
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'first_name' => 'Klaudia',
                'last_name' => 'Lewandowska',
                'email' => 'klaudia.lewandowska@email.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'photo' => 'img/id_photo2.jpg',
                'role_id' => 2, // user
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'first_name' => 'Marcelina',
                'last_name' => 'Rogowska',
                'email' => 'marcelina.rogowska@email.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'photo' => 'img/id_photo1.jpg',
                'role_id' => 2, // user
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Katarzyna',
                'last_name' => 'Michalska',
                'email' => 'kataarzyna.michalska@email.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'photo' => 'img/id_photo1.jpg',
                'role_id' => 2, // user
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),

            ],
            [
                'first_name' => 'Magdalena',
                'last_name' => 'Kamińska',
                'email' => 'magdalena.kaminska@email.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'photo' => 'img/id_photo1.jpg',
                'role_id' => 2, // user
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Klaudia',
                'last_name' => 'Górska',
                'email' => 'kladuia.gorska@email.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'photo' => 'img/id_photo2.jpg',
                'role_id' => 2, // user
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Bartek',
                'last_name' => 'Mielczarek',
                'email' => 'bartek.mielczarek@email.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'photo' => 'img/id_photo4.jpg',
                'role_id' => 2, // user
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // [
            //     'first_name' => '',
            //     'last_name' => '',
            //     'email' => '@email.com',
            //     'email_verified_at' => now(),
            //     'password' => Hash::make('password123'),
            //     'photo' => 'img/id_photo1.jpg',
            //     'role_id' => 2, // user
            //     'remember_token' => Str::random(10),
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
        ]);
        User::factory()->count(30)->create();
    }
}
