<div class="form-check form-switch">
    <input
        class="form-check-input"
        type="checkbox"
        @if(!isset($optional))
            required
        @endif
        wire:model="{{ $form ?? "form" }}.{{$model}}"
    >
    <label class="form-check-label"> {{__($label ?? $model)}}</label>

    @error($model)
    <small class="text-danger-emphasis">{{ $message }}</small>
    @enderror
</div>
