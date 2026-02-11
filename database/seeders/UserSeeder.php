<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->call('shield:generate', ['--all' => true]);
        
        $user = User::create([
            'name' => 'Administrador',
            'email' => 'admin@admin.com',
            'password' => bcrypt('12345678'),
        ]);

        $user->assignRole('super_admin');

        Role::Create(['name' => 'admin']);
        Role::Create(['name' => 'technician']);
        Role::Create(['name' => 'cashier']);

        }
}
