@if (Auth::user()->utype === 'ADM')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <center>
    <div class="col-md-10">
    <!-- @include('message') -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                
         <h1 style="font-size:40px;">User-List</h1>
    <!-- have to check error for list user -->
    <a href="admin/dashboard" class="btn btn-success">Back to Dashboard</a> 
         <table class="table table-bordered col-md-8" style="text-align: center;">
            <tbody>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Email Verification</th>
                    <th>User Type</th>
                    <th>Action</th>
                </tr>
                @foreach($userlist as $user_list)
                <tr>
                    <td>{{$user_list['name']}}</td>
                    <td>{{$user_list['email']}}</td>
                    <td>
                    {{$user_list['email_verified_at']}}
                    </td>
                    <td>{{$user_list['utype']}}</td>
                    <!-- <td><a class="btn btn-success" href="/admin/edit/{{$user_list['id']}}">Update</a></td> -->
                    <td><a class="btn btn-danger" href="{{route('destroy.user')/$user_list['id']}}">Delete</a></td>
                <tr>
                    @endforeach
            </tbody>
        </table>
        </center>
            </div>
        </div>
    </div>
</x-admin-layout>
@else
{{Session::flush()}}
<script>
    window.location = "/login";
</script>
{{session()->flash('error','Access Denied!')}}
@endif