@if(!isset($can) || Gate::check($can))
    <li {{ $attributes->class(['nav-item']) }}>
        <a href="{{ route($route) }}" class="nav-link {{ request()->routeIs($route."*") ? "active" : ""}}" wire:navigate>
            <i class="nav-icon {{ $icon }}"></i>
            <p>
                {{ $text }}
                @if(isset($badge))
                    <span class="nav-badge badge {{ $badgeColor ?? "text-bg-danger"}}  me-3">{{ $badge }}</span>
                @endif
            </p>
        </a>
    </li>
@endif
