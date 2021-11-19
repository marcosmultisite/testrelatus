<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FollowersList extends Model {

	protected $fillable = [
		'credentials_id', 'followers_data',
	];

	protected $casts = [
		'followers_data' => 'array',
	];
}
