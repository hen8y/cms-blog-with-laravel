<x-admin.admin-master>
@section('content')
    @if(auth()->user()->userHasRole('Admin'))
        
        <h1 class="h3 mb-4">Dashboard</h1>

    @endif

@endsection

</x-admin.admin-master>