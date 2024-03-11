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
                        <a href="{{route('meal.index')}}" class="list-group-item list-group-item-action">عرض الوجبات</a>
                        <a href="{{route('home')}}" class="list-group-item list-group-item-action">طلبات المستخدمين</a>
                    </ul>
                </div>
            </div>

            @if(count($errors) > 0)
                <div class="card mt-5">
                    <div class="card-body">
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <p>{{$error}}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            @if(session('success'))
                <div class="alert alert-success mt-5">
                    {{ session('success') }}
                </div>
            @endif
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-danger text-light text-center">الوجبة</div>
                <form action="{{route('meal.update', $meal->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body text-right">
                        <div class="form-group mb-3">
                            <label>إسم الوجبة</label>
                            <input type="text" name="name" class="form-control mt-2" value="{{$meal->name}}">
                        </div>

                        <div class="form-group mb-3">
                            <label>وصف الوجبة</label>
                            <textarea name="description" class="form-control mt-2">{{$meal->description}}</textarea>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label>سعر الوجبة($)</label>
                                <input type="number" name="price" class="form-control mt-2" value="{{$meal->price}}">
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <h5>اختر صنف<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <select name="category" class="form-control mt-2" required>
                                    <option value="{{$meal->name}}" selected disabled>{{$meal->category}}</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->name}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-8 mb-3">
                                <label>صورة الوجبة</label>
                                <input type="file" name="image" class="form-control mt-2" onchange="previewImage(event)">
                            </div>

                            <div class="col-4">
                                @if($meal->image)
                                    <img src="{{asset('storage/images/Meals/'.$meal->image)}}" id="showImage" width="100" height="100" alt="">
                                @else
                                    <img src="{{asset('storage/images/Meals/default.png')}}" id="showImage" width="100" height="100" alt="">
                                @endif
                            </div>
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-success">تعديل</button>
                        </div>
                    </div>
                </form>
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
