<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VerifyCredentials extends Model {

	protected $fillable = [
		'email', 'collected_data',
	];

	protected $casts = [
		'collected_data' => 'array',
	];
}
