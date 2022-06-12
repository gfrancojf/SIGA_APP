<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(1000)->create();

        $user = User::create([
            'name' => 'Super Admin',
            'email' => 'admin@admin.com',         
            'password' => bcrypt('19721927'),
        ]);
        $user->assignRole('Administrador');
          
    }
}
