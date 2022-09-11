<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit a task') }}
        </h2>
    </x-slot>
    <x-tasks-card>
        <!-- Erreurs de validation -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <!-- Message de réussite -->
        @if (session()->has('message'))
            <div class="mt-3 mb-4 list-disc list-inside text-sm text-green-600">
                {{ session('message') }}
            </div>
        @endif
        <form action="{{ route('tasks.update', $task->id) }}" method="post">
            @csrf
            @method('put')
            <!-- Titre -->
            <div>
                <x-label for="title" :value="__('Title')" />
                <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title', $task->title)" required autofocus />
            </div>
            <!-- Détail -->
            <div class="mt-4">
                <x-label for="detail" :value="__('Detail')" />
                <x-textarea class="block mt-1 w-full" id="detail" name="detail"> {{ old('detail', $task->detail) }} </x-textarea>
            </div>
            <!-- Tâche accomplie -->
            <div class="block mt-4">
                <label for="state" class="inline-flex items-center">
                        <input id="state" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm 
                        focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="state" 
                        @if(old('state', $task->state)) checked 
                        @endif>
                    <span class="ml-2 text-sm text-gray-600">{{ __('Task done') }} </span>
                </label>
            </div>
            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-3">
                    {{ __('Send') }}
                </x-button>
            </div>
        </form>
    </x-tasks-card>
</x-app-layout>