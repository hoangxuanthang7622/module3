@extends('layout.layout')
@section('content')
<main id="main">

<h1>Thêm chi tiêu</h1>
<form action="{{route('spending.store')}}" method="POST">
    @csrf
    <div class="mb-3">
        <label class="form-label">Danh mục</label>
        <select name="category" id="" >
            <option value="Gas">Gas</option>
            <option value="Internet">Internet</option>
            <option value="Điện thoại">Điện thoại</option>
            <option value="Điện nước">Điện nước</option>
            <option value="Sinh hoạt">Sinh hoạt</option>
            <option value="Tiền học">Tiền học</option>
            <option value="Tiền đi lại">Tiền đi lại</option>
        </select>

    </div>
    <div class="mb-3">
        <label class="form-label">Ngày chi tiêu</label>
        <input type="date" id="fname" name="date" class="form-control">
        @error('date')
              <div style="color: red">{{$message}}</div>
      @enderror

    </div>
    <div class="mb-3">
        <label class="form-label">Số tiền</label>
        <input type="text" id="fname" name="money" class="form-control">
        @error('money')
        <div style="color: red">{{$message}}</div>
@enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Ghi chú</label>
        <input type="text" id="fname" name="note" class="form-control">
        @error('note')
        <div style="color: red">{{$message}}</div>
@enderror
    </div>
    <input type="submit" value="Lưu" class="btn btn-success">
    <a href="{{route('spending.index')}}" class="btn btn-danger">Huỷ</a>
  </form>
  </main>
@endsection
