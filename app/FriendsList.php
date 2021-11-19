<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FriendsList extends Model {

	protected $fillable = [
		'credentials_id', 'friends_data',
	];

	protected $casts = [
		'friends_data' => 'array',
	];
}
