<x-admin.admin-master>
    @section('content')
        <h1 class="col-12 mb-5">Create Post</h1>

                <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data" class="w-100">
                    @csrf
                    <div class="form-group">
                        <label for="title" class=" form-control-label">Title</label>
                            <input  type="text" 
                                    id="title" 
                                    name="title" 
                                    placeholder="Enter title" 
                                    class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="post_image" class=" form-control-label">File</label>
                            <input  type="file" 
                                    id="post_image" 
                                    name="post_image" 
                                    class="form-control-file">
                    </div>
                    <div class="form-group">
                        <textarea   name="body" 
                                    id="body" 
                                    cols="30" 
                                    rows="10" 
                                    class="form-control"></textarea>
                    </div>
                    <button class="btn btn-primary">Submit</button>
                </form>
    @endsection
</x-admin.admin-master>