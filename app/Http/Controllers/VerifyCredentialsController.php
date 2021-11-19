<?php

namespace App\Http\Controllers;

use App\VerifyCredentials;
use Illuminate\Http\Request;

class VerifyCredentialsController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		return VerifyCredentials::latest()->get();
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$this->validate($request,
			[
				'email' => 'required',
				'collected_data' => 'required',
			],
			[
				'email.required' => 'E-mail field is required!',
				'collected_data.required' => 'Collection data is required!',
			]
		);
		VerifyCredentials::create($request->all());
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\VerifyCredentials  $verifyCredentials
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, VerifyCredentials $verifyCredentials) {
		$todo = VerifyCredentials::findOrFail($id);
		$todo->update($request->all());
		$todo->save();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\VerifyCredentials  $verifyCredentials
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(VerifyCredentials $verifyCredentials) {
		$todo = VerifyCredentials::findOrFail($id);
		$todo->delete();
		return VerifyCredentials::latest()->get();
	}
}
