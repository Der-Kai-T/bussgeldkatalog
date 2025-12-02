<button {{ $attributes->class(['btn btn-secondary']) }}
        wire:click="abortForm"
        type="button"
>
    <span class="fas fa-times-circle"></span>
    {{ __("Abort") }}
</button>
<button class="btn btn-primary float-end"
        type="submit"
>
    <span class="fas fa-save"></span>
    {{ __("Save") }}
</button>
