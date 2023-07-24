<x-admin.admin-master>
    @section('content')
        <h1>Users</h1>

            @if(session()->get('message'))
               
                <div class="alert-danger col-12 mt-3 mb-3"> {{ session()->get('message') }} </div>
            @endif
        <table class="col-12 hello">
            <tr class="thead">
                <th>ID</th>
                <th>Username</th>
                <th>Name</th>
                <th>Avatar</th>
                <th>Email</th>
                <th>Created at</th>
                <th>Delete</th>
            </tr>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td><a href="{{ route('user.profile.show', $user->id) }}">{{ $user->username }}</a>
                <td>{{ $user->name}}</td>
                <td><img src="{{ $user->avatar }}" style="width:150px;height:60px"></td>
                <td>{{ $user->email}}</td>
                <td>{{ $user->created_at->diffForHumans() }}</td>
                <td>
                    <form action="{{ route('users.destroy', $user->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>

    @endsection
</x-admin.admin-master>