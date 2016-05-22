<div style ="color:grey;">Hello
@foreach ($email as $post)
{{$post->business}}
</br></br>
You have had {{$post->items}} item(s) delivered today and are awaiting collection.
</br></br>
Thank You</br>
Office Flex
</br></br>
Message sent at {{$post->created_at}}
@endforeach
</div>