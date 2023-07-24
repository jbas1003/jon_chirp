<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('chirps.update', $chirp) }}">
            @csrf
            @method('patch')
            <textarea
                name="message"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('message', $chirp->message) }}</textarea>
            <x-input-error :messages="$errors->get('message')" class="mt-2" />
            <div class="mt-4 space-x-2" style="display: flex">
                <x-primary-button style="display:flex; background-color: white; color: black; border-color:rgb(5, 192, 30); border-width: 3px;">
                    <img style="width: 20px; height: 20px;" src="/images/save.png" alt="">
                    {{ __('Save') }}
                </x-primary-button >
                <x-primary-button style="display:flex; background-color: white; color: black; border-color:rgb(214, 1, 1); border-width: 3px;">
                    <img style="width: 20px; height: 20px;" src="/images/cancel.png" alt="">
                    <a href="{{ route('chirps.index') }}">{{ __('Cancel') }}</a>
                </x-primary-button >
            </div>
        </form>
    </div>
</x-app-layout>