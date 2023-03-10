@extends('employer::layouts.app_employer')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/employer.css') }}">
@stop
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
                            <h3>Cập nhật thông tin công Ty</h3>
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
                            <div class="profile-title">
                                <h3> Cập nhật thông tin công ty</h3>

                            </div>
                        </div>
                        <div class="profile-form-edit">
                            <form action="{{ route('get_employer.company.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <span class="pf-title">Tên Công ty <span>(*) </span></span>
                                        <div class="pf-field">
                                            <input type="text" placeholder="tên công ty " name="c_name"
                                                value="{{ old('c_name', $company->c_name ?? '') }}">
                                        </div>
                                        @if ($errors->has('c_name'))
                                            <span class="text-danger " style="color: red !important; font-size: 13px ">
                                                {{ $errors->first('c_name') }} </span>
                                        @endif
                                    </div>

                                    <div class="col-lg-12">
                                        <span class="pf-title">Trụ sở chính <span>(*) </span></span>
                                        <div class="pf-field">
                                            <input type="text" placeholder="trụ sở chính" name="c_address"
                                                value="{{ old('c_address', $company->c_address ?? '') }}">
                                        </div>
                                        @if ($errors->has('c_address'))
                                            <span class="text-danger " style="color: red !important; font-size: 13px ">
                                                {{ $errors->first('c_address') }} </span>
                                        @endif
                                    </div>
                                    <div class="col-lg-6">
                                        <span class="pf-title">Ngành nghề</span>
                                        <div class="pf-field">
                                            <select name="careers[]" data-placeholder="Please Select Specialism"
                                                class="chosen js-run-select2" style="display: none;" multiple="multiple">
                                                @foreach ($careers as $item)
                                                    <option {{ in_array($item->id, $careerCompany) ? 'selected' : '' }}
                                                        value="{{ $item->id }}">
                                                        {{ $item->c_name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <span class="pf-title">Quy mô công ty</span>
                                        <div class="pf-field">
                                            <select name="c_scale" data-placeholder="Please Select Specialism"
                                                class="chosen" style="display: none;">
                                                @foreach ($scale as $key => $item)
                                                    <option
                                                        value="{{ $key }}"{{ ($company->c_scale ?? 0) == $key ? 'selected' : '' }}>
                                                        {{ $item }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-lg-6">
                                        <span class="pf-title">website</span>
                                        <div class="pf-field">
                                            <input type="text" name="c_website"
                                                value="{{ old('c_website', $company->c_website ?? '') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <span class="pf-title">số điện thoại</span>
                                        <div class="pf-field">
                                            <input type="text" name="c_phone"
                                                value="{{ old('c_phone', $company->c_phone ?? '') }}">
                                        </div>
                                        @if ($errors->has('c_phone'))
                                            <span class="text-danger " style="color: red !important; font-size: 13px ">
                                                {{ $errors->first('c_phone') }} </span>
                                        @endif

                                    </div>
                                    <div class="col-lg-6">
                                        <span class="pf-title">Email công ty</span>
                                        <div class="pf-field">
                                            <input type="text" name="c_email"
                                                value="{{ old('c_email', $company->c_email ?? '') }}">
                                        </div>
                                        @if ($errors->has('c_email'))
                                            <span class="text-danger " style="color: red !important; font-size: 13px ">
                                                {{ $errors->first('c_email') }} </span>
                                        @endif

                                    </div>
                                    <div class="col-lg-6">
                                        <span class="pf-title">Thời gian làm việc</span>
                                        <select name="c_working_time" data-placeholder="Please Select Specialism"
                                            class="chosen" style="display: none;">
                                            @foreach ($working_time as $key => $item)
                                                <option
                                                    value="{{ $key }}"{{ ($company->c_working_time ?? 0) == $key ? 'selected' : '' }}>
                                                    {{ $item }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <span class="pf-title">Logo</span>
                                        <div class="pf-field">
                                            <input type="file" class="form-control" name="logo">
                                        </div>
                                        <p>
                                            {{ $company->c_logo ?? '' }}
                                        </p>
                                    </div>

                                    <div class="col-lg-12">
                                        <span class="pf-title">Mô tả công ty</span>
                                        <div class="pf-field">
                                            <textarea name="c_about">{{ old('c_about', $company->c_about ?? '') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-2">
                                        <button type="submit">Cập nhật thông tin</button>
                                    </div>

                                </div>


                            </form>
                        </div>
                        {{-- <div class="contact-edit">
                            <form>
                                <div class="row">

                                    <div class="col-lg-12">
                                    </div>

                                </div>
                            </form>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@stop
@section('script')
    <script src="{{ asset('js/employer.js') }}"></script>
@stop
