<div class="media">
    <div class="media-left">
        <div class="media-icon">
            <i class="fa fa-btn fa-{{ $object['icon'] }}"></i>
        </div>
    </div>
    <div class="media-body">
        <h4 class="media-heading">
            <a href="{{ url($object['url']) }}">
                {{ $object['label'] }}
            </a>
        </h4>
        {{ @$object['desc'] }}
    </div>
</div>