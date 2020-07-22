    <table>
        <tr>
        <th>
            tên
            </th>
            <th>
            ảnh
            </th>
            <th>
            ngày tạoo
            </th>

            <th>
            nhà phất hành
            </th>
            <th>
                chức năng
            </th>
        </tr>
        <script>
            var delet = document.getElementById('xoa');
            delet.onclick = function(){
                Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.value) {
                    Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    )
                }
                })
            }
        </script>
        @foreach ($join as $item)
        <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->image}}</td>
            <td>{{$item->creat_at}}</td>
            <td>{{$item->publisher_id}}</td>
            <td><a href="" id="xoa">Xóa</a></td>
        </tr>
        @endforeach

    </table>


