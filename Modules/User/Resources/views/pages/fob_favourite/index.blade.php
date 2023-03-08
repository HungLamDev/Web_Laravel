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
                    @include('user::components._inc_sidebar_user')
                    <div class="col-lg-9 column">
                        <div class="padding-left">
                            <div class="manage-jobs-sec addscroll">
                                <h3>Danh sách job yêu thích </h3>
                                <table>
                                    <thead>
                                        <tr>
                                            <td>tiêu đề</td>
                                            <td>Thời Gian tạo / Hạn nộp</td>
                                            <td>Trạng Thái</td>
                                            <td>Thao tác</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($jobs ?? [] as $item)
                                            <tr>
                                                <td>
                                                    <div class="c-logo"> <img
                                                            src="{{ pare_url_file($item->company->c_logo ?? '') }}"
                                                            alt="" />
                                                    </div>
                                                    <div class="table-list-title">
                                                        <h3><a href="" title="">{{ $item->j_name }}</a></h3>
                                                        <span><i class="la la-map-marker"></i>{{ $item->j_address }}</span>
                                                    </div>
                                                </td>

                                                <td>
                                                    <span>{{ $item->created_at }}</span><br>
                                                    <span>{{ $item->j_time }}</span>
                                                </td>
                                                <td>
                                                    <span
                                                        class="status active">{{ $item->getStatus($item->j_status)['name'] }}</span>
                                                </td>
                                                <td>
                                                    <ul class="action_job">
                                                        <li><span>Hủy bỏ</span><a
                                                                href="{{ route('get_user.job.favourite_remove', $item->id) }}"
                                                                title=""><i class="la la-trash-o"></i></a></li>

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
