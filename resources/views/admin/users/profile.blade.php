<x-admin.admin-master>
@section('content')

    <h1>User Profile For: {{ $user->name }}</h1>


    <div class="row">
        <div class="col-sm-6">
            <form action="{{ route('user.profile.update', $user) }}" method="post" enctype="multipart/form-data" class="w-100">
                @csrf
                @method('PUT')
                <img src="{{ $user->avatar }}" style="height: 160px" alt="" class="mb-3 mt-2">
                <div class="form-group">
                    <input type="file" name="avatar" id="">
                </div>
                <div class="form-group">
                    <label for="name" class=" form-control-label">Name: </label>
                        <input  type="text" 
                                id="name" 
                                name="name" 
                                class="form-control @error('name') is-invalid @enderror"
                                value="{{ $user->name }}"
                        >
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                </div>

                <div class="form-group">
                    <label for="username" class=" form-control-label">Username: </label>
                        <input  type="text" 
                                id="username" 
                                name="username" 
                                class="form-control @error('username') is-invalid @enderror"
                                value="{{ $user->username }}"
                        >
                        @error('username')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                </div>

                <div class="form-group">
                    <label for="email" class=" form-control-label">Email</label>
                        <input  type="email" 
                                id="email" 
                                name="email" 
                                class="form-control @error('email') is-invalid @enderror"
                                value="{{ $user->email }}"
                        >
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                </div>

                <div class="form-group">
                    <label for="password" class=" form-control-label">Password</label>
                        <input  type="password" 
                                id="password" 
                                name="password" 
                                class="form-control"
                        >
                </div>
                @error('password')
                    <div class="alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="password-confirmation" class=" form-control-label">Confirm Password</label>
                        <input  type="password" 
                                id="password_confirmation" 
                                name="password-confirmation" 
                                class="form-control"
                        >

                        @error('password-confirmation')
                            <div class="alert-danger">{{ $message }}</div>
                        @enderror
                </div>
                <button class="btn btn-primary" type="submit">Update</button>
        </div>
    </div>
    <div class="row ">
        <table class="col-12 hello mt-5 mb-5">
            <tr class="thead">
                <th>Options</th>
                <th>Id</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Attach</th>
                <th>Detach</th>
            </tr>
            @foreach ($roles as $role)
            <tr>
                <td><input type="checkbox" 
                            @foreach ($user->roles as $u_role)
                                @if($u_role->slug == $role->slug )
                                    checked
                                @endif
                            @endforeach
                    >
                </td>
                <td>{{ $role->id }}</td>
                <td>{{ $role->name}}</td>
                <td>{{ $role->slug }}</td>
                <td>
                    <form  method="post" action="{{ route('user.role.attach', $user) }}">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="role" value="{{ $role->id }}">
                        <button class="btn btn-info"
                                @if($user->roles->contains($role))
                                    disabled
                                @endif
                        >Attach</button>
                    </form>
                </td>
                <td>
                    <form  method="post" action="{{ route('user.role.detach', $user) }}">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="role" value="{{ $role->id }}">
                        <button 
                                @if(!$user->roles->contains($role))
                                    disabled
                                @endif
                            class="btn btn-danger">Detach</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection
</x-admin.admin-master>