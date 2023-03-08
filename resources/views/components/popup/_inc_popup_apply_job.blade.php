 {{-- <div class="jquery-modal current">
     <div class="modal modal-md modal-apply" id="apply-form">
         <div class="modal modal-body wrap-modal p-20">
             <form action="{{ route('ajax_post.add.apply_job') }}" id="form-apply" method="POST"
                 enctype="multipart/form-data" novalidate="novalidate">
                 <div class="modal-header">
                     <h2 class="title">Ứng tuyển việc làm</h2>
                 </div>
                 <input type="hidden" name="_token" value="IJTwiTwAStf3e7SMKzsXIuqQApd2L80eYvZP5kw8">
                 <div class="hide alert-error bg bg-warning"></div>
                 <div class="content-apply form-apply" id="form-resume">
                     <input type="hidden" name="job_hash_slug" value="nyre37yxDz">
                     <div class="hidden" id="data-resume-apply" data-apply-hash=" " data-name=""
                         data-time="ứng tuyển " data-link="">
                     </div>
                     <div class="group-item">
                         <div class="group-item-one js-resume-group apply-upload" data-type="resume-upload">
                             <div class="heading">Tải lên từ máy tính của bạn</div>
                             <div class="desc">Chúng tôi sẽ lưu CV này để sử dụng cho lần tiếp theo</div>
                             <div class="select active">
                                 <i class="la la-check"></i>
                             </div>
                             <div class="content">
                                 <div class="line"></div>
                                 <div class="name mt-2">File doc, docx, pdf. Tối đa 3MB</div>
                                 <div class="form-group">
                                     <div class="jFiler jFiler-theme-dragdropbox">
                                         <input type="file" class="hide valid" name="cv_file" id="filer_input"
                                             accept="doc, docx, pdf" data-error="#e_cv_file"
                                             style="position: absolute; left: -9999px; top: -9999px; z-index: -9999;">
                                         <div class="jFiler-input-dragDrop box-upload" style="display: none;"><a
                                                 class="" href="javascript:;">Click để tải hồ sơ lên</a></div>
                                         <div class="jFiler-items jFiler-row">
                                             <ul class="jFiler-items-list jFiler-items-default">
                                                 <li class="jFiler-item" data-jfiler-index="0" style="">
                                                     <div class="jFiler-item-container box-uploaded">
                                                         <div class="jFiler-item-inner">
                                                             <div class="jFiler-item-info">
                                                                 <div class="jFiler-item-title" title="TH3.docx">
                                                                     TH3.docx
                                                                 </div>
                                                                 <div class="jFiler-item-others"><span>size: 889
                                                                         KB</span><span>type: docx</span><span
                                                                         class="jFiler-item-status"></span></div>
                                                                 <div class="jFiler-item-assets">
                                                                     <ul class="list-inline">
                                                                         <li><a
                                                                                 class="jFiler-item-trash-action text-danger"><i
                                                                                     class="icon-remove-file"></i></a>
                                                                         </li>
                                                                     </ul>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </li>
                                             </ul>
                                         </div>
                                     </div>
                                     <span class="d-block error-form text-danger mt-1" style="display: none;"></span>
                                 </div>
                             </div>
                         </div>

                     </div>
                 </div>
                 <div class="content-apply form-apply hide" id="form-contact">
                     <div class="form-group-items p-4">
                         <div class="form-group">
                             <label for="" class="d-block">Họ và tên <span class="text-danger">* </span></label>
                             <input type="text" class="form-control" name="name" placeholder="e.g Nguyễn Văn A"
                                 value="">
                             <span class="d-block error-form text-danger mt-1" style="display: none;"></span>
                         </div>
                         <div class="form-group">
                             <label for="" class="d-block">Số điện thoại <span class="text-danger">*
                                 </span></label>
                             <input type="text" class="form-control" name="phone" placeholder="e.g: 0333383630"
                                 value="">
                             <span class="d-block  error-form text-danger mt-1" style="display: none;"></span>
                         </div>
                         <div class="form-group">
                             <label for="" class="d-block">Địa chỉ email <span class="text-danger">*
                                 </span></label>
                             <input type="text" class="form-control" name="email"
                                 placeholder="e.g: example@123job.vn" value="lytuanhung19122001@gmail.com">
                             <span class="d-block  error-form text-danger mt-1" style="display: none;"></span>
                         </div>
                         <div class="form-group">
                             <label for="" class="d-block">Giới thiệu về bản thân</label>
                             <textarea name="letter" class="form-control valid" cols="2" rows="5"
                                 placeholder="e.g: Viết giới thiệu ngắn gọn về bản thân (điểm mạnh, điểm yếu) và nêu rõ mong muốn, lý do làm việc tại công ty này. Đây là cách gây ấn tượng với nhà tuyển dụng nếu bạn có chưa có kinh nghiệm làm việc (hoặc CV không tốt)."></textarea>
                             <span class="d-block error-form text-danger mt-1" style="display: none;"></span>
                         </div>
                     </div>
                     <div class="button-foot text-right pb-4h">
                         <button type="button" rel="modal:close"
                             class="btn btn-primary pl-4 pr-4 mr-2 js-apply-next" data-step="form-confirm">Hủy bỏ<i
                                 class="la la-angle-right"></i></button>
                         <button type="button" class="btn btn-gray mr-2 js-apply-back" data-step="form-resume">Nộp
                             hồ sơ</button>
                     </div>
                 </div>
             </form>
         </div>
     </div>
     <a href="#close-modal" rel="modal:close" class="close-modal"></a>
 </div> --}}
 <div class="modal modal-md modal-apply" id="form-apply">
     <form id="apply-form" action="{{ route('ajax_post.add.apply_job') }}" method="POST" enctype="multipart/form-data"
         novalidate="novalidate">
         @csrf
         <div class="modal-header">
             <h2 class="title">
                 Ứng tuyển : <span>
                     cong ty abc
                 </span>
             </h2>
         </div>
         <div class="modal-body wrap-modal p-20">
             <div class="new showb">
                 <div class="line"></div>
                 <div class="heading">Tải lên từ máy tính của bạn</div>
                 <div class="type">
                     <a href="" class="btn btn-type" data-button="online"><i class="la la-globe"> CV
                             online</i></a>
                     <a href="" class="btn btn-type hidden" data-button="upload"><i class="la la-upload"> Tử tải
                             cv lên</i></a>
                 </div>
                 <div class="upload">
                     <div class="form-group">
                         <label for="">Họ và tên <span class="text-danger">* </span>: </label>
                         <input type="text" class="form-control" name="name" placeholder="Nguyễn Văn A"
                             value="">
                         <p class=" error-form text-danger mt-1"></p>

                     </div>
                     <div class="form-row">
                         <div class="col-md-6">
                             <div class="form-group">
                                 <label for="">Số điện thoại <span class="text-danger">*
                                     </span> : </label>
                                 <input type="text" class="form-control" name="phone" placeholder="0333383630"
                                     value="">
                                 <p class=" error-form text-danger mt-1"></p>
                             </div>
                         </div>
                         <div class="col-md-6">
                             <div class="form-group">
                                 <label for="" class="d-block">Địa chỉ email <span class="text-danger">*
                                     </span></label>
                                 <input type="text" class="form-control" name="email"
                                     placeholder="example@123job.vn">
                                 <p class=" error-form text-danger mt-1"></p>
                             </div>
                         </div>

                     </div>
                     <div class="form-group intro ">
                         <label for="" class="d-block">Giới thiệu về bản thân</label>
                         <textarea name="about" class="form-control valid" cols="2" rows="3"
                             placeholder="Viết giới thiệu ngắn gọn về bản thân (điểm mạnh, điểm yếu) và nêu rõ mong muốn, lý do làm việc tại công ty này. Đây là cách gây ấn tượng với nhà tuyển dụng nếu bạn có chưa có kinh nghiệm làm việc (hoặc CV không tốt)."></textarea>
                         <p class=" error-form text-danger mt-1"></p>

                     </div>
                     <input type="hidden" name="hash_slug" id="hash_slug">

                 </div>
                 <div class="button-foot text-right modal-footer">
                     <a rel="modal:close" class="btn btn-primary pl-4 pr-4 mr-2 js-apply-next">Hủy bỏ<i
                             class="la la-angle-right"></i></a>
                     <a href="#" class="btn btn-pink mr-2 js-store-apply">Nộp
                         hồ sơ</a>
                 </div>
             </div>

         </div>
     </form>
     <a href="#close-modal" rel="modal:close" class="close-modal"></a>
 </div>
