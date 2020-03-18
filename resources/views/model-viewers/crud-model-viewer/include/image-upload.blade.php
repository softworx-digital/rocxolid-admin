{{-- @todo: not used (or make it not used & delete) --}}
<div class="alert alert-danger">Do ot use this template {{ $view_name }}</div>
@if (false)
{!! $component->getController()->getImageUploadFormComponent()->render('upload', [ 'attribute' => $attribute, 'relation' => $relation, 'related' => $related ]) !!}
@endif