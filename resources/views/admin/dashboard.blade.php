<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-nav></x-nav>
                <center>
                <div class="col-md-4">
            <!-- @include('message') -->
        </div>
        <a href="{{route('get.admin')}}" class="btn btn-success">View List</a> <a href="{{route('list.user')}}" class="btn btn-success">Veiw Users</a> 
        <br>
        <table class="table table-bordered col-md-8" style="text-align: center;">
            @if(session()->has('Data'))
            <tbody>
                <tr>
                    <th>Title</th>
                    <th>Body</th>
                    <th>Images</th>
                    <th>Action</th>
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
                    <!-- <td><a class="btn btn-success" href="/admin/edit/{{$data['id']}}">Update</a></td> -->
                    <td><a class="btn btn-danger" href="={{route('destroy.admin')/$data['id']}}">Delete</a></td>
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
        <!-- @if(session()->has('post'))
        <div class="col-md-6">   
            <form method="Post" action="/admin/update/{{Session::get('post')->id}}">
            <h1 style="font-size:50px;margin-bottom:10px;">Update Record</h1>
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control"  placeholder="Title" name="title" value="{{Session::get('post')->title}}">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control"  rows="3" placeholder="Body" name="body" value="{{Session::get('post')->body}}">
                </div>
                <div class="form-group">
                    <input type="submit" class="form-control btn btn-success" value="submit" rows="3">
                </div>
            </form>
            </div>
            @else -->
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
            </div>
        </div>
    </div>
</x-admin-layout>
