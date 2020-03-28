<?php

use Illuminate\Database\Seeder;
use App\Channel;
use Illuminate\Support\Str;

class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $channels = Channel::create([
            'name' => 'Laravel 7.0',
            'slug' => Str::slug('Laravel 5.8')
        ]);
        $channels = Channel::create([
            'name' => 'Vue Js 3.0',
            'slug' => Str::slug('Vue Js 3.0')
        ]);
        $channels = Channel::create([
            'name' => 'Javascript',
            'slug' => Str::slug('Javascript')
        ]);
    }
}
