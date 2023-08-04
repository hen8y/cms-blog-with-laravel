<x-admin.admin-master>
    @section('content')

    <h1>Edit Roles - {{ $role->name }}</h1>
    @if(session()->get('message'))
        <div class="col-10 alert alert-success m-3">
            {{ session()->get('message') }}
        </div>
    @endif
    <div class="col-sm-6">
        <form action="{{ route('roles.update', $role->id)}}" method="post" enctype="multipart/form-data" class="w-100 col-12">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name" class=" form-control-label">Name</label>
                    <input  type="text"
                            id="name"
                            name="name"
                            class="form-control"
                            value="{{ $role->name }}"
                            >
            </div>
            <button class="btn btn-primary">Submit</button>
        </form>
    </div>

    <div class="row">
        @if ($permissions->isNotEmpty()) 
            <div class="col-lg-12">
                <table class="col-12 hello mt-5">
                    <tr class="thead">
                        <th>Options</th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Delete</th>
                    </tr>
                    @foreach ($permissions as $permission)
                    <tr>
                        <td><input type="checkbox" 
                            @foreach ($role->permissions as $role_permission)
                                @if($role_permission->slug == $permission->slug )
                                    checked
                                @endif
                            @endforeach
                            >
                        </td>
                        <td>{{ $permission->id }}</td>
                        <td>{{ $permission->name }}</td>
                        <td>{{ $permission->slug}}</td>
                        <td>
                            <form action="{{ route('post.destroy', $permission->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                        <td>
                            <form  method="post" action="{{ route('role.permission.attach', $role) }}">
                                @method('PUT')
                                @csrf
                                <input type="text" name="permission" value="{{ $permission->id }}">
                                <button class="btn btn-info"
                                        @if($role->permissions->contains($permission))
                                            disabled
                                        @endif
                                >Attach</button>
                            </form>
                        </td>
                        <td>
                            <form  method="post" action="{{ route('role.permission.detach', $role) }}">
                                @method('PUT')
                                @csrf
                                <input type="hidden" name="permission" value="{{ $permission->id }}">
                                <button 
                                        @if(!$role->permissions->contains($permission))
                                            disabled
                                        @endif
                                    class="btn btn-danger">Detach</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        @endif
    </div>
    @endsection
</x-admin.admin-master>
