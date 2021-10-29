@can ('view', $component->getModel())
<div id="{{ $component->getDomId(sprintf('panel.%s', 'rating')) }}" class="panel panel-{{ $class ?? 'default' }}">
    <div class="panel-heading">
        <h3 class="panel-title">{{ $component->translate(sprintf('panel.%s.heading', 'rating')) }}</h3>
    </div>
    <div class="panel-body padding-3">
        <div class="row">
            <div class="{{ isset($component->getModel()->rating_data_processed) ? 'col-lg-5 col-md-6' : '' }} col-xs-12">
                <div class="jumbotron padding-0 padding-top-10 padding-bottom-10 margin-0 text-center">
                    <h1 class="text-center">{{ round($component->getModel()->getRating(), 2) }}</h1>
                    <span>{{ $component->getModel()->getRatingCount() }}&times;</span>
                </div>
            </div>
        @if (isset($component->getModel()->rating_data_processed))
            <div class="col-lg-7 col-md-6 col-xs-12">
            @foreach ($component->getModel()->rating_data_processed ?? [] as $rating)
                <h5>{{ $rating->title }} <span class="badge">{{ $rating->rating }}</span></h5>
                <ul class="list-inline">@foreach (collect($rating->tags) as $tag)<li><span class="label label-default">{{ $tag->title }}</span></li>@endforeach</ul>
            @endforeach
            </div>
        @endif
        </div>
    </div>
</div>
@endcan