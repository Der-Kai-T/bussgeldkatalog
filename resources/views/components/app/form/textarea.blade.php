<div>
    <label
        class="form-label" for="{{$form ?? "form"}}.{{$model}}">
        {{ __($label ?? $model) }}
    </label>
    <textarea
        class="form-control"
        id="{{$form ?? "form"}}.{{$model}}"
        wire:model="{{$form ?? "form"}}.{{$model}}"
    ></textarea>
    @if(isset($help))
        <div id="{{$form ?? "form"}}.{{$model}}.help" class="form-text">
            {{ $help }}
        </div>
    @endif
    @error($model)
    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
    @enderror
</div>
