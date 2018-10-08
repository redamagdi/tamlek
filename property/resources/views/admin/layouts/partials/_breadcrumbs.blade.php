@if ($breadcrumbs)
    <div class="container">
    <ol class="breadcrumb">
        @foreach ($breadcrumbs as $breadcrumb)
            @if (!$breadcrumb->last)
                <li><a data-pjax href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>
            @else
                <li class="active">{{ $breadcrumb->title }}</li>
            @endif
        @endforeach
    </ol>
</div>
@endif