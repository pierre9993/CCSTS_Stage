$("#menu-btn").on("click", function () {
    const menucss = $("#menu-head");

    if (menucss.css("display") == "none") {
        if ($('#header-menu>#menu-btn').length===0) {
            menucss.css("top", '70px');
        };
        menucss.css("display", "flex");
        setTimeout(() => {
            menucss.css("right", '0px');

        }, 50);
        //  $menucss.css("right","0px");

    }
    else {

        menucss.css("right", "-178px");
        setTimeout(() => {
            menucss.css("display", 'none');

        }, 100);;

    }

})



