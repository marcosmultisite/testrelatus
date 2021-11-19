<?php

namespace App\Http\Controllers;

use App\FriendsList;
use Illuminate\Http\Request;

class FriendsListController extends Controller {
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
				'credentials_id' => 'required',
				'friends_data' => 'required',
			],
			[
				'credentials_id.required' => 'Credentials Id is required!',
				'friends_data.required' => 'Data friends is required!',
			]
		);
		FriendsList::create($request->all());
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\FriendsList  $friendsList
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, FriendsList $friendsList) {
		$todo = FriendsList::findOrFail($id);
		$todo->update($request->all());
		$todo->save();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\FriendsList  $friendsList
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(FriendsList $friendsList) {
		$todo = FriendsList::findOrFail($id);
		$todo->delete();
		return FriendsList::latest()->get();
	}
}
