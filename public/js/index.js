$(document).ready(function() {
    //添加图片
    $("div .subMenu>img").each(function() {
        var name = $(this).attr("data-imgname");
        var src = "/icon/icon-" + name + ".png";
        //设置img的属性和值。
        $(this).attr("src", src);
    });

    //点击事件
    $("div .subMenu").click(function() {
        // 取消当前激活状态
        var $img = $(".active>img");
        //返回被选元素的属性值
        var name = $img.attr("data-imgname");
        var src = "/icon/icon-" + name + ".png";
        $img.attr("src", src);
        $(".active").removeClass("active");

        // 添加新状态
        $(this).addClass("active");
        //找到所有 div(subMenu) 的子元素(img)
        $img = $(this).children("img");
        name = $img.attr("data-imgname");
        var src = "/icon/icon-" + name + "-click.png";
        //设置img的属性和值。
        $img.attr("src", src);

        //content根据点击按钮加载不同的html
        var page = $(this).attr("data-src");
        if (page) {
            window.location.href = page
        }
    });
    //点击事件
    $(".unite-a").click(function() {
        //content根据点击按钮加载不同的html
        var page = $(this).attr("data-src");
        if (page) {
            window.location.href = page
        }
    });
});

/*content高度*/
function initSize() {
    var height = $(window).height() - $("header").height() - $("#description").height() - $("#menu").height();
    $("#content").height(height + "px");
}