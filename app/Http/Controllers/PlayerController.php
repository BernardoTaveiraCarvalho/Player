<?php

namespace App\Http\Controllers;

use App\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->search !="") {
            $search = $request->input('search');

            $player = Player::query()
                ->where('name', 'LIKE', "{$search}%")
                ->orderBy('id', 'asc')->paginate(10);
        }else{
        $player = Player::query()
            ->orderBy('id', 'asc')->paginate(10);
    }


        return view('pages.players.index',['player'=>$player]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.players.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name'        => 'required',
            'address'     => 'required',
            'description' =>'required',
            'retired' =>'required',
            ]);

        Player::create([
            'name'        => $request->name,
            'address'     => $request->address,
            'description' => $request->description,
            'retired'=>$request->retired,
            ]);

        /*Player::create($request->all());*/
        return redirect('players')->with('status','Item created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function show(Player $player)
    {
        return view('pages.players.show',['player'=>$player]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function edit(Player $player)
    {
        return view('pages.players.edit',['player'=>$player]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Player $player)
    {
        $player->update($request->all());
        return redirect('players')->with('status','Item edited successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function destroy(Player $player)
    {
        try {
            $player = Player::findOrFail($player->id);
            $player->delete();
            return redirect('players')->with('status','Item deleted successfully!');;
        } catch(ModelNotFoundException $e){
            return redirect('players')->with('status','Item not deleted successfully!');;
        }
    }
    public function deleteall()
    {
        Player::truncate();
        return redirect('players')->with('status','OH NOOO');;
    }
}
