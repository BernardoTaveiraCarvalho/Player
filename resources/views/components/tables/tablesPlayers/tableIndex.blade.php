<h1>{{$title}}</h1>
@if (session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('status') }} <i class="bi bi-check2 h1"></i>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    </div>
@endif
{{$object->links()}}
<form action="{{url('/players/deleteall')}}" method="POST">
    @csrf
    @method('DELETE')
    <td>  <button type="submit" class="btn btn-danger">Delete All</button></td>
</form>
<table class="table table-dark">
    <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">Address</th>
        <th scope="col">Retired</th>
        <th scope="col">Created_at</th>
        <th scope="col">updated_at</th>
        <th scope="col">Show</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
    </tr>
    </thead>
    <tbody>
    @foreach($object as $obj)
        <tr>
            <th scope="row">{{$obj->id}}</th>
            <td>{{$obj->name}}</td>
            <td>{{$obj->address}}</td>
            <td>
                @if($obj->retired)
                    <i  class="bi bi-emoji-smile h1"></i>
                @else
                    <i class="bi bi-emoji-frown h1" ></i>
                @endif
            </td>
            <td>{{$obj->created_at}}</td>
            <td>{{$obj->updated_at}}</td>
            <td><a class="btn btn-success" href="{{url('players/'.$obj->id)}}" role="button">Show</a></td>
            <td><a class="btn btn-primary" href="{{url('players/'.$obj->id.'/edit')}}" role="button">Edit</a></td>
            <form action="{{url('players/' . $obj->id)}}" method="POST">
                @csrf
                @method('DELETE')
          <td>  <button type="submit" class="btn btn-danger">Delete</button></td>
            </form>
        </tr>
    @endforeach

    </tbody>
</table>
{{$object->links()}}
