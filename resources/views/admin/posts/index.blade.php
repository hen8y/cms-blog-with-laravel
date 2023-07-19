<x-admin-master>
    @section('content')

        <h1>All Posts</h1>
       
        <div class="table-responsive m-b-40 mt-5">
            <table class="table table-borderless table-data3">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Post Title</th>
                        <th>Post Image</th>
                        <th class="text-right">Post Content</th>
                        <th class="text-right">Date Created</th>
                        <th class="text-right">Edit Post</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($outputs as $output)
                    <tr>
                        <td>{{ $output->user_id }}</td>
                        <td>{{ $output->title }}</td>
                        <td><img src="{{ $output->post_image }}" style="width:150px"></td>
                        <td>{{ Str::limit($output->body, '50', '') }}</td>
                        <td>{{ $output->created_at }}</td>
                        <td><a href="" class="btn btn-priamry">Edit Post</a></td>
                            
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    @endsection

</x-admin-master>