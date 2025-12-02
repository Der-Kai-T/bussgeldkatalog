<div>
    <label
        class="form-label" for="{{ $model }}">
        {{ __($label ?? $model) }}
    </label>
    <select
        class="form-control"
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
