@props([
    'title' => null,
    'value' => null,
    'subtitle' => null,
    'icon' => null,
])

<article {{ $attributes->merge(['class' => 'vk-stat-card']) }}>
    @if ($icon)
        <span class="vk-stat-icon"><i class="bi {{ $icon }}"></i></span>
    @endif
    <div>
        @if ($title)
            <small class="text-muted d-block">{{ $title }}</small>
        @endif
        @if ($value !== null)
            <h3 class="mb-0 fw-bold">{{ $value }}</h3>
        @endif
        @if ($subtitle)
            <small class="text-muted">{{ $subtitle }}</small>
        @endif
        {{ $slot }}
    </div>
</article>
