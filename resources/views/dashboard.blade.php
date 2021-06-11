@if (Auth::user()->utype === 'USR')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <center>
        <h1 style="font-size:100px">Hello {{Auth::user()->name}}</h1>
        <a href="{{route('send.mail')}}" style="color:red;">Click to Send Email</a>
        <div class="col-md-4">
            @include('message')
        </div>
        <a href="{{route('get.post')}}" class="btn btn-success">view List</a>
        <br>
        <table class="table table-bordered col-md-10" style="text-align: center;">
            @if(session()->has('Data'))
            <tbody>
                <tr>
                    <th>Title</th>
                    <th>Body</th>
                    <th >Images</th>
                    <th colspan='2'>Action</th>
                </tr>
                @foreach(session()->get('Data') as $data)
                <tr>
                    <td> {{$data['title']}}</td>
                    <td>{{$data['body']}}</td>
                    <td>
                        <div class="row">
                            <div class="col-md-12">
                            <img class="img-thumbnail" alt="No Image Found!" src="{{ asset('/images/'.$data['images'])}}" width="200px">
                            </div>
                        </div>
                    </td>
                    <td><a class="btn btn-success" href="{{route('edit.post',$data['id'])}}">Update</a></td>
                    <td><a class="btn btn-danger" href="{{route('delete.post',$data['id'])}}">Delete</a></td>
                <tr>
                    @endforeach
            </tbody>
        </table>
        <div class="row">
        <div class="offset-md-4">
        <center>
        {{session()->get('Data')->links()}}
        </center>
        </div>
       </div>
        @endif
        @if(session()->has('post'))
        <div class="col-md-6">   
            <form method="Post" action="{{route('update.post',Session::get('post')->id)}}" enctype="multipart/form-data">
            <h1 style="font-size:50px;margin-bottom:10px;">Update Record</h1>
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control"  placeholder="Title" name="title" value="{{Session::get('post')->title}}">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control"  rows="3" placeholder="Body" name="body" value="{{Session::get('post')->body}}">
                </div>
                <div class="form-group">
                <input type="file" name="image" class="form-control" required value="{{Session::get('post')->images}}">
                <img class="img-thumbnail" alt="No Image Found!" src="{{ asset('/images/'.Session::get('post')->images)}}" width="200px">

                </div>
                <div class="form-group">
                    <input type="submit" class="form-control btn btn-success" value="submit" rows="3">
                </div>
            </form>
            </div>
            @else
            <div class="col-md-6">   
            <form method="Post" action="{{route('store.post')}}" enctype="multipart/form-data">
            <h1 style="font-size:50px;margin-bottom:10px;">Add Record</h1>
            @csrf
                <div class="form-group">
                    <input type="text" class="form-control" name="title"  placeholder="Title" value="" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="body" rows="3" placeholder="Body" required>
                </div>
                <div class="form-group">
                <input type="file" name="image" class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="submit" class="form-control btn btn-success" value="submit" rows="3">
                </div>
            </form>
            </div>
                @if(session()->has('message'))
                    {{$message}}
                @endif
            @endif  
    </center>

</x-app-layout>
@else
{{Session::flush()}}
<script>
    window.location = "/login";
</script>
{{session()->flash('error','Access Denied!')}}
@endif