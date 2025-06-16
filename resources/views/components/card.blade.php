<div class="card card-outline card-{{ $variant ?? 'primary' }}">

    @if (isset($title) || isset($heading))
    <div class="card-header">
        <h3 class="card-title">{{ $title ?? '' }}</h3>
        {{ $heading ?? '' }}
    </div>
    @endif


    <div class="card-body">{{ $slot }}</div>
    <!-- /.card-body -->
</div>
