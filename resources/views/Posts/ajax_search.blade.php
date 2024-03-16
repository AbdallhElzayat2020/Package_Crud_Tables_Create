<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Title Post</th>
            <th scope="col">Description Post</th>
            <th scope="col">Status</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($posts as $post)
            <tr>
                <th scope="row">{{ $post->id }}</th>
                <td>{{ $post->title }}</td>
                <td>{{ $post->description }}</td>
                <td>
                    <a class="btn btn-danger" href="{{ route('destroy', $post->id) }}">Delete</a>
                    {{-- ////////////////////////////////////////////// or ['id' => $post->id] --}}
                    <a class="btn btn-primary" href="{{ route('edit', $post->id) }}">Edit</a>
                </td>
            </tr>
        @empty
            <tr>
                <th class="text-center">Theres No Posts Comming From DB</th>
            </tr>
            {{-- <h4 class="text-center"></h4> --}}
        @endforelse

    </tbody>
</table>
