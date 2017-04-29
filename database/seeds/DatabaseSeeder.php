<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $users = [
            [
                'email' => 'admin@dummy.org',
                'password' => Hash::make('Admin123!'),
                'name' => 'Amministratore del sistema',
            ],
            [
                'email' => 'user@dummy.org',
                'password' => Hash::make('User456!'),
                'name' => 'Utente',
            ],
            [
                'email' => 'guest@dummy.org',
                'password' => Hash::make('Guest!789'),
                'name' => 'Ospite',
            ]    
        ];
        
        foreach ($users as $user) {
            User::create($user);
        }
    }

}
