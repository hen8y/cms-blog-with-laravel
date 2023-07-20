<x-admin-master>
    @section('content')

       <div class="col-7">
            <h1>All Posts</h1>
        </div> 
        <div class="col-5">
            <a href="{{ route('post.create') }}" class="btn btn-info btn-lg">Create a Post</a>
        </div>
        <br>
        @if (session()->get('message'))
            
            <div class="alert {{ session()->get('alert-class') }} col-10 mt-3">{{ session()->get('message') }}</div>
        @endif
        <div class="row mt-5">
            <table class="col-12 hello">
                    <tr class="thead">
                        <th>ID</th>
                        <th>Owner</th>
                        <th>Post Title</th>
                        <th>Post Image</th>
                        <th >Created at</th>
                        <th >Updated at</th>
                        <th >Edit Post</th>
                    </tr>
                    @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->user->name }}</td>
                        <td>{{ Str::limit($post->title, '20' )}}</td>
                        <td><img src="{{ $post->post_image }}" style="width:150px;height:60px"></td>
                        <td>{{ $post->created_at->diffForHumans() }}</td>
                        <td>{{ $post->updated_at->diffForHumans() }}</td>
                        <td class="divide">
                            @can('view', $post)
                            <a href="{{ route('post.edit',$post->id)}}" class="btn btn-info">Edit</a>

                            <form action="{{ route('post.destroy', $post->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>

                            @endcan
                        </td>
                            
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    @endsection

</x-admin-master>