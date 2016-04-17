<div class="media">
    <div class="media-left">
        <div class="media-object">
            <i class="fa fa-{{ $object['icon'] }}"></i>
        </div>
    </div>
    <div class="media-body">
        <h4 class="media-heading">
            <a href="{{ url($object['url']) }}">
                {{ $object['title'] }}
            </a>
        </h4>
        <p>
            {{ $object['desc'] }}
        </p>
    </div>
</div>