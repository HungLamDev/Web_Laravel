import "jquery-modal";
import * as Toastr from "toastr";

var ApplyJob = {
    init: function () {
        this.showPopupApply();
        this.applyJob;
    },
    showPopupApply() {
        $(".js-apply-job").click(function (event) {
            event.preventDefault();
            let $this = $(this);
            let hashSlug = $this.attr("data-hash-slug");
            $("#hash_slug").val(hashSlug);
            $("#form-apply").modal({
                escapeClose: true,
                clickClose: true,
                ShowClose: true,
            });
            console.log(hashSlug);
        });
    },
    applyJob() {
        $(".js-store-apply").click(function (event) {
            event.preventDefault();
            let $form = $("#apply-form");
            var formData = $form.serialize();
            $.ajax({
                url: $form.attr("action"),
                type: "POST",
                data: formData,
                success: function (data) {
                    console.log(data);
                },
                error: function (response) {
                    console.log(reponse);
                },
            });
        });
    },
};
export default ApplyJob;
