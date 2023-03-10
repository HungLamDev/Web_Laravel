@extends('layout.app_frontend')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/job_detail.css') }}">
@stop
@section('content')
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
        <div class="block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 column">
                        <div class="job-single-sec style3">
                            <div class="job-head-wide">
                                <div class="row">
                                    <div class="col-lg-10">
                                        <div class="job-single-head3 emplye">
                                            <div class="job-thumb"> <img
                                                    src="{{ pare_url_file($job->company->c_logo ?? '') }}" alt="">
                                            </div>
                                            <div class="job-single-info3">
                                                <h3>{{ $job->j_name }}</h3>
                                                <span><i class="la la-map-marker"></i>{{ $job->j_address }}</span><span
                                                    class="job-is ft">{{ $job->getAttributeJob->a_name ?? '[N\A]' }}</span>
                                                <ul class="tags-jobs">
                                                    <li><i class="la la-file-text"></i> Applications 1</li>
                                                    <li><i class="la la-calendar-o"></i> Post Date: {{ $job->j_time }}</li>
                                                    <li><i class="la la-eye"></i> Views {{ $job->j_view }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- Job Head -->
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="share-bar">
                                            <a href="#" title="" class="share-google"><i
                                                    class="la la-google"></i></a><a href="#" title=""
                                                class="share-fb"><i class="fa fa-facebook"></i></a><a href="#"
                                                title="" class="share-twitter"><i class="fa fa-twitter"></i></a>
                                        </div>
                                        <div class="emply-btns">
                                            <a class="seemap js-apply-job" data-hash-slug="{{ $job->j_hash_slug }}"
                                                href="" title="">
                                                ???ng tuy???n</a>
                                            <a class="followus" href="#" title=""><i
                                                    class="la la-paper-plane"></i>Theo d??i</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="job-wide-devider">
                                <div class="row">
                                    <div class="col-lg-8 column">
                                        <div class="job-details">
                                            {{ $job->j_description }}
                                        </div>
                                        <div class="recent-jobs">
                                            <h3>Tin t???c tuy???n d???ng li??n quan </h3>
                                            <div class="job-list-modern">
                                                <div class="job-listings-sec no-border">
                                                    @foreach ($jobSuggest as $item)
                                                        <div class="job-listing wtabs noimg">
                                                            <div class="job-title-sec">
                                                                <div class="c-logo"> <img
                                                                        src="{{ pare_url_file($job->company->c_logo ?? '') }}"
                                                                        alt=""></div>
                                                                <h3><a href="{{ route('get.Job', ['slug' => $item->j_slug, 'hashID' => $item->j_hash_slug]) }}"
                                                                        title="">
                                                                        {{ $item->j_name }}</a></h3>
                                                                <span>{{ $item->company->c_name ?? '[N\A]' }}</span>
                                                                <div class="job-lctn"><i
                                                                        class="la la-map-marker"></i>{{ $item->j_address }}
                                                                </div>
                                                            </div>
                                                            <div class="job-style-bx">
                                                                <span
                                                                    class="job-is ft">{{ $item->getAttributeJob->a_name ?? '[N\A]' }}</span>
                                                                <span
                                                                    class="fav-job {{ get_data_user('users') ? 'js-favourite' : 'js-Login-message' }} "
                                                                    data-url="{{ route('ajxa_get.add.favourite', $item->j_hash_slug) }}"><i
                                                                        class="la la-heart-o"></i></span>
                                                                <i>{{ $item->created_at->diffForHumans() }}</i>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 column">
                                        <div class="job-overview">
                                            <h3>Th??ng Tin c??ng ty</h3>
                                            <ul>
                                                <li>
                                                    <i class="la la-map"></i>
                                                    <h3>?????a ??i???m</h3>
                                                    <span>{{ $job->company->c_address }}</span>
                                                </li>
                                                <li>
                                                    <i class="la la-bars"></i>
                                                    <h3>Ng??nh ngh???</h3>
                                                    @if (isset($company->careers) && !$company->careers->isEmpty())
                                                        <span>
                                                            @foreach ($company->careers as $item)
                                                                {{ $item->c_name }}
                                                            @endforeach

                                                        </span>
                                                    @endif
                                                </li>
                                                <li>
                                                    <i class="la la-clock-o"></i>
                                                    <h3>Since</h3>
                                                    <span>2002</span>
                                                </li>
                                                <li>
                                                    <i class="la la-users"></i>
                                                    <h3>Team Size</h3>
                                                    <span>15</span>
                                                </li>
                                                <li>
                                                    <i class="la la-user"></i>
                                                    <h3>Followers</h3>
                                                    <span>15</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- Job Overview -->
                                        <div class="quick-form-job">
                                            <h3>Contact Business Network</h3>
                                            <form>
                                                <input type="text" placeholder="Enter your Name *">
                                                <input type="text" placeholder="Email Address*">
                                                <input type="text" placeholder="Phone Number">
                                                <textarea placeholder="Message should have more than 50 characters"></textarea>
                                                <button class="submit">Send Email</button>
                                                <span>You accepts our <a href="#" title="">Terms and
                                                        Conditions</a></span>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('components.popup._inc_popup_apply_job')

    </section>
@stop
@section('script')
    <script src="{{ asset('js/home.js') }}"></script>
@stop
