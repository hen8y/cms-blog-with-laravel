<x-admin-master>
    @section('content')
        <h1>Users</h1>


        <table class="col-12 hello">
            <tr class="thead">
                <th>ID</th>
                <th>Username</th>
                <th>Name</th>
                <th>Avatar</th>
                <th>Email</th>
                <th>Created at</th>
            </tr>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->name}}</td>
                <td><img src="{{ $user->avatar }}" style="width:150px;height:60px"></td>
                <td>{{ $user->email}}</td>
                <td>{{ $user->created_at->diffForHumans() }}</td>
            </tr>
            @endforeach
        </table>

    @endsection
</x-admin-master>