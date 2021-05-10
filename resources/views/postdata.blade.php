@if(Session::get('Data'))
    @foreach($Data as $data)
    {{$data['title']}}<br>
    {{$data['body']}}<br>
    @endforeach
    @endif