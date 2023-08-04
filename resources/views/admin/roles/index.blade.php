<x-admin.admin-master>
    @section('content')
    @if(session()->get('message'))
        <div class="{{ session()->get('alert-class')}} col-12 mt-4 mb-4">
            {{ session()->get('message')}}
        </div>
    @endif
        <div class="row">
            <div class="col-sm-4">

                <form action="{{ route('roles.store') }}" method="POST">
                    @csrf
                    @method('POST')

                    <div class="form-group">
                        <label for="name ">Name: </label>
                        <input type="text" id="name" class="form-control" name="name">
                        @error('name')
                            <span><strong>{{ $message }}</strong></span>
                        @enderror
                        <button class="btn btn-info btn-block mt-4" type="submit">Create</button>
                    </div>
                </form>

            </div>
            <div class="col-sm-8"> 
                <table class="hello  w-100">
                    <tr class="thead">
                        <th>Id</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Delete</th>
                    </tr>
                    @foreach ($roles as $role)
                    <tr>
                       <td>{{ $role->id }}</td>
                       <td><a href="{{ route('roles.edit', $role->id) }}">{{ $role->name }}</a></td>
                       <td>{{ $role->slug }}</td>
                       <td>
                        <form action="{{ route('roles.destroy', $role->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    @endsection
</x-admin.admin-master>
