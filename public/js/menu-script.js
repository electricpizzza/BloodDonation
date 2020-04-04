$(function () {
    let menustat = 0;
    $(".bd-prop").hide();
    $("#menu-bd").click(function () {
        if (menustat == 0) {
            $("#menu-bd").html("<i class='fas fa-times icons-bd icons-bd-main-x'></i>");

            $("#menu-bd").css("backgroundColor", "#ff596d");
            $("#menu-layout").animate({
                top: '50vh',
                right: '-250px',
                opacity: 1
            }, 100);
            $(".bd-prop").show();
            $(".home-bd").animate({
                top: '110px',
                left: '-150px',
                opacity: 1
            }, 100);
            $(".contact-bd").animate({
                top: '-90px',
                left: '150px',
                opacity: 1
            }, 300);
            $(".about-bd").animate({
                top: '50px',
                opacity: 1
            }, 200);
            menustat = 1;
        }
        else if (menustat == 1) {
            $("#menu-bd").html("<i class='fas fa-bars icons-bd icons-bd-main'></i>");
            $("#menu-bd").css("backgroundColor", "rgb(255, 234, 236)");
            $(".home-bd").animate({
                top: '0px',
                left: '0px',
                opacity: 0
            }, 100);
            $(".contact-bd").animate({
                top: '-200px',
                left: '0px',
                opacity: 0
            }, 300);
            $(".about-bd").animate({
                top: '-100px',
                opacity: 0
            }, 200);
            $("#menu-layout").animate({
                top: '70vh',
                right: '-350px',
                opacity: 1
            }, 100);
            menustat = 0;
            setTimeout(function () { $(".bd-prop").hide(); }, 300);
        }


    });


});