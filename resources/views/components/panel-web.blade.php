<div>
    @if (isset($menu))
        <div>
            {{ $menu }}
        </div>
    @endif
    <div>
        {{$content}}
    </div>
    @if (isset($footer))
        <div>
            {{ $footer }}
        </div>
    @endif
</div>