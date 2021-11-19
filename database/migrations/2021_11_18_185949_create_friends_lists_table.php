<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFriendsListsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('friends_lists', function (Blueprint $table) {
			$table->id();
			$table->integer('credentials_id')->unsigned();
			$table->json('friends_data');
			$table->timestamps();
			$table->foreign('credentials_id')
				->references('id')
				->on('verify_credentials')
				->onDelete('CASCADE');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('friends_lists');
	}
}
