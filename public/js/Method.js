
function overs(id) {
    document.getElementById(id).style.display="none";


}

function videoOver(id) {
    document.getElementById("video_"+id).style.display = "none";

    document.getElementById("vid"+id).pause();
}

function videoBlock(id) {
    document.getElementById("video_"+id).style.display = "block";

    document.getElementById("vid"+id).play();
}

function block(id) {
    document.getElementById(id).style.display = "block";
}

function Verification(id,btn) {
    var title = document.getElementById("title_"+id).value;
    var intro = document.getElementById("intro_"+id).value;

    if(title != '') {
        if(title.length>15) {
            alert('视频标题过长！');
        }else {
            if(intro.length>150) {
                alert('视频简介过长！');
            }else {
                $(btn).prop("type","submit");
            }
        }

    }else {
        alert('视频标题请填写完整！');
    }
}
