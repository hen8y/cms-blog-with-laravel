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
        <div class=" mt-5">
            <table class=" hello">
                    <tr class="thead">
                        <th>ID</th>
                        <th>Owner</th>
                        <th>Post Title</th>
                        <th>Post Image</th>
                        <th >Created at</th>
                        <th >Updated at</th>
                        <th >Edit Post</th>
                    </tr>
                    @foreach ($outputs as $output)
                    <tr>
                        <td>{{ $output->id }}</td>
                        <td>{{ $output->user->name }}</td>
                        <td>{{ Str::limit($output->title, '20' )}}</td>
                        <td><img src="{{ $output->post_image }}" style="width:150px;height:60px"></td>
                        <td>{{ $output->created_at->diffForHumans() }}</td>
                        <td>{{ $output->updated_at->diffForHumans() }}</td>
                        <td class="divide">
                            <a href="{{ route('post.edit',$output->id)}}" class="btn btn-info">Edit</a>
                            
                            <form action="{{ route('post.destroy', $output->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                            
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    @endsection

</x-admin-master>