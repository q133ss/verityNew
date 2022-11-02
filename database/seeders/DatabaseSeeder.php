<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Certificate;
use App\Models\Contributor;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User();
        $admin->name = 'admin';
        $admin->email = 'admin@email.net';
        $admin->lastname = 'Алексеев';
        $admin->patronymic = 'Алексеевич';
        $admin->photo = '';
        $admin->city = 'Воронеж';
        $admin->socials = json_encode([]);
        $admin->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';
        $admin->is_admin = true;
        $admin->save();

        $socials = [
            'whatsapp' => 'https://www.whatsapp.com/',
            'telegram' => 'https://web.telegram.org',
            'email' => 'email@email.com'
        ];

        $volunteers = [
            [
                'photo' => '',
                'name' => 'Иван',
                'lastname' => 'Иванов',
                'patronymic' => 'Иванович',
                'city' => 'Москва',
                'socials' => json_encode($socials),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'
            ],
            [
                'photo' => '',
                'name' => 'Алексей',
                'lastname' => 'Алексеев',
                'patronymic' => 'Алексеевич',
                'city' => 'Воронеж',
                'socials' => json_encode($socials),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'
            ]
        ];

        foreach ($volunteers as $volunteer){
            User::create($volunteer);
        }

        Contributor::create([
            'name' => 'Ivan',
            'lastname' => 'Petrov',
            'patronymic' => 'Ivanovic',
            'phone' => '898989898',
            'country_id' => rand(1,100),
            'recommender_id' => 1,
            'city' => 'Москва',
            'sum' => '12000'
        ]);

        Contributor::create([
            'name' => 'Sergei',
            'lastname' => 'Petrov',
            'patronymic' => 'Ivanovic',
            'phone' => '898989898',
            'country_id' => rand(1,100),
            'recommender_id' => 1,
            'city' => 'Москва',
            'sum' => '3000'
        ]);

        Contributor::factory(50)->create();

        $contributors = Contributor::get();
        foreach($contributors as $contributor){
            Certificate::make($contributor->id);
        }
    }
}
