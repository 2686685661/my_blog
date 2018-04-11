
function PreviewImage(imgFile) {
    var filextension = imgFile.value.substring(imgFile.value.lastIndexOf("."), imgFile.value.length);
    filextension = filextension.toLowerCase();
    if ((filextension != '.jpg') && (filextension != '.jpg')  && (filextension != '.jpeg') && (filextension != '.png')) {
        alert("对不起，系统仅支持标准格式的照片，请您调整格式后重新上传，谢谢 !");
        imgFile.focus();
    }
    else {
        var path;
        if (document.all)//IE
        {
            imgFile.select();
            path = document.selection.createRange().text;
            document.getElementById("imgPreview").innerHTML = "";
            document.getElementById("imgPreview").style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(enabled='true',sizingMethod='scale',src=\"" + path + "\")";//使用滤镜效果
        }
        else//FF
        {
            if(imgFile.files.length>1) {
                alert('对不起，文章封面只能选择一张，谢谢！');
                imgFile.focus();
            }
            path = window.URL.createObjectURL(imgFile.files[0]);
            document.getElementById("imgPreview").innerHTML = "<img id='img1' width='120px' height='100px' src='" + path + "'/>";
            // document.getElementById("img1").src = path;
        }
    }
}