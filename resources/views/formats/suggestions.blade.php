@foreach ($items as $title)
<li><a role="button" class="suggest text-decoration-none text-dark" id = "{{$title['title']}}">{{$title['title']}}</a></li>
@endforeach