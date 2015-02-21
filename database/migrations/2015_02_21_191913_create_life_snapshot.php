<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLifeSnapshot extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('life_snapshots', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('user_id');
            $table->integer('flat_date');
            $table->integer('twitter_follower_count');
            $table->integer('last_fm_scrobble_count');
			$table->timestamps();

            $table->unique(['user_id','flat_date']);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('life_snapshots');
	}

}
