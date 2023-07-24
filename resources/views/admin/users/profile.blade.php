<x-admin-master>
@section('content')

    <h1>User Profile For: {{ $user->name }}</h1>


    <div class="row">
        <div class="col-sm-6">
            <form action="{{ route('user.profile.update', $user) }}" method="post" enctype="multipart/form-data" class="w-100">
                @csrf
                @method('PUT')
                <img src="{{ $user->avatar }}" alt="" class="mb-3 mt-2">
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
                <button class="btn btn-primary" type="submit">Submit</button>
        </div>
    </div>
@endsection
</x-admin-master>