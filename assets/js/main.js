(function($) {

    const doc = $(document);
    const win = $(window);

    win.on("load", () => {
        init();
    });

    let init = () => {
        setWelcomeTime();
    }

    let setWelcomeTime = () => {
        let curTime = new Date();
        curTime = curTime.getHours();
        let welcomeTime = $('.welcomeTime');
        let welcomeMsg;
        if ( curTime < 12 ) {
            welcomeMsg = "Morning";
        } else if ( curTime > 12 && curTime < 17 ) {
            welcomeMsg = "Afternoon";
        } else if ( curTime > 17 ) {
            welcomeMsg = "Evening";
        }
        $(welcomeTime[0]).find("span").html(welcomeMsg);
    }

})(jQuery);