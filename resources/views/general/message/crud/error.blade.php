<div class="alert alert-danger alert-dismissible fade in" data-timeout-remove="2000" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="fa fa-close"></i></span></button>
    <ul class="errors">
    @foreach ($errors->all() as $error)
        <li>{!! $error !!}</li>
    @endforeach
    </ul>
</div>