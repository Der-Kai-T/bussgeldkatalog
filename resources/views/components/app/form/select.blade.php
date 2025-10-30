<div>
    <label
        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="{{ $model }}">
        {{ __($label ?? $model) }}
    </label>
    <select
        class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light"
        wire:model="{{$form ?? "form"}}.{{$model}}"
    >
        <option value="">+++ bitte Option auswählen +++</option>
        @if(!isset($value_id))
            @php($value_id = "id")
        @endif
        @if(!isset($value))
            @php($value = "name")
        @endif

        @foreach($options as $o)
            <option value="{{ $o->$value_id }}">{{ $o->$value }}</option>
        @endforeach
    </select>
    @error($model)
    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
    @enderror
</div>
