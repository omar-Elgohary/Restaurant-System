@extends('layouts.app')

@section('content')

<div class="container" dir="rtl">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header text-center bg-danger text-light">القائمة</div>
                <div class="card-body text-right">
                    <ul class="list-group">
                        <a href="{{route('category.index')}}" class="list-group-item list-group-item-action">إضافة صنف</a>
                        <a href="{{route('meal.create')}}" class="list-group-item list-group-item-action">إضافة وجبة</a>
                        <a href="" class="list-group-item list-group-item-action">طلبات المستخدمين</a>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-danger text-light text-center">جميع الوجبات</div>

                <div class="card-body">
                    @if(session('message'))
                        <div class="alert alert-success" role="alert">
                            {{session('message')}}
                        </div>
                    @endif
                </div>

                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>صورة الوجبة</th>
                                <th>إسم الوجبة</th>
                                <th>الوصف</th>
                                <th>الصنف</th>
                                <th>السعر</th>
                                <th>تعديل</th>
                                <th>حذف</th>
                            </tr>
                        </thead>

                        @forelse ($meals as $meal)
                            <tbody>
                                <td>{{ $meal->id }}</td>
                                <td><img src="{{ asset('storage/images/Meals/'.$meal->image) }}" width="80" alt=""></td>
                                <td>{{ $meal->name }}</td>
                                <td>{{ $meal->description }}</td>
                                <td>{{ $meal->category }}</td>
                                <td>{{ $meal->price }}</td>
                                <td><a href="{{route('meal.edit', $meal->id)}}">
                                    <button class="btn btn-warning btn-sm">تعديل</button>
                                    </a>
                                </td>
                                <td><a href="">
                                    <button class="btn btn-danger btn-sm">حذف</button>
                                    </a>
                                </td>
                            </tbody>
                        @empty
                            <p class="text-center text-danger">لا يوجد وجبات</p>
                        @endforelse
                    </table>
                    {{ $meals->links() }}
                </div>
            </div>
        </div>
    </div>

<script>
    function previewImage(event) {
        var input = event.target;
        var preview = document.getElementById('showImage');

        var reader = new FileReader();
        reader.onload = function(){
            preview.src = reader.result;
        };
        reader.readAsDataURL(input.files[0]);
    }
</script>

@endsection
