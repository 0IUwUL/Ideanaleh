<li>Search suggestions for "{{$input}}"</li>
@foreach ($items as $title)
<li class="suggest" id = "{{$title['title']}}"><a class="text-decoration-none text-dark" href = {{url('project/view/'.$title['id'])}}>{{$title['title']}}</a></li>
@endforeach