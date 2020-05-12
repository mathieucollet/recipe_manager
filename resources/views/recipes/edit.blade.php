<form action="{{$recipe->path()}}" method="post">
    @method('patch')
    @csrf
</form>