@extends('layout.layout')
@section('content')
    <!DOCTYPE html>

    {{-- <style>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

         table, th, td {
                    border:1px solid black;
                    }

    </style> --}}
<html>

<main id="main">
<body>
<table style="width:100%" class="table">
<a href="{{route('spending.create')}}" class="btn btn-warning">Thêm chi tiêu</a>
    <tr>
    <th>#</th>
    <th>Danh mục</th>
    <th>Ngày chi tiêu</th>
    <th>Số tiền</th>
    <th>Ghi chú</th>
    <th>Tuỳ chỉnh</th>
    </tr>
    @php $totalAll = 0 @endphp
    @foreach ($spendings as $key => $value )
    <tr>

        <td>
            {{++$key }}
         </td>
          <td>
            {{$value->category}}
         </td>
         <td>
            {{$value->date}}
         </td><td>

            {{number_format($value->money)  }} VND
         </td>
         <td>
            {{$value->note}}
         </td>
         <td>

                <a href="{{ route('spending.edit', $value->id) }}"
                    class="btn btn-success">Chỉnh sửa<i
                        class="bi bi-pencil-square"></i></a>
                        <form onclick="return confirm('Bạn có chắc chắn muốn xoá không?')" action="{{ route('spending.destroy', $value->id) }}"
                            style="display:inline"  method="post">
                <button
                    type="submit"  class="btn btn-danger">Xoá<i
                        class="bi bi-trash"></i></button>
                @csrf
                @method('DELETE')
            </form>
        </td>
    </tr>
    @php $totalAll += $value->money @endphp
    @endforeach
    <h3 style="color: red">tổng tiền {{number_format($totalAll)}} VND</h3>
  </table>
</body>
</html>

</main>
@endsection

