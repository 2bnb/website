<?php

use App\Bot;
use Illuminate\Database\Seeder;

class BotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		Bot::create([
			'name' => '2BNB Heimdall',
			'description' => 'Server Management bot among other things, this is the key bot for the unit'
		]);
        Bot::create([
			'name' => 'Communism Machine',
			'description' => 'Time comparison bot, allows unit members to find out time in their timezones'
		]);
    }
}
