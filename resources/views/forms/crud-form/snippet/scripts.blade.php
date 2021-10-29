@if ($component->hasOption('scripts'))
@push('script')
    @foreach ($component->getOption('scripts') as $script)
        {{ Html::script(asset(sprintf('assets/js/%s?%s', $script, time()))) }}
    @endforeach
@endpush
@endif