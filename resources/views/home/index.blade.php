@extends('layout.app_frontend')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@stop
@section('content')
    <section>
        <div class="block no-padding">
            <div class="container fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-featured-sec">
                            <div class="new-slide-2">
                                <img src="
                                {{ asset('images/vector-2.png') }}">
                            </div>
                            <div class="job-search-sec">
                                <div class="job-search">
                                    <h3>Hệ thống tìm việc lớn nhất Việt Nam</h3>
                                    <span>Find Jobs, Employment & Career Opportunities</span>
                                    <form action="{{ route('get.search.Job') }}">
                                        <div class="row">
                                            <div class="col-lg-7 col-md-5 col-sm-12 col-xs-12">
                                                <div class="job-field">
                                                    <input type="text" name="t"
                                                        placeholder="Tiêu đề Chức danh công việc, từ khóa hoặc tên công ty" />
                                                    <i class="la la-keyboard-o"></i>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-5 col-sm-12 col-xs-12">
                                                <div class="job-field">
                                                    <select data-placeholder="City, province or region" class="chosen-city"
                                                        name="l">
                                                        <option> Hà Nội </option>
                                                        <option> Hải Phòng </option>
                                                        <option>TP Hồ CHí Minh</option>
                                                        <option> Cần Thơ</option>
                                                    </select>
                                                    <i class="la la-map-marker"></i>
                                                </div>
                                            </div>
                                            <div class="col-lg-1 col-md-2 col-sm-12 col-xs-12">
                                                <button type="submit"><i class="la la-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="or-browser">
                                        <span>Từ Khóa nổi Bật</span>
                                        <a href="#" title="">Việc làm IT</a>
                                        <a href="#" title="">Nhân Viên IT</a>
                                        <a href="#" title="">Kỹ sư xây dựng</a>
                                        <a href="#" title="">Nhân Viên văn Phòng</a>



                                    </div>
                                </div>
                            </div>
                            <div class="scroll-to">
                                <a href="#scroll-here" title=""><i class="la la-arrow-down"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="scroll-here">
        <div class="block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="heading">
                            <h2>Ngành nghề nổi bật</h2>
                            <span>Lướt xem các xu hướng nghề nghiệp phổ biến hiện nay</span>
                        </div><!-- Heading -->
                        @foreach ($careerHot->chunk(4) as $careers)
                            <div class="cat-sec">
                                <div class="row no-gape">
                                    @foreach ($careers as $item)
                                        <div class="col-lg-3 col-md-3 col-sm-6">
                                            <div class="p-category">
                                                <a href="{{ route('get.career.index', ['slug' => $item->c_slug]) }}"
                                                    title="{{ $item->c_name }}">
                                                    <i class="la la-bullhorn"></i>
                                                    <span>{{ $item->c_name }}</span>
                                                    <p>(22 open positions)</p>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="col-lg-12">
                        <div class="browse-all-cat">
                            <a href="#" title="">Xem tẩt cả các ngành nghề </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="block double-gap-top double-gap-bottom">
            <div data-velocity="-.1"
                style="background: url( {{ asset('images/parallax1.jpg') }}) repeat scroll 50% 422.28px transparent;"
                class="parallax scrolly-invisible layer color"></div><!-- PARALLAX BACKGROUND IMAGE -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="simple-text-block">
                            <h3>Đăng ký tài khoản để tạo CV online</h3>
                            <span>Chỉ mất vài phút để tạo tài khoản, có ngay công việc</span>
                            <a href="#" title="">Đăng Ký</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="heading">
                            <h2>Tin Tuyển dụng mới nhất</h2>
                            <span>Danh sách tin tuyển dụng mới được đăng tải trên hệ thống</span>
                        </div><!-- Heading -->
                        <div class="job-listings-sec">
                            @foreach ($jobsnew ?? [] as $item)
                                <div class="job-listing">
                                    <div class="job-title-sec">
                                        <div class="c-logo"> <img
                                                href="{{ route('get.Job', ['slug' => $item->j_slug, 'hashID' => $item->j_hash_slug]) }}"
                                                src="{{ pare_url_file($item->company->c_logo ?? '') }}" alt="" />
                                        </div>
                                        <h3><a href="{{ route('get.Job', ['slug' => $item->j_slug, 'hashID' => $item->j_hash_slug]) }}"
                                                title="">{{ $item->j_name }}</a></h3>
                                        <span> {{ $item->company->c_name ?? '' }}</span>
                                    </div>
                                    <span class="job-lctn"><i class="la la-map-marker"></i>{{ $item->j_address }}</span>
                                    <span
                                        class="fav-job  {{ get_data_user('users') ? 'js-favourite' : 'js-Login-message' }}"
                                        data-url="{{ route('ajxa_get.add.favourite', $item->j_hash_slug) }}"><i
                                            class="la la-heart-o"></i></span>
                                    <span class="job-is ft">{{ $item->getAttributeJob->a_name ?? '[N\A]' }}</span>
                                </div>
                            @endforeach

                        </div>
                        <div class="col-lg-12">
                            <div class="browse-all-cat">
                                <a href="#" title="">Load more listings</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <section>
        <div class="block">
            <div data-velocity="-.1"
                style="background: url(&quot;{{ asset('images/parallax2.jpg') }}&quot;) 50% -29.32px repeat scroll transparent;"
                class="parallax scrolly-invisible layer color light"></div>
            <!-- PARALLAX BACKGROUND IMAGE -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="heading light">
                            <h2>Kind Words From Happy Candidates</h2>
                            <span>What other people thought about the service provided by JobHunt</span>
                        </div>
                        <!-- Heading -->
                        <div class="reviews-sec slick-initialized slick-slider slick-dotted" id="reviews-carousel"
                            role="toolbar">
                            <div aria-live="polite" class="slick-list draggable">
                                <div class="slick-track"
                                    style="opacity: 1; width: 4170px; transform: translate3d(-2085px, 0px, 0px);"
                                    role="listbox">
                                    <div class="col-lg-6 slick-slide slick-cloned" data-slick-index="-3"
                                        aria-hidden="true" style="width: 417px;" tabindex="-1">
                                        <div class="reviews">
                                            <img src="{{ asset('images/r2.jpg') }}" alt="">
                                            <h3>Ali Tufan <span>Web designer</span></h3>
                                            <p>Without JobHunt i’d be homeless, they found me a job and got me sorted out
                                                quickly with everything! Can’t quite believe the service</p>
                                        </div>
                                        <!-- Reviews -->
                                    </div>
                                    <div class="col-lg-6 slick-slide slick-cloned" data-slick-index="-2"
                                        aria-hidden="true" style="width: 417px;" tabindex="-1">
                                        <div class="reviews">
                                            <img src="{{ asset('images/r1.jpg') }}" alt="">
                                            <h3>Augusta Silva <span>Web designer</span></h3>
                                            <p>Without JobHunt i’d be homeless, they found me a job and got me sorted out
                                                quickly with everything! Can’t quite believe the service</p>
                                        </div>
                                        <!-- Reviews -->
                                    </div>
                                    <div class="col-lg-6 slick-slide slick-cloned" data-slick-index="-1"
                                        aria-hidden="true" style="width: 417px;" tabindex="-1">
                                        <div class="reviews">
                                            <img src="{{ asset('images/r2.jpg') }}" alt="">
                                            <h3>Ali Tufan <span>Web designer</span></h3>
                                            <p>Without JobHunt i’d be homeless, they found me a job and got me sorted out
                                                quickly with everything! Can’t quite believe the service</p>
                                        </div>
                                        <!-- Reviews -->
                                    </div>
                                    <div class="col-lg-6 slick-slide" data-slick-index="0" aria-hidden="true"
                                        style="width: 417px;" tabindex="-1" role="option"
                                        aria-describedby="slick-slide00">
                                        <div class="reviews">
                                            <img src="{{ asset('images/r1.jpg') }}" alt="">
                                            <h3>Augusta Silva <span>Web designer</span></h3>
                                            <p>Without JobHunt i’d be homeless, they found me a job and got me sorted out
                                                quickly with everything! Can’t quite believe the service</p>
                                        </div>
                                        <!-- Reviews -->
                                    </div>
                                    <div class="col-lg-6 slick-slide" data-slick-index="1" aria-hidden="true"
                                        style="width: 417px;" tabindex="-1" role="option"
                                        aria-describedby="slick-slide01">
                                        <div class="reviews">
                                            <img src="{{ asset('images/r2.jpg') }}" alt="">
                                            <h3>Ali Tufan <span>Web designer</span></h3>
                                            <p>Without JobHunt i’d be homeless, they found me a job and got me sorted out
                                                quickly with everything! Can’t quite believe the service</p>
                                        </div>
                                        <!-- Reviews -->
                                    </div>
                                    <div class="col-lg-6 slick-slide slick-current slick-active" data-slick-index="2"
                                        aria-hidden="false" style="width: 417px;" tabindex="-1" role="option"
                                        aria-describedby="slick-slide02">
                                        <div class="reviews">
                                            <img src="{{ asset('images/r1.jpg') }}" alt="">
                                            <h3>Augusta Silva <span>Web designer</span></h3>
                                            <p>Without JobHunt i’d be homeless, they found me a job and got me sorted out
                                                quickly with everything! Can’t quite believe the service</p>
                                        </div>
                                        <!-- Reviews -->
                                    </div>
                                    <div class="col-lg-6 slick-slide slick-active" data-slick-index="3"
                                        aria-hidden="false" style="width: 417px;" tabindex="-1" role="option"
                                        aria-describedby="slick-slide03">
                                        <div class="reviews">
                                            <img src="{{ asset('images/r2.jpg') }}" alt="">
                                            <h3>Ali Tufan <span>Web designer</span></h3>
                                            <p>Without JobHunt i’d be homeless, they found me a job and got me sorted out
                                                quickly with everything! Can’t quite believe the service</p>
                                        </div>
                                        <!-- Reviews -->
                                    </div>
                                    <div class="col-lg-6 slick-slide slick-cloned slick-active" data-slick-index="4"
                                        aria-hidden="false" style="width: 417px;" tabindex="-1">
                                        <div class="reviews">
                                            <img src="{{ asset('images/r1.jpg') }}" alt="">
                                            <h3>Augusta Silva <span>Web designer</span></h3>
                                            <p>Without JobHunt i’d be homeless, they found me a job and got me sorted out
                                                quickly with everything! Can’t quite believe the service</p>
                                        </div>
                                        <!-- Reviews -->
                                    </div>
                                    <div class="col-lg-6 slick-slide slick-cloned" data-slick-index="5"
                                        aria-hidden="true" style="width: 417px;" tabindex="-1">
                                        <div class="reviews">
                                            <img src="{{ asset('images/r2.jpg') }}" alt="">
                                            <h3>Ali Tufan <span>Web designer</span></h3>
                                            <p>Without JobHunt i’d be homeless, they found me a job and got me sorted out
                                                quickly with everything! Can’t quite believe the service</p>
                                        </div>
                                        <!-- Reviews -->
                                    </div>
                                    <div class="col-lg-6 slick-slide slick-cloned" data-slick-index="6"
                                        aria-hidden="true" style="width: 417px;" tabindex="-1">
                                        <div class="reviews">
                                            <img src="{{ asset('images/r1.jpg') }}" alt="">
                                            <h3>Augusta Silva <span>Web designer</span></h3>
                                            <p>Without JobHunt i’d be homeless, they found me a job and got me sorted out
                                                quickly with everything! Can’t quite believe the service</p>
                                        </div>
                                        <!-- Reviews -->
                                    </div>
                                </div>
                            </div>
                            <ul class="slick-dots" style="display: block;" role="tablist">
                                <li class="" aria-hidden="true" role="presentation" aria-selected="true"
                                    aria-controls="navigation00" id="slick-slide00"><button type="button"
                                        data-role="none" role="button" tabindex="0">1</button></li>
                                <li aria-hidden="true" role="presentation" aria-selected="false"
                                    aria-controls="navigation01" id="slick-slide01" class=""><button
                                        type="button" data-role="none" role="button" tabindex="0">2</button></li>
                                <li aria-hidden="false" role="presentation" aria-selected="false"
                                    aria-controls="navigation02" id="slick-slide02" class="slick-active"><button
                                        type="button" data-role="none" role="button" tabindex="0">3</button></li>
                                <li aria-hidden="true" role="presentation" aria-selected="false"
                                    aria-controls="navigation03" id="slick-slide03" class=""><button
                                        type="button" data-role="none" role="button" tabindex="0">4</button></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="heading">
                            <h2>Companies We've Helped</h2>
                            <span>Some of the companies we've helped recruit excellent applicants over the
                                years.</span>
                        </div><!-- Heading -->
                        <div class="comp-sec">
                            <div class="company-img">
                                <a href="#" title=""><img src="" alt="" /></a>
                            </div><!-- Client  -->
                            <div class="company-img">
                                <a href="#" title=""><img src="" alt="" /></a>
                            </div><!-- Client  -->
                            <div class="company-img">
                                <a href="#" title=""><img src="" alt="" /></a>
                            </div><!-- Client  -->
                            <div class="company-img">
                                <a href="#" title=""><img src="" alt="" /></a>
                            </div><!-- Client  -->
                            <div class="company-img">
                                <a href="#" title=""><img src="" alt="" /></a>
                            </div><!-- Client  -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="block">
            <div data-velocity="-.1"
                style="background: url({{ asset('images/parallax3.jpg') }}) repeat scroll 50% 422.28px transparent;"
                class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="heading">
                            <h2>Quick Career Tips</h2>
                            <span>Found by employers communicate directly with hiring managers and
                                recruiters.</span>
                        </div><!-- Heading -->
                        <div class="blog-sec">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="my-blog">
                                        <div class="blog-thumb">
                                            <a href="#" title=""><img src="{{ asset('images/b1.jpg') }}"
                                                    alt="" /></a>
                                            <div class="blog-metas">
                                                <a href="#" title="">March 29, 2017</a>
                                                <a href="#" title="">0 Comments</a>
                                            </div>
                                        </div>
                                        <div class="blog-details">
                                            <h3><a href="#" title="">Attract More Attention Sales And
                                                    Profits</a></h3>
                                            <p>A job is a regular activity performed in exchange becoming an
                                                employee, volunteering, </p>
                                            <a href="#" title="">Read More <i
                                                    class="la la-long-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="my-blog">
                                        <div class="blog-thumb">
                                            <a href="#" title=""><img src="{{ asset('images/b2.jpg') }}"
                                                    alt="" /></a>
                                            <div class="blog-metas">
                                                <a href="#" title="">March 29, 2017</a>
                                                <a href="#" title="">0 Comments</a>
                                            </div>
                                        </div>
                                        <div class="blog-details">
                                            <h3><a href="#" title="">11 Tips to Help You Get New
                                                    Clients</a></h3>
                                            <p>A job is a regular activity performed in exchange becoming an
                                                employee, volunteering, </p>
                                            <a href="#" title="">Read More <i
                                                    class="la la-long-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="my-blog">
                                        <div class="blog-thumb">
                                            <a href="#" title=""><img src="{{ asset('images/b3.jpg') }}"
                                                    alt="" /></a>
                                            <div class="blog-metas">
                                                <a href="#" title="">March 29, 2017</a>
                                                <a href="#" title="">0 Comments</a>
                                            </div>
                                        </div>
                                        <div class="blog-details">
                                            <h3><a href="#" title="">An Overworked Newspaper
                                                    Editor</a></h3>
                                            <p>A job is a regular activity performed in exchange becoming an
                                                employee, volunteering, </p>
                                            <a href="#" title="">Read More <i
                                                    class="la la-long-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="block no-padding">
            <div class="container fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="simple-text">
                            <h3>Gat a question?</h3>
                            <span>We're here to help. Check out our FAQs, send us an email or call us at 1 (800)
                                555-5555</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
@section('script')
    <script src="{{ asset('js/home.js') }}"></script>
@stop
