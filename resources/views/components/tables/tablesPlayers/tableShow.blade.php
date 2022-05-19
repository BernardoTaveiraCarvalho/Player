<h1>{{$title}}</h1>


<div>
    <div class="form-group">
        <label>Name</label>
        <input type="name" value="{{$obj->name}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" disabled>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Address</label>
        <input type="address" value="{{$obj->address}}" class="form-control" disabled>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Description</label>
        <textarea  rows="6"  class="form-control" disabled> {{$obj->description}}</textarea>
    </div>
    <div class="btn-group btn-group-toggle" data-toggle="buttons">
            <input type="radio" name="options" id="option1"   @if($obj->retired)checked @endif disabled> Retired
            <input type="radio" name="options" id="option2" @if($obj->retired==false)checked @endif disabled> Not Retired
        </div>
</div>
<a class="btn btn-primary" href="{{url('players')}}" role="button">Back</a>
