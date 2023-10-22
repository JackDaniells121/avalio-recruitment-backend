<!-- search -->
<div class="py-2">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 text-white underline">
        <form method="post" action="{{ route('books.search') }}" class="mt-6 space-y-6">
            @csrf
            @method('post')

            <div>
                <x-input-label for="name" />
                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" required autofocus />
            </div>
            <x-primary-button>{{ __('Search') }}</x-primary-button>
        </form>
    </div>
</div>
