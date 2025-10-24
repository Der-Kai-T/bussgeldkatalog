<div>
    <label
        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="{{ $model }}">
        {{ __($label ?? $model) }}
    </label>
    <input
        class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light"
        id="grid-first-name"
        type="{{ $type ?? "text" }}"
        wire:model="{{$form ?? "form"}}.{{$model}}"
    >
    @error($model)
    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
    @enderror
</div>
