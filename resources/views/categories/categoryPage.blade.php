@extends('layouts.app')

@section('content')

<div class="container" dir="rtl">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header text-center">الصنف</div>
                <form action="{{route('category.store')}}" method="POST">
                    @csrf
                    <div class="card-body text-right">
                        <div class="form-group">
                            <label for="name">اسم الصنف</label>
                            <input type="text" name="name" class="form-control" placeholder="اسم الصنف">
                        </div>

                        <hr>

                        <div class="form-group text-center">
                            <button class="btn btn-danger" type="submit">حفظ</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">الإصناف</div>
                <div class="card-body">
                    @if(session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @endif

                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>إسم الصنف</th>
                                <th>تعديل</th>
                                <th>حذف</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($categories as $key => $category)
                                <tr>
                                    <td style="width: 15%">{{ $key+1 }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td style="width: 15%">
                                        <a href="#updatecategory{{$category->id}}" class="btn btn-primary" data-bs-toggle="modal">تعديل</a>
                                    </td>

                                    <td style="width: 15%">
                                        <a href="#delete" class="btn btn-danger" data-bs-toggle="modal">حذف</a>
                                    </td>
                                </tr>

{{-- updatecategory --}}
<div class="modal fade border-0" id="updatecategory{{$category->id}}" aria-hidden="true" aria-labelledby="updatecategoryLabel" tabindex="-1" dir="rtl">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="btn-x modal-header">
                <button type="button" class="btn-close text-left" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

        <form action="{{route('category.update', $category->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-body">
                <div class="form-group mb-3">
                    <label for="name">إسم الصنف</label>
                    <input type="text" name="name" class="mt-3 form-control @error('name') is-invalid @enderror" id="input" value="{{$category->name}}">
                </div>
            </div>

            <div class="d-flex justify-content-around my-4">
                <button type="submit" class="btn btn-block btn-primary btn-bordered px-5">تعديل</button>
                <a href="#" class="btn btn-block btn-secondary px-5 text-white" data-bs-dismiss="modal">الغاء</a>
            </div>
        </form>

        </div> <!-- modal-content -->
    </div> <!-- modal-dialog -->
</div> <!-- modal fade -->


                            @empty
                                <div class="text-center">
                                    لا يوجد أصناف
                                </div>
                            @endforelse
                        </tbody>
                        {{ $categories->links() }}
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



{{-- deleteCategory --}}
<div class="modal fade border-0" id="delete" aria-hidden="true" aria-labelledby="deleteLabel" tabindex="-1" dir="rtl">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="btn-x modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{route('category.destroy', $category->id)}}" method="POST">
                @csrf
                @method('DELETE')

                <div class="modal-body text-center my-5">
                    <h2 class="text-black">هل أنت متأكد من حذف هذا الصنف؟</h2>
                </div>

                <div class="modal-footer d-flex justify-content-around">
                    <button type="submit" class="btn btn-block btn-danger btn-bordered px-5">حذف</button>
                    <a href="#" class="btn btn-block btn-secondary px-5 text-white" data-bs-dismiss="modal">الغاء</a>
                </div>
            </form>
        </div> <!-- modal-content -->
    </div> <!-- modal-dialog -->
</div> <!-- modal fade -->
@endsection
