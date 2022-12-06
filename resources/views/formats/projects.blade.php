@foreach($items as $category => $content)
    <div class = "Category_header">
        <h3>{{$category}}</h3>
        <hr class = "create">
        <div class = "content">
            @foreach($content as $item)
                <span class = "list_category">{{$item['title']}}<input type="checkbox" name="Followed[]" class="form-check-input btn_follow" value = {{$item['id']}}></span>
            @endforeach
        </div>
    </div>
@endforeach