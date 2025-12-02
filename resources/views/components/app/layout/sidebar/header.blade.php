@if(!isset($can) || Gate::check($can))
    <li {{ $attributes->class(['nav-header']) }}>
        <span class="{{$icon ?? ""}}"></span>
        {{ $text }}
    </li>
@endif
