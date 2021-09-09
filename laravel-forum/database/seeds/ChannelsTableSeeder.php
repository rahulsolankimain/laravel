<?php

use Illuminate\Database\Seeder;

use App\Channel;

class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Channel::create([
            'name' => 'Laravel 5.8',
            'slug' => Str::slug('Laravel 5.8') //str_slug() function helps to generate string slug
        ]);

        Channel::create([
            'name' => 'Vue js 3',
            'slug' => Str::slug('Vue js 3') //str_slug() function helps to generate string slug
        ]);

        Channel::create([
            'name' => 'Angular 7',
            'slug' => Str::slug('Angular 7') //str_slug() function helps to generate string slug
        ]);

        Channel::create([
            'name' => 'Node js',
            'slug' => Str::slug('Node js') //str_slug() function helps to generate string slug
        ]);


    }
}
