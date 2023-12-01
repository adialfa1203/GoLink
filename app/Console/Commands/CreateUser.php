<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Faker\Factory;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $ban = $this->ask('Status User : ');
        $amount = $this->ask('Masukkan Jumlah User : ');
        $faker = Factory::create('id_ID');

        for($i = 1; $i <= $amount;$i++){
            $data = [
                'name' => $faker->name,
                'number' => $faker->e164PhoneNumber,
                'email' => $faker->email,
                'email_verified_at' => null,
                'subscribe' => 'free',
                'password' => $faker->password,
                'google_id' => null,
                'profile_picture' => null,
                'is_banned' => $ban,
                'verification_code' => null,
                'subscription_start_date' => null,
                'subscription_end_date' => null,
                'remember_token' => null,
                'active_status' => 0,
                'avatar' => 'avatar.png',
                'dark_mode' => 0,
                'messenger_color' => null,                
            ];

            $checkUser = User::where('email',$data['email'])->count();

            if($checkUser){
                $i--;
            }else{
                $user = User::create($data);
                $this->info('Berhasil Menambahkan User Ke-'.$i);
            }
        }
    }
}
