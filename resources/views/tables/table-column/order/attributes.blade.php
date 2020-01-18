{{-- status --}}
@if ($component->getOption('model')->isStatus('new'))
    <i class="fa fa-star text-warning fa-2x" title="Nová"></i>
@elseif ($component->getOption('model')->isStatus('processing'))
    <i class="fa fa-hourglass-half text-primary fa-2x" title="Potvrdená"></i>
@elseif ($component->getOption('model')->isStatus('paid'))
    <i class="fa fa-dollar text-success fa-2x" title="Zaplatená"></i>
@elseif ($component->getOption('model')->isStatus('completed'))
    <i class="fa fa-check-square-o text-success fa-2x" title="Vybavená"></i>
@elseif ($component->getOption('model')->isStatus('cancelled'))
    <i class="fa fa-meh-o text-muted fa-2x" title="Stornovaná"></i>
@else
    <i class="fa fa-question text-danger fa-2x" title="Neznámy stav"></i>
@endif
{{-- delivery --}}
@if ($component->getOption('model')->delivery()->exists())
    @if ($component->getOption('model')->delivery->isCode('slovenska-posta'))
        <i class="fa fa-envelope text-info fa-2x" title="{{ $component->getOption('model')->delivery->getTitle() }}"></i>
    @elseif ($component->getOption('model')->delivery->isCode('slovenska-posta'))
        <i class="fa fa-envelope text-info fa-2x" title="{{ $component->getOption('model')->delivery->getTitle() }}"></i>
    @elseif ($component->getOption('model')->delivery->isCode('balikomat'))
        <i class="fa fa-gift text-info fa-2x" title="{{ $component->getOption('model')->delivery->getTitle() }}"></i>
    @elseif ($component->getOption('model')->delivery->isCode('kurier-ups'))
        <i class="fa fa-truck text-info fa-2x" title="{{ $component->getOption('model')->delivery->getTitle() }}"></i>
    @elseif ($component->getOption('model')->delivery->isCode('parcelshop'))
        <i class="fa fa-building-o text-info fa-2x" title="{{ $component->getOption('model')->delivery->getTitle() }}"></i>
    @elseif ($component->getOption('model')->delivery->isCode('ceska-posta')) <!-- cz -->
        <i class="fa fa-envelope text-info fa-2x" title="{{ $component->getOption('model')->delivery->getTitle() }}"></i>
    @elseif ($component->getOption('model')->delivery->isCode('ceska-posta-napostu')) <!-- cz -->
        <i class="fa fa-envelope text-info fa-2x" title="{{ $component->getOption('model')->delivery->getTitle() }}"></i>
    @elseif ($component->getOption('model')->delivery->isCode('ceska-posta-do-ruky')) <!-- cz -->
        <i class="fa fa-envelope text-info fa-2x" title="{{ $component->getOption('model')->delivery->getTitle() }}"></i>
    @elseif ($component->getOption('model')->delivery->isCode('kuryr-ppl')) <!-- cz -->
        <i class="fa fa-truck text-info fa-2x" title="{{ $component->getOption('model')->delivery->getTitle() }}"></i>
    @elseif ($component->getOption('model')->delivery->isCode('kuryr-intime')) <!-- cz -->
        <i class="fa fa-truck text-info fa-2x" title="{{ $component->getOption('model')->delivery->getTitle() }}"></i>
    @elseif ($component->getOption('model')->delivery->isCode('kurier-gls'))
        <i class="fa fa-truck text-info fa-2x" title="{{ $component->getOption('model')->delivery->getTitle() }}"></i>
    {{--
    @if ($component->getOption('model')->delivery->deliveryMethod()->exists())
        <img style="max-width: {{ $component->getOption('model')->delivery->deliveryMethod->getImageSize('icon')->width }}px;" src="{!! $component->getOption('model')->delivery->deliveryMethod->image->getControllerRoute('get', [ 'size' => 'icon' ]) !!}" title="{{ $component->getOption('model')->delivery->getTitle() }}"/>
        <img style="max-width: {{ $component->getOption('model')->delivery->deliveryMethod->getImageSize('image', 'icon')->width }}px;" src="{{ asset($component->getModel()->delivery->deliveryMethod->image->getPath('icon')) }}" alt="{{ $component->getOption('model')->delivery->deliveryMethod->image->alt }}"/>
    --}}
    @else
        <i class="fa fa-question text-danger fa-2x" title="Neznámy spôsob doručenia"></i>
    @endif
@else
    <i class="fa fa-exclamation-triangle text-danger fa-2x" title="Nedefinovaný spôsob doručenia"></i>
@endif
{{-- payment --}}
@if ($component->getOption('model')->payment()->exists())
    {{--
    @if ($component->getOption('model')->payment->isCode('dobierka'))
        <i class="fa fa-money text-info fa-2x" title="{{ $component->getOption('model')->payment->getTitle() }}"></i>
    @elseif ($component->getOption('model')->payment->isCode('prevod'))
        <i class="fa fa-credit-card text-info fa-2x" title="{{ $component->getOption('model')->payment->getTitle() }}"></i>
    {{--
        cez asset
    @if ($component->getOption('model')->payment->paymentMethod()->exists())
        <img style="max-width: {{ $component->getOption('model')->payment->paymentMethod->getImageSize('icon')->width }}px;" src="{!! $component->getOption('model')->payment->paymentMethod->image->getControllerRoute('get', [ 'size' => 'icon' ]) !!}" title="{{ $component->getOption('model')->delivery->getTitle() }}"/>
        <img style="max-width: {{ $component->getOption('model')->payment->paymentMethod->getImageSize('image', 'icon')->width }}px;" src="{{ asset($component->getModel()->payment->paymentMethod->image->getPath('icon')) }}" alt="{{ $component->getOption('model')->delivery->deliveryMethod->image->alt }}"/>
    --}}
    @if ($component->getOption('model')->payment->paymentMethod()->exists())
        <i class="fa @if ($component->getOption('model')->payment->paymentMethod->is_electronic) fa-credit-card @else fa-money @endif text-info fa-2x" title="{{ $component->getOption('model')->payment->paymentMethod->getTitle() }}"></i>
    @else
        <i class="fa fa-question text-danger fa-2x" title="Neznámy spôsob platby"></i>
    @endif
@else
    <i class="fa fa-exclamation-triangle text-danger fa-2x" title="Nedefinovaný spôsob platby"></i>
@endif
{{-- origin --}}
@if ($component->getOption('model')->isOrigin('itcall'))
    <i class="fa fa-phone text-info fa-2x" title="IT Call"></i>
@elseif ($component->getOption('model')->isOrigin('old'))
    <i class="fa fa-archive text-info fa-2x" title="Starý e-shop"></i>
@elseif ($component->getOption('model')->isOrigin('old-cz'))
    <i class="fa fa-archive text-info fa-2x" title="Starý e-shop - CZ"></i>
@elseif ($component->getOption('model')->isOrigin('web'))
    <i class="fa fa-shopping-cart text-info fa-2x" title="e-shop"></i>
@elseif ($component->getOption('model')->isOrigin('manual'))
    <i class="fa fa-hand-rock-o text-info fa-2x" title="Manuálna"></i>
@else
    <i class="fa fa-question text-danger fa-2x" title="Neznámy zdroj"></i>
@endif