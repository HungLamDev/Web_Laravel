import * as Toastr from "toastr";
var Favourite = {
    init: function () {
        this.saveFavourite;
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
                    console.log(response);
                    if (response.status === 200) {
                        Toastr.success("Thêm vào yêu thích thành công");
                    }
                },
                error: function (response) {
                    console.log(response);
                },
            });
        });
    },
};
export default Favourite;
