<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Books') }} - Add new book
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 text-gray-400">
            <form method="post" action="{{ route('books.store') }}" class="mt-6 space-y-6">
                @csrf
                @method('post')

                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" required autofocus />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>

                <div>
                    <x-input-label for="author" :value="__('Author')" />
                    <x-text-input id="author" name="author" type="text" class="mt-1 block w-full" required  />
                    <x-input-error class="mt-2" :messages="$errors->get('author')" />
                </div>

                <div>
                    <x-input-label for="description" :value="__('Description')" />
                    <x-text-input id="description" name="description" type="text" class="mt-1 block w-full" required  />
                    <x-input-error class="mt-2" :messages="$errors->get('description')" />
                </div>

                <div>
                    <x-input-label for="publication_date" :value="__('Publication Date')" />
                    <x-text-input id="publication_date" name="publication_date" type="text" class="mt-1 block w-full" required  />
                    <x-input-error class="mt-2" :messages="$errors->get('publication_date')" />
                </div>

                <div>
                    <x-input-label for="count" :value="__('Count')" />
                    <x-text-input id="count" name="count" type="text" class="mt-1 block w-full" required  />
                    <x-input-error class="mt-2" :messages="$errors->get('count')" />
                </div>

                <div class="flex items-center gap-4">
                    <x-primary-button>{{ __('Save') }}</x-primary-button>

                    @if (session('status') === 'book-saved')
                        <p
                            x-data="{ show: true }"
                            x-show="show"
                            x-transition
                            x-init="setTimeout(() => show = false, 2000)"
                            class="text-sm text-gray-600 dark:text-gray-400"
                        >{{ __('Saved.') }}</p>
                    @endif
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
