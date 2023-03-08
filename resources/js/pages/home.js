import Favourite from "../components/_inc_favourite";
import Auth from "../components/_inc_auth";
import ApplyJob from "../components/_inc_apply_job";
var Home = {
    init: function () {},
};
$(function () {
    Home.init();
    Auth.init();
    Favourite.init();
    ApplyJob.init();
});
