<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    // display a listing of the resource. treturn json
    public function index()
    {
        $players = Player::all();
        return response()->json($players);
    }

    // store a newly created resource in storage.
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
        ]);

        $player = Player::create($validatedData);

        return response()->json($player, 201);
    }

    // display the specified resource.
    public function show(Player $player)
    {
        return response()->json($player);
    }

    // update the specified resource in storage.
    public function update(Request $request, Player $player)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
        ]);

        $player->update($validatedData);

        return response()->json($player, 200);
    }

    // remove the specified resource from storage.
    public function destroy(Player $player)
    {
        $player->delete();

        return response()->json(null, 204);
    }
}