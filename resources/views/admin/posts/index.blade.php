<x-admin-master>
    @section('content')

        <h1>All Posts</h1>
       
        <div class="table-responsive m-b-40 mt-5">
            <table class="table table-data3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Owner</th>
                        <th>Post Title</th>
                        <th>Post Image</th>
                        <th >Created at</th>
                        <th >Updated at</th>
                        <th >Edit Post</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($outputs as $output)
                    <tr>
                        <td>{{ $output->id }}</td>
                        <td>{{ $output->user->name }}</td>
                        <td>{{ $output->title }}</td>
                        <td><img src="{{ $output->post_image }}" style="width:150px"></td>
                        <td>{{ $output->created_at->diffForHumans() }}</td>
                        <td>{{ $output->updated_at->diffForHumans() }}</td>
                        <td><a href="" class="btn btn-priamry">Edit Post</a></td>
                            
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    @endsection

</x-admin-master>