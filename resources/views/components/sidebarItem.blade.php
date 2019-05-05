<li class="nav-item">
    <a class="nav-link {{ str_contains(request()->fullUrlWithQuery([]), $url) ? "active" : "" }}"
       href="{{ $url }}">
        @iconMt({{$icon}})
        <span>{{ $title }}</span>
        @if( isset($count) && $count > 0)
            <span class="badge badge-pill badge-accent">{{ $count }}</span>
        @endif
    </a>
</li>