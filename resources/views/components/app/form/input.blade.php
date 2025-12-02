<div class="mb-3">
    <label
        class="form-label" for="{{$form ?? "form"}}.{{$model}}">
        {{ __($label ?? $model) }}
    </label>
    <input
        class="form-control"
        type="{{ $type ?? "text" }}"
        wire:model="{{$form ?? "form"}}.{{$model}}"
        id="{{$form ?? "form"}}.{{$model}}"
    >
    @if(isset($help))
        <div id="{{$form ?? "form"}}.{{$model}}.help" class="form-text">
            {{ $help }}
        </div>
    @endif
    @error($model)
        <p class="mt-2 text-sm text-danger-emphasis">{{ $message }}</p>
    @enderror
</div>

