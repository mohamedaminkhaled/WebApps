<?php

use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Setting::create([
            'blog_name'=>'Developer Blog',
            'phone_number'=>'01027648297',
            'email'=>'Mohamedamin.tech@gmail.com',
            'address'=>'Albehera - Egypt',
        ]);
    }
}
