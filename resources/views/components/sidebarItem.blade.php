<li class="nav-item">
    <a class="nav-link {{ str_contains(request()->fullUrlWithQuery([]), $url) ? "active" : "" }}"
       href="{{ $url }}">
        <i class="material-icons">{{$icon}}</i>
        <span>{{ $title }}</span>
        @if( isset($count) && $count > 0)
            <span class="badge badge-pill badge-primary">{{ $count }}</span>
        @endif
    </a>
</li>