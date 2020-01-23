<pre class="bg-danger">
Cannot find view <b>[{{ $e->getViewName() }}]</b> for component <b>[{{ get_class($e->getComponent()) }}]</b>

Searched in:
<ul>
@foreach ($e->getSearchPaths() as $path)
<li>{{ $path }}</li>
@endforeach
</ul>
</pre>