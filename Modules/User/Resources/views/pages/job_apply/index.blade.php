@extends('user::layouts.app_user')
@section('contents')

    <section class="overlape">
        <div class="block no-padding">
            <div data-velocity="-.1"
                style="background: url(images/resource/mslider1.jpg) repeat scroll 50% 422.28px transparent;"
                class="parallax scrolly-invisible no-parallax"></div>
            <!-- PARALLAX BACKGROUND IMAGE -->
            <div class="container fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="inner-header">
                            <h3>Welcome Tera Planer</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="block no-padding">
            <div class="container">
                <div class="row no-gape">
                    @include('employer::components._inc_sidebar_employer')
                    <div class="col-lg-9 column">
                        <div class="padding-left">
                            <div class="manage-jobs-sec addscroll">
                                <h3>Danh sách Ứng tuyển</h3>
                                <table>
                                    <thead>
                                        <tr>
                                            <td>Thông tin ứng viên</td>
                                            <td>họ và tên</td>
                                            <td>Số điện thoại</td>
                                            <td>Ngày ứng tuyển</td>
                                            <td>Thao tác</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($applyJobs ?? [] as $item)
                                            <tr>
                                                <td>
                                                    <div class="table-list-title">
                                                        <h3><a href="" title="">{{ $item->job->j_name }}</a>
                                                        </h3>
                                                        <span><i
                                                                class="la la-map-marker"></i>{{ $item->job->j_address }}</span>
                                                    </div>
                                                </td>

                                                <td>
                                                    <span>{{ $item->aj_name }}</span>
                                                </td>
                                                <td>
                                                    <span>{{ $item->aj_phone }}</span>
                                                </td>
                                                <td>
                                                    <span>{{ $item->created_at }}</span>
                                                </td>
                                                <td>
                                                    <ul class="action_job">
                                                        <li><span>Delete</span><a
                                                                href="{{ route('get_employer.apply_job.delete', $item->id) }}"
                                                                title=""><i class="la la-trash-o"></i></a>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
