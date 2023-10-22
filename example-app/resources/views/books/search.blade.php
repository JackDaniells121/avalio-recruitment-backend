<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Books') }} - Search
        </h2>
    </x-slot>

    @include('books.partials.search-bar')

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 text-gray-400">
            <table class="border">
                <thead>
                <td>Name</td>
                <td>Author</td>
                <td>Description</td>
                <td>Publication Date</td>
                <td>Action</td>
                </thead>
                <tbody>
                @foreach ($books as $book)
                    <tr class="border ml-2">
                        <td>{{ $book->name }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->description }}</td>
                        <td>{{ $book->publication_date }}</td>
                        <td><a href='{{ route('books.edit', ['id' => $book->id]) }}'>edit</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
