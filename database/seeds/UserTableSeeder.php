<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrator = new App\User;
        $administrator->name = 'admin';
        $administrator->email = 'prabu@admin.com';
        $administrator->password = \Hash::make('admin');
        $administrator->nim = '10117130';
        $administrator->kelas ='IF 4';
        $administrator->roles =json_encode(['ADMIN']);
        $administrator->status = 'SUDAH';

        $administrator->save();

        $this->command->info('User Admin sudah diinsert');
    }
}
