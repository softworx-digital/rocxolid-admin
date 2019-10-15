<div class="text-center">
@if ($component->getOption('model')->is_contactable)
    @if ($component->getOption('model')->is_contactable_sms)
        <span class="label label-success"><i class="fa fa-envelope-square"></i> SMS</span>
    @else
        <span class="label label-default"><i class="fa fa-envelope-square"></i> SMS</span>
    @endif
    
    @if ($component->getOption('model')->is_contactable_email)
        <span class="label label-success"><i class="fa fa-at"></i> e-mail</span>
    @else
        <span class="label label-default"><i class="fa fa-at"></i> e-mail</span>
    @endif

    @if ($component->getOption('model')->is_contactable_phone)
        <span class="label label-success"><i class="fa fa-phone"></i> tel.</span>
    @else
        <span class="label label-default"><i class="fa fa-phone"></i> tel.</span>
    @endif
@else
    <span class="label label-default"><i class="fa fa-times"></i> no-contact</span>
@endif
</div>