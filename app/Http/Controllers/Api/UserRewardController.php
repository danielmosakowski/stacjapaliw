<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserRewardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return UserReward::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'points' => 'required|integer',
            'reason' => 'required|string|max:255',
        ]);

        return UserReward::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return UserReward::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $userReward = UserReward::findOrFail($id);

        $request->validate([
            'user_id' => 'sometimes|exists:users,id',
            'points' => 'sometimes|integer',
            'reason' => 'sometimes|string|max:255',
        ]);

        $userReward->update($request->all());

        return $userReward;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        UserReward::destroy($id);

        return response()->noContent();
    }
}
