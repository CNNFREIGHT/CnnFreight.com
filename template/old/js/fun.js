$(function () {
    centerBlock($(".banner .hd ul"));
    hover();
    $(".header #nav ul li.cur").find("a").addClass("cur");

    //loading
    $("body").queryLoader2({
        "backgroundColor": "rgba(0,0,0,0)",
        "completeAnimation": "fade",
        "percentage": false,
        "deepSearch": true,
        onComplete: function () {
            $(".header #nav ul li.cur").find("a").removeClass("cur");
            $(".nav_line").css("visibility", "visible");
        }
    })

    //手机端微信二维码
    $(".foot3").click(function () {
        if ($(this).hasClass("cur")) {
            $(this).removeClass("cur");
            $(".foot3 span").fadeOut(300);
        } else {
            $(this).addClass("cur");
            $(this).find("span").fadeIn(300);
        }
    })

    $(".foot5").click(function () {
        if ($(this).hasClass("cur")) {
            $(this).removeClass("cur");
            $(".foot5 span").fadeOut(300);
        } else {
            $(this).addClass("cur");
            $(this).find("span").fadeIn(300);
        }
    })

    //返回顶部
    if ($(window).width() >= 1024) {
        $(window).scroll(function () {
            var scrollValue = $(window).scrollTop();
            if (scrollValue > 200) {
                $(".backTop").fadeIn(200);
            } else {
                $(".backTop").fadeOut(200);
            }
        });
        $(".backTop").click(function () {
            $('html,body').animate({ scrollTop: 0 }, 700);
        })
        
        //头部鼠标跟着线移动
        var nav = $("#nav");
        var navLine = nav.find(".nav_line");
        var defLineW = nav.find(".cur").width() - 0 + 'px';
        var defLineLeft = nav.find(".cur").position().left + 0 + 'px';
        navLine.css({ left: defLineLeft, width: defLineW });
        nav.find("li").hover(function () {
            var index = $(this).index();
            var curLineW = nav.find("li").eq(index).width() - 0 + 'px';
            var curLineLeft = $(this).position().left + 0 + 'px';
            navLine.stop().animate({
                left: curLineLeft,
                width: curLineW
            }, 300);
        }, function () {
            navLine.stop().animate({
                left: defLineLeft,
                width: defLineW
            }, 300);
        })

        //下拉菜单
        $("#nav li").each(function () {
            $(this).mouseover(function () {
                $(this).find("div").show();
            });
            $(this).mouseleave(function () {
                $(this).find("div").hide();
            });
        });
           
        
        //var t;
        //$('.header #nav ul li div').hover(function () {
        //    clearTimeout(t);
        //}, function () {
        //    $('.header #nav ul li').removeClass('cur');
        //    t = setTimeout(function () {
        //        $('.header #nav ul li div').not('.cur').stop(true, true).slideUp(300);
        //    }, 100);
        //});
        //$('.header #nav ul li').hover(function () {
        //    $(this).addClass('cur').siblings().removeClass('cur');
        //    $(this).find("div").slideDown(200).parent().siblings().find("div").slideUp(200);
        //});

        //微信二维码
        $(".foot3, .top3").hover(function () {
            $(this).find("span").fadeIn(300);
        }, function () {
            $(this).find("span").fadeOut(300);
        })
        $(".foot5, .top5").hover(function () {
            $(this).find("span").fadeIn(100);
        }, function () {
            $(this).find("span").fadeOut(100);
        })
    } else if (510 < $(window).width() < 1024) {
        //头部鼠标跟着线移动
        var nav = $("#nav");
        var navLine = nav.find(".nav_line");
        var defLineW = nav.find(".cur").width() - 0 + 'px';
        var defLineLeft = nav.find(".cur").position().left + 0 + 'px';
        navLine.css({ left: defLineLeft, width: defLineW });
        nav.find("li").hover(function () {
            var index = $(this).index();
            var curLineW = nav.find("li").eq(index).width() - 0 + 'px';
            var curLineLeft = $(this).position().left + 0 + 'px';
            navLine.stop().animate({
                left: curLineLeft,
                width: curLineW
            }, 300);
        }, function () {
            navLine.stop().animate({
                left: defLineLeft,
                width: defLineW
            }, 300);
        })

        //下拉菜单
        $("#nav li").each(function () {
            $(this).mouseover(function () {
                $(this).find("div").show();
            });
            $(this).mouseleave(function () {
                $(this).find("div").hide();
            });
        });
    }
    else {
        $(window).scroll(function () {
            var scrollValue = $(window).scrollTop();
            if (scrollValue > 50) {
                $(".backTop").fadeIn(200);
            } else {
                $(".backTop").fadeOut(200);
            }
        });
        $(".backTop").click(function () {
            $('html,body').animate({ scrollTop: 0 }, 700);
        })

        //手机端微信二维码
        $(".foot3").click(function () {
            if ($(this).hasClass("cur")) {
                $(this).removeClass("cur");
                $(".foot3 span").fadeOut(300);
            } else {
                $(this).addClass("cur");
                $(this).find("span").fadeIn(300);
            }            
        })

        $(".foot5").click(function () {
            if ($(this).hasClass("cur")) {
                $(this).removeClass("cur");
                $(".foot5 span").fadeOut(300);
            } else {
                $(this).addClass("cur");
                $(this).find("span").fadeIn(300);
            }
        })
    }

    $(".alertBox a").click(function () {
        $(".alertBox").fadeOut(200);
    })

    //申请职位弹出框
    $(".popBox .close").click(function () {
        $(".popBox").fadeOut(200);
    })
    $(".apply").click(function () {
        $(".popBox").fadeIn(200);
    })

    //新闻字数限制
    $(".list li").each(function () {
        var obj = $(this).find("p a");
        letterLimited(obj, 120);
    })    
})

//居中
function centerBlock(object) {
    var objectH = object.outerWidth();
    object.css("margin-left", -objectH / 2);
}

function hover() {
    $(".more .moreBtn").hover(function () {
        $(this).html("View details 》");
    }, function () {
        $(this).html("More 》");
    })
}

//同策高管
$(function(){
    $(".exe2 li").each(function () {
        $(this).click(function () {
            $(this).addClass("cur").siblings().removeClass("cur");
            if ($(window).width() < 510) {
                var top = $(".title_h2").offset().top;
                $('html,body').animate({ scrollTop: top }, 300);
            }            
        })
    })
})

//企业合作
function projectSlide() {
    var bx_w = $(".max").outerWidth() / 4;

    $('.min .bxslider').bxSlider({
        minSlides: 1,
        maxSlides: 4,
        slideWidth: bx_w,
        pager: false,
        infiniteLoop: false,
        moveSlides: 1
    });
    $(".min, .cooperate_cont .pic_cont .min .bx-next, .cooperate_cont .pic_cont .min .bx-prev").height(bx_w * 488 / 868);

    $('.min li').click(function() {
        var srch = $(this).find('img').attr('src');
        $('.max img').attr('src', srch);
        var srch3 = $(this).find('a').attr('href');
        var srch2 = $(this).find('a').attr('target');
        $('.max a').attr({ 'href': srch3, 'target': srch2 });
        var srch5 = $(this).find('h2').html();
        $('.black p').html(srch5);
        $(this).addClass('cur').siblings().removeClass('cur');
    });
}

//社会招聘下拉
$(function () {
    $(".cityBox > em").click(function () {
        if ($(this).hasClass("cur")) {
            $(this).next().slideUp(200);
            $(this).removeClass("cur");
        } else {
            $(this).addClass("cur");
            $(this).next().slideDown(200);
        }
    })
    $(".optionBox span").each(function () {
        $(this).click(function () {
            var city = $(this).text();
            $(".cityBox > em").html(city);
            $(this).parent().prev().removeClass("cur");
            $(this).parent().slideUp(200);
        })
    })
})

//ie8兼容placeholder
if (!('placeholder' in document.createElement('input'))) {

    $('input[placeholder],textarea[placeholder]').each(function () {
        var that = $(this),
        text = that.attr('placeholder');
        if (that.val() === "") {
            that.val(text).addClass('placeholder');
        }
        that.focus(function () {
            if (that.val() === text) {
                that.val("").removeClass('placeholder');
            }
        })
        .blur(function () {
            if (that.val() === "") {
                that.val(text).addClass('placeholder');
            }
        })
        .closest('form').submit(function () {
            if (that.val() === text) {
                that.val('');
            }
        });
    });
}

//手机导航
$(function () {
    $(".ham > img").click(function () {
        $(".hamBox").slideDown(300);
       
    })
    $(".ham .closeBtn").click(function () {
        $(".hamBox").slideUp(300);
    })
    $(".hamBox li").click(function () {
        if ($(this).children().is("div")) {
            if ($(this).hasClass("cur")) {
                $(this).removeClass("cur");
                $(this).find("div").slideUp(300);
            } else {                
                $(".hamBox li div").slideUp(300);
                $(".hamBox li").removeClass("cur");
                $(this).addClass("cur");
                $(this).find("div").slideDown(300);
            }
        }       
        
    })
})

//限制字数
function letterLimited(object, num) {
    var str = object.html();
    if (str.length > num) {
        object.html(str.substr(0, num) + "...");
    }
}

//时间表动效
function timeLine(obj, leftObj, rightObj) {
    $(window).scroll(function () {
        var scrollValue = $(window).scrollTop();
        var topH = obj.offset().top - scrollValue;
        alert(topH);
        if (topH < 100) {
            if (obj.hasClass(leftObj)) {
                obj.addClass("cur_left");
            } else if (obj.hasClass("rightObj")) {
                obj.addClass("cur_right");
            }
        }       
        
    });
}

//锚点移动
function move(mao, speed) {
    if (mao.length > 0) {
        var pos = mao.offset().top;
        var posX = mao.offset().left;
        var poshigh = mao.height();
        $("html,body").animate({ scrollTop: pos-120, scrollLeft: posX }, speed, "easeOutCirc");
    }
}

//
function house() {
    $(window).scroll(function () {
        var scrollValue = $(window).scrollTop();
        var topH = $(".personal_cont .intro > div").offset().top - scrollValue;
        if (topH <= $(window).height()-180) {
            setTimeout(function () {
                $(".personal_cont .intro > div").addClass("cur");
            }, 200);            
        } else {
            $(".personal_cont .intro > div").removeClass("cur");
        }

    });
}


//
function onehand(){
    var width = $(window).width();
    if (width > 510) {
        $("#imgbox").gridalicious({
            gutter: 14,
            width: 190,
            animate: true,
            animationOptions: {
                speed: 300,
                duration: 400,
            },
        });
    } else {
        $("#imgbox").gridalicious({
            gutter: 10,
            width: 140,
            animate: true,
            animationOptions: {
                speed: 300,
                duration: 400,
            },
        });
    }
    $('.houseBox .imgbox').delay(200).animate({ 'opacity': '1' });
    $('.houseBox .imgbox .item .img').height($('.houseBox .imgbox .item .img img').height());


}


//
function housedetail() {
    var bigwidth = $('.bigimg .item').width();
    var smallwidth = $('.smallimg li').width() + 14;
    var imgall = parseInt($('.bigimg .item').length);
    var num = 1;
    $('.slider').width(bigwidth * imgall);
    $('.small ul').width(smallwidth * imgall);
    $(window).resize(function () {
        var bigwidth = $('.bigimg .item').width();
        var smallwidth = $('.smallimg li').width() + 14;
        var imgall = parseInt($('.bigimg .item').length);
        $('.slider').width(bigwidth * imgall);
        $('.small ul').width(smallwidth * imgall);
    });
    $('.imgrightbtn').click(function () {
        if (num < imgall) {
            $('.slider').animate({ 'marginLeft': -bigwidth * num });
            if (num < imgall - 3) {
                $('.small ul').animate({ 'marginLeft': -smallwidth * num });
            } else {
                $('.small ul').animate({ 'marginLeft': -smallwidth * (imgall - 3) });
            }
            num++;
        } else if (num == imgall) {
            $('.slider').animate({ 'marginLeft': 0 });
            $('.small ul').animate({ 'marginLeft': 0 });
            num = 1;
        }
    })
    $('.imgleftbtn').click(function () {
        if (num <= imgall && num > 1) {
            $('.slider').animate({ 'marginLeft': -bigwidth * (num - 2) });
            if (num <= imgall - 1) {
                $('.small ul').animate({ 'marginLeft': -smallwidth * (num - 2) });
            } else {
                $('.small ul').animate({ 'marginLeft': -smallwidth * (imgall - 3) });
            }
            num--;
        } else if (num == 1) {
            $('.slider').animate({ 'marginLeft': -bigwidth * (imgall - 1) });
            $('.small ul').animate({ 'marginLeft': -smallwidth * (imgall - 3) });
            num = imgall;
        }
    })
    $('.small ul li').click(function () {
        var index = $(this).index();
        $('.slider').animate({ 'marginLeft': -bigwidth * index });
        if (index < imgall - 3) {
            $('.small ul').animate({ 'marginLeft': -smallwidth * index });
        } else {
            $('.small ul').animate({ 'marginLeft': -smallwidth * (imgall - 3) });
        }
        $('#caseCurrent').text(index + 1);
        num = index + 1;
    })
    var windowWidth = $(window).width();
    if (windowWidth <= 510) {
        var imgWidth = $('.housedetailBox .imgBox').width();
        var imgHeight = imgWidth * 10 / 16;
        var li = (imgWidth - 86) / 3;
        var bigwidth = imgWidth;
        var smallwidth = li + 14;
        $('.bigimg .item,.bigimg').width(imgWidth).height(imgHeight);
        $('.smallimg .small').width(imgWidth - 44);
        $('.smallimg .small li').width(li).height(li);
        $('.imgleftbtn,.imgrightbtn').height(li);
    }
    $(window).resize(function () {
        var imgWidth = $('.housedetailBox .imgBox').width();
        var imgHeight = imgWidth * 10 / 16;
        var li = (imgWidth - 86) / 3;
        var bigwidth = imgWidth;
        var smallwidth = li + 14;
        $('.bigimg .item,.bigimg').width(imgWidth).height(imgHeight);
        $('.smallimg .small').width(imgWidth - 44);
        $('.smallimg .small li').width(li).height(li);
        $('.imgleftbtn,.imgrightbtn').height(li);
    })
}