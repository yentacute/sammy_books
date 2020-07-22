
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action ="{{route('admin.upload')}}" method ="post" enctype="multipart/form-data">
    @csrf
    <input type="text" name="name">
    <input type="file" name="image">
    <input type="date" name="creat_at">
    <select name="publisher_id" id="">
        @foreach ($join as $item)
    <option value="{{$item->publisher_id}}">{{$item->publisher_name}}</option>
        @endforeach
    </select>
    <button>save</button>


</form>
