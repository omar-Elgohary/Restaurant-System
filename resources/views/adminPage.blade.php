@extends('layouts.app')

@section('content')

<div class="container" dir="rtl">
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-warning">
                    <li class="breadcrumb-item active" aria-current="page">طلبات الزبائن</li>
                </ol>
            </nav>

            <div class="card">
                <div class="card-header">
                    <a href="{{route('showCategory')}}" style="float: right;"><button class="btn btn-success btn-default" style="margin-left: 6px">إضافة صنف</button></a>
                    <a href="" style="float: right;"><button class="btn btn-info btn-default" style="margin-left: 6px">عرض الوجبات</button></a>
                    <a href="" style="float: right;"><button class="btn btn-primary btn-default" style="margin-left: 6px">إضافة وجبة</button></a>
                </div>
            </div>

            <div class="card-body">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>الإسم</th>
                            <th>الهاتف</th>
                            <th>الإيميل</th>
                            <th>التاريخ</th>
                            <th>الوقت</th>
                            <th>إسم الوجبة</th>
                            <th>العدد</th>
                            <th>سعر الوجبة ($)</th>
                            <th>المجموع ($)</th>
                            <th>العنوان</th>
                            <th>الحالة</th>
                            <th>القبول</th>
                            <th>رفض الطلب</th>
                            <th>إتمام الطلب</th>
                        </tr>
                    </thead>

                    <tbody>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
</div>

@endsection
