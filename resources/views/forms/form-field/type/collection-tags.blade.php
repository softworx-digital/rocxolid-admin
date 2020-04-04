<div class="control-group">
@if ($component->getFormField()->isArray())
    {!! Form::text($component->getFormField()->getFieldName($index), $component->getFormField()->getFieldValue($index), $component->getOption('attributes')) !!}
@else
    {!! Form::text($component->getFormField()->getFieldName(), $component->getFormField()->getFieldValue(), $component->setOption('attributes.id', $component->getDomIdHash('tagsinput', $component->getFormField()->getFieldName()))->getOption('attributes')) !!}
@endif
</div>

<input id="programme" name="asdas"/>

{{-- @todo: what's this? --}}
@push('script')
<script type="text/javascript">
$(function() {
    var bloodhounddata = bloodhounddata || {};

    bloodhounddata._{{ md5($component->getDomId($component->getFormField()->getFieldName())) }} = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('text'),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        remote: {
            url: 'https://raw.githubusercontent.com/bootstrap-tagsinput/bootstrap-tagsinput/master/examples/assets/cities.json',
            limit: 20
        }
        //prefetch: 'https://raw.githubusercontent.com/bootstrap-tagsinput/bootstrap-tagsinput/master/examples/assets/cities.json'
    });
    bloodhounddata._{{ md5($component->getDomId($component->getFormField()->getFieldName())) }}.initialize();

    var $e = $('input#programme');

    $e.tagsinput({
        itemValue: 'value',
        itemText: 'text',
        typeaheadjs: {
            name: 'cities',
            displayKey: 'text',
            source: bloodhounddata._{{ md5($component->getDomId($component->getFormField()->getFieldName())) }}.ttAdapter()
        }
    });
});
</script>
@endpush