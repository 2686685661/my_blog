
$(document).ready(function () {


    // var slideShow = $("#rightmenu");

    var slideShow = document.getElementById("rightmenu")
    slideShow.onmousemove = function () {
        var basnSliWidth = slideShow.offsetWidth;
        var basnSliHeight = slideShow.offsetHeight;
        var mouseX = event.offsetX;
        var mouseY = event.offsetY;
        var X = (basnSliWidth/2 - mouseX)/50;
        var Y = (basnSliHeight/2 - mouseY)/80;


        var aaa = document.getElementsByClassName('fh5co-post')[0];


        if(X>Y) {
            // var aaa = document.getElementsByClassName('fh5co-post')[0];
            aaa.style.marginTop = 0+'px';
            aaa.style.transition = 'all '+8+'s linear'
        }else {
            aaa.style.marginTop = -1800+'px';
            aaa.style.transition = 'all '+8+'s linear'
        }

    }


    // slideShow.onmouseout = function (event) {
    //     var x =slideShow.offsetX;
    //     var y = slideShow.offsetY;
    //     console.log(x+'   '+y);
    // }





    // slideShow.hover(function () {
    //     var x =slideShow.offsetX;
    //     var y = slideShow.offsetY;
    //     console.log(x+'   '+y);
    // })



    // slideShow.hover(function () {
    //
    //
    //
    //
    //     var obX = getOffsetTop(document.getElementById("rightmenu"));
    //     var obY = getOffsetLeft(document.getElementById("rightmenu"));
    //     var mouseX = event.clientX+document.body.scrollLeft;
    //     var mouseY = event.clientY+document.body.scrollTop;
    //     var objX = mouseX-obY;
    //     var objY = mouseY-obX;
    //
    //
    //
    //
    //     if(0<(objY/2)<210) {
    //
    //         console.log('xia');
    //     }else if(201<objY<490) {
    //         console.log('下');
    //     }
    //
    // })

})

function getOffsetTop(obj){
    var tmp = obj.offsetTop;
    var val = obj.offsetParent;
    while(val != null){
        tmp += val.offsetTop;
        val = val.offsetParent;
    }
    return tmp;
}

function getOffsetLeft(obj){
    var tmp = obj.offsetLeft;
    var val = obj.offsetParent;
    while(val != null){
        tmp += val.offsetLeft;
        val = val.offsetParent;
    }
    return tmp;
}
