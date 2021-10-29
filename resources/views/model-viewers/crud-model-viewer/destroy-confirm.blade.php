<div class="x_panel ajax-overlay">
    {!! $component->render('include.header') !!}

    {{ Form::open([ 'url' => $component->getController()->getRoute('destroy', $component->getModel()) ]) }}
        {{ Form::hidden('_method', 'DELETE') }}
    @if (request()->has('_data.relation'))
        {{ Form::hidden('_data[relation]', collect(request()->get('_data'))->get('relation')) }}
    @endif
    @if (request()->has('_data.model_attribute'))
        {{ Form::hidden('_data[model_attribute]', collect(request()->get('_data'))->get('model_attribute')) }}
    @endif
    @if (request()->has('_data.model_type'))
        {{ Form::hidden('_data[model_type]', collect(request()->get('_data'))->get('model_type')) }}
    @endif
    @if (request()->has('_data.model_id'))
        {{ Form::hidden('_data[model_id]', collect(request()->get('_data'))->get('model_id')) }}
    @endif
        <div class="x_content">
            {!! $component->render('include.destroy-confirm-question') !!}
        </div>

        <div class="x_footer">
            <a class="btn btn-default" href="{{ $component->getController()->getRoute('index') }}"><i class="fa fa-chevron-left margin-right-10"></i>{{ $component->translate('button.back') }}</a>
            <button type="submit" class="btn btn-danger pull-right"><i class="fa fa-trash margin-right-10"></i>{{ $component->translate('button.delete') }}</button>
        </div>
    {{ Form::close() }}
</div>