@extends('master.main',['Title'=>'Player','nav'=>array(
            array(
            "title"=> 'Player List',
            "href"=> '/players',
            ),
            array(
            "title"=> 'Player Create',
            "href"=> '/players/create',
            ),

        ),'active'=>'Player Create'])

@section('content')

    @component('components.forms.formPlayer.formEdit',['player'=>$player,'obj'=>array(
    array(
        'title'=>'name',
        'value'=>$player->name,
        'name'=>'name',
        'type'=>'text',
        'require'=>1,
    ),
    array(
        'title'=>'address',
        'value'=>$player->address,
        'name'=>'address',
        'type'=>'text',
        'require'=>1,
    ),
    array(
        'title'=>'description',
        'value'=>$player->description,
        'name'=>'description',
        'type'=>'textarea',
        'require'=>0,
    ),
    array(
        'title'=>'I am retired',
        'name'=>'retired',
        'value'=>1,
        'valueActual' => $player->retired,
        'type'=>'radio',
        'require'=>0,
    ),
     array(
        'title'=>'I am not retired',
        'name'=>'retired',
        'value'=>0,
        'valueActual' => $player->retired,
        'type'=>'radio',
        'require'=>0,
    )
    )])
    @endcomponent
@endsection
