<h1>form add</h1>
<form action="{{Route('admin.test')}}" method="post">
    @csrf
    @if (count($errors)>0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
        
    @endif
    <div class="form-group">
        <label for="">title</label>
        <input type="text" name="title">
    </div>
    <div class="form-group">
        <label for="">price</label>
        <input type="text" name="price">
    </div>
    <div class="form-group">
        <label for="">sale_price</label>
        <input type="text" name="sale_price">
    </div>
    <div class="form-group">
        <label for="">genre</label>
        <input type="text" name="sale_price">
    </div>
    <div class="form-group">
        <label for="">image</label>
        <input type="text" name="sale_price">
    </div>

    <div class="form-group">
        <label for="">description</label>
        <input type="text" name="sale_price">
    </div>
    <div class="form-group">
        <label for="">id_genre</label>
        <input type="text" name="sale_price">
    </div>
    <div class="form-group">
        <label for="">author</label>
        <input type="text" name="sale_price">
    </div>
    <div class="form-group">
        <label for="">publisher</label>
        <input type="text" name="sale_price">
    </div>
    <div class="form-group">
        <label for="">status</label>
       <select name="status" id="">
           <option value="1">con hàng</option>
           <option value="-1">hết hàng</option>
       </select>
    </div>
    <button>save</button>
{{-- 
    <div class="form-group">
        <label for="">title</label>
        <input type="text" name="title">
    </div>
    <div class="form-group">
        <label for="">title</label>
        <input type="text" name="title">
    </div> --}}
</form>