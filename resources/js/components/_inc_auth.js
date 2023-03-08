import * as Toastr from "toastr";
import "jquery-modal";
var Auth = {
    init: function () {
        this.runtoken();
        this.postLogin();
        this.postRegister();
        this.showMessagesLogin();
        this.saveFavourite();
        this.applyJob();
    },
    runtoken() {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
    },
    showMessagesLogin() {
        $(".js-Login-message").click(function (event) {
            event.preventDefault();
            Toastr.warning("Đăng nhập để thực hiện tính năng này ");
            return;
        });
    },
    postRegister() {
        $(".js-register").click(function (event) {
            event.preventDefault();
            let $form = $("#formRegister");
            var formData = $form.serialize();
            $.ajax({
                url: $form.attr("action"),
                type: "POST",
                data: formData,
                success: function (data) {
                    if (typeof data.email !== "undefined") {
                        location.reload();
                    }
                },
                error: function (response) {
                    if (response.status === 422) {
                        $.each(
                            response.responseJSON.errors,
                            function (field_name, error) {
                                $(document)
                                    .find("[name=" + field_name + "]")
                                    .parent()
                                    .after(
                                        '<span class="text-error">' +
                                            error +
                                            "</span>"
                                    );
                            }
                        );
                    }
                },
            });
        });
    },
    postLogin() {
        $(".js-Login").click(function (event) {
            event.preventDefault();
            let $formLogin = $("#formLogin");
            var formData = $formLogin.serialize();
            $.ajax({
                url: $formLogin.attr("action"),
                type: "POST",
                data: formData,
                success: function (response) {
                    if (response.status === 200) {
                        location.reload();
                    }
                },
                error: function (data) {
                    if (response.status === 422) {
                        $.each(
                            response.responseJSON.errors,
                            function (field_name, error) {
                                $(document)
                                    .find("[name=" + field_name + "]")
                                    .parent()
                                    .after(
                                        '<span class="text-error">' +
                                            error +
                                            "</span>"
                                    );
                            }
                        );
                    }
                },
            });
        });
    },
    saveFavourite() {
        $(".js-favourite").click(function (event) {
            event.preventDefault();
            let $this = $(this);
            let URL = $this.attr("data-url");
            console.log(URL);
            $.ajax({
                url: URL,
                type: "GET",
                success: function (response) {
                    if (response.status === 200) {
                        Toastr.success("Thêm vào yêu thích thành công");
                    }
                },
                error: function (response) {},
            });
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
                    $.modal.close();
                    $("#apply-form")[0].reset();
                    Toastr.success(data.messages);
                },
                error: function (response) {
                    console.log(response);
                },
            });
        });
    },
};
export default Auth;
