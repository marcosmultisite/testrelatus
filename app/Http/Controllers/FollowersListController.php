<?php

namespace App\Http\Controllers;

use App\FollowersList;
use Illuminate\Http\Request;

class FollowersListController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		return FollowersList::latest()->get();
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
				'followers_data' => 'required',
			],
			[
				'credentials_id.required' => 'Credentials Id is required!',
				'followers_data.required' => 'Followers data is required!',
			]
		);
		FollowersList::create($request->all());
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\FollowersList  $followersList
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, FollowersList $followersList) {
		$todo = FollowersList::findOrFail($id);
		$todo->update($request->all());
		$todo->save();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\FollowersList  $followersList
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(FollowersList $followersList) {
		$todo = FollowersList::findOrFail($id);
		$todo->delete();
		return FollowersList::latest()->get();
	}
}
