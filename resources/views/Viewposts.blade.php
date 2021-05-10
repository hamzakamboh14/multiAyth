<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<center>
        <h1 style="font-size:100px">Hello {{Auth::user()->name}}</h1>
        <div class="col-md-4">
            @include('message')
        </div>
            <table class="table table-bordered col-md-10" style="text-align: center;">
            <tbody>
            
                <tr>
                    <th>Title</th>
                    <th>Body</th>
                    <th >Images</th>
                    <th colspan='2'>Action</th>
                </tr>
                @foreach($post as $data)
               
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
                    <!-- <td><a class="btn btn-success" href="/edit/">Update</a></td> -->
                   @can('delete', $post)
                    <td>
                    <form method="post" action="{{route('store.posts')/$data['id']}}">
                        @csrf
                        @method('delete')
                   <button type="submit" class="btn btn-danger" >Delete</button>
                    </form>
                    </td>
                    @endcan
                <tr>
                  
                    @endforeach
            </tbody>
        </table>
        <div class="row">
        <div class="offset-md-4">
        <center>
        
        </center>
        </div>
       </div>
</body>
</html>