@extends('admin::layouts.master')
@section('content')
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <h3 class="page-title">Quản lý Ứng viên </h3>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card card-small mb-4">
                <div class="card-header border-bottom">
                    <h6 class="m-0">Danh sách </h6>
                </div>
                <div class="card-body p-0 pb-3 text-center">
                    <table class="table mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th scope="col" class="border-0">#</th>
                                <th scope="col" class="border-0 text-left"> Họ tên </th>
                                {{-- <th scope="col" class="border-0">Trạng thái</th> --}}
                                <th scope="col" class="border-0"> Email </th>
                                <th scope="col" class="border-0"> SĐT </th>
                                <th scope="col" class="border-0"> Thời gian tạo </th>
                                <th scope="col" class="border-0">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users ?? [] as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td class="text-left"> <a href="">{{ $item->name }}</a></td>
                                    {{-- <td>
                                        <span
                                            class=" {{ $item->getStatus($item->j_status)['class-text'] }} ">{{ $item->getStatus($item->j_status)['name'] }}</span>
                                    </td> --}}
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->created_at }}</td>

                                    <td>
                                        <a href="" class="btn btn-sm btn-outline-accent">
                                            <i class="material-icons">restore_from_trash</i>
                                        </a>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
