@extends('master.main',['Title'=>'Player','nav'=>array(
            array(
            "title"=> 'Player List',
            "href"=> '/players',
            ),
            array(
            "title"=> 'Player Create',
            "href"=> '/players/create',
            ),

        ),'active'=>'Player List'])

@section('content')

    @component('components.tables.tablesPlayers.tableIndex',['title'=>'Players','object'=>$player])
    @endcomponent

@endsection
