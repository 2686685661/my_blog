//
// if(typeof jQuery !='undefined'){
//
//     alert("jQuery library is loaded!");
//
// }else{
//
//     alert("jQuery library is not found!");
//
// }

$(document).ready(function(){

    $(".filePicker").click(function () {
        $("#fileImage").click();
    })

    $(".webuploader_pick").click(function () {
        $("#fileImage").click();
    })

    $("#fileSubmit").click(function () {
        $(".upload_btn").click();
    })


    $(".jFiler-input-dragDrop").click(function () {
        $("#demo-fileInput-4").click();
    })


});


imgRULs =[];
imgName = [];
imgSize = [];
files = [];
thefiles=[];

function hov(opn) {
    var a = opn.childNodes;
    for (var i=0;i<a.length;i++) {
        if(a[i].className == "file_bar") {
            a[i].className = "file_bar file_hover";
            break;
        }
    }
}

function seout(opn) {
    var a = opn.childNodes;
    for (var i=0;i<a.length;i++) {
        if(a[i].className == "file_bar file_hover") {
            a[i].className = "file_bar";
            break;
        }
    }
}

function getImgURL(node) {

    var imgURL = "";
    try{

        var file = null;
        files = node.files;
        // console.log(files);

        if(node.files && node.files[0] ){
            file = node.files[0];
        }else if(node.files && node.files.item(0)) {
            file = node.files.item(0);
        }

        try{
            imgURL =  file.getAsDataURL();
        }catch(e){
            if(files.length>1) {
                for (var j = 0, lens = files.length; j < lens; j++) {
                    imgRULs[j] = window.URL.createObjectURL(files[j]);
                    imgName[j] = files[j].name;
                    imgSize[j] = files[j].size;

                    thefiles[j] = files[j];

                }
            }else {
                imgRULs[0] = window.URL.createObjectURL(file);
                imgName[0] = file.name;
                imgSize[0] = file.size;
            }
        }
    }catch(e){
        if (node.files && node.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                imgURL = e.target.result;
            };
            reader.readAsDataURL(node.files[0]);
        }
    }

    photoExt=node.value.substr(node.value.lastIndexOf(".")).toLowerCase();//获得文件后缀名
    if(photoExt =='.jpg'||photoExt =='.png') {
        creatImg(imgRULs,imgName);
    }else if(photoExt =='.doc'||photoExt =='.txt'||photoExt =='.html'||photoExt =='.css'||photoExt =='.zip') {
        createDoc(imgRULs,imgName,imgSize);
    }else if(photoExt == '.ogg' ||photoExt == '.mp4') {
        createVideo(imgRULs,imgName,imgSize)
    }


    return imgURL;
}

function createDoc(docRUL,docName,docSize) {

    var htmltext = '';
    if(docRUL.length>0) {
        for (var i = 0, len = docRUL.length; i < len; i++) {
            htmltext += " <li class='jFiler-item jFiler-no-thumbnail' style='width: 49%;' data-jfiler-index='0'>" +
                "<div class='jFiler-item-container'><div class=jFiler-item-inner'><div class='jFiler-item-thumb'><div class='jFiler-item-status'></div><div class='jFiler-item-info'>" +
                "<span class='jFiler-item-title'> <b title='文件'>"+docName[i]+"</b> </span><span class='jFiler-item-others'>"+(docSize[i]/1000)+"kB</span> </div><div class='jFiler-item-thumb-image'>" ;


            if(String(docName[i]).indexOf('.doc') != -1) {
                htmltext +=  "<span class='jFiler-icon-file f-file f-file-ext-doc' style='-webkit-box-shadow: #384e53 42px -55px 0px 0px inset; -moz-box-shadow: #384e53 42px -55px 0px 0px inset; box-shadow: #384e53 42px -55px 0px 0px inset;'>.doc</span>";
            }else if(docName[i].indexOf('.txt') != -1) {
                htmltext +="<span class='jFiler-icon-file f-file f-file-ext-txt' style='-webkit-box-shadow: #709c27 42px -55px 0px 0px inset; -moz-box-shadow: #709c27 42px -55px 0px 0px inset; box-shadow: #709c27 42px -55px 0px 0px inset;'>.txt</span>";
            }else if(docName[i].indexOf('.html') != -1) {
                htmltext +="<span class='jFiler-icon-file f-file f-file-ext-html' style='-webkit-box-shadow: #abea7a 42px -55px 0px 0px inset; -moz-box-shadow: #abea7a 42px -55px 0px 0px inset; box-shadow: #abea7a 42px -55px 0px 0px inset;'>.html</span>";
            }else if(docName[i].indexOf('.css') != -1) {
                htmltext +="<span class='jFiler-icon-file f-file f-file-ext-css' style='-webkit-box-shadow: #038020 42px -55px 0px 0px inset; -moz-box-shadow: #038020 42px -55px 0px 0px inset; box-shadow: #038020 42px -55px 0px 0px inset;'>.css</span>";
            }else if(docName[i].indexOf('.zip') != -1) {
                htmltext +="<span class='jFiler-icon-file f-file f-file-ext-css' style='-webkit-box-shadow: #9cb945 42px -55px 0px 0px inset; -moz-box-shadow: #9cb945 42px -55px 0px 0px inset; box-shadow: #9cb945 42px -55px 0px 0px inset;'>.zip</span>";
            }

            htmltext +=" </div></div> <div class='jFiler-item-assets jFiler-row'>" +
                "<ul class='list-inline pull-left'> <li></li></ul><ul class='list-inline pull-right'>" +
                "<li><a style='"+docRUL[i]+"' class='icon-jfi-trash jFiler-item-trash-action' onclick='docdelete(this)'> <span style='display: none;'>"+docName[i]+"</span></a></li></ul></div></div></div> </li>";
        }
    }

    $("#listone").append(htmltext);
    
}



function createVideo(viRUL,viName,viSize) {
    var htmltext = '';

    htmltext += "<li class='jFiler-item jFiler-no-thumbnail' style='width: 49%;' data-jfiler-index='0'>" +
        "<div class='jFiler-item-container'><div class=jFiler-item-inner'><div class='jFiler-item-thumb'><div class='jFiler-item-status'></div><div class='jFiler-item-info'>" +
        "<span class='jFiler-item-title'> <b title='文件'>"+viName[0]+"</b> </span><span class='jFiler-item-others'>"+(viSize[0]/1000)+"kB</span> </div><div class='jFiler-item-thumb-image'>" ;

            if(String(viName[0]).indexOf('.mp4') != -1) {

                htmltext +=  "<span class='jFiler-icon-file f-file f-file-ext-doc' style='-webkit-box-shadow: #384e53 42px -55px 0px 0px inset; -moz-box-shadow: #384e53 42px -55px 0px 0px inset; box-shadow: #384e53 42px -55px 0px 0px inset;'>.mp4</span>";
            }else if(viName[0].indexOf('.ogg') != -1) {
                htmltext +="<span class='jFiler-icon-file f-file f-file-ext-txt' style='-webkit-box-shadow: #709c27 42px -55px 0px 0px inset; -moz-box-shadow: #709c27 42px -55px 0px 0px inset; box-shadow: #709c27 42px -55px 0px 0px inset;'>.ogg</span>";
            }

    htmltext +=" </div></div> <div class='jFiler-item-assets jFiler-row'>" +
        "<ul class='list-inline pull-left'> <li></li></ul><ul class='list-inline pull-right'>" +
        "<li><a style='"+viRUL[0]+"' class='icon-jfi-trash jFiler-item-trash-action' onclick='docdelete(this)'> <span style='display: none;'>"+viName[0]+"</span></a></li></ul></div></div></div> </li>";

    $("#listone").append(htmltext);
}





function creatImg(imgRUL,imgName){   //根据指定URL创建一个Img对象

    var htmltext ='';
    var delid = 0;
    if(imgRUL.length>0) {
        for (var j = 0, len = imgRUL.length; j < len; j++) {
            htmltext += "<div id='uploadList_"+j+"' class='upload_append_list'  onmouseover='hov(this)' onmouseout='seout(this)'>" +
                " <div class='file_bar'><div style='padding:5px;'>" +
                "<p class='file_name' title='图片'>"+imgName[j]+"</p>" +
                " <span id='del"+j+"' class='file_del' data-index=1' title='删除' onclick='depic("+j+")'></span>" +
                " </div> </div>" +
                " <a style='height:100px;width:120px;' class='imgBox'>" +
                "<div class='uploadImg' style='width:105px;max-width:105px;max-height:90px;'>" +
                " <img id='uploadImage_"+j+"' class=upload_image' src='"+imgRUL[j]+"'>" +
                " </div></a> </div>";
        }
    }
    $("#preview").append(htmltext);
}







function depic(id) {
   var imtinput =document.getElementById("fileImage");

    $("#uploadList_"+id).hide(1000);

    if(imtinput.outerHTML) {
        imtinput.outerHTML = imtinput.outerHTML;

        thefiles.splice(jQuery.inArray(thefiles[id],thefiles),1);

       var aaafile=imtinput.files;

        for(var j=0;j<thefiles.length;j++) {
            aaafile[j]=thefiles[j]
        }
       imtinput.files=aaafile;

        console.log(imtinput.files);



    }else {
        imtinput.value="";
    }

}

function fasonpic() {
    $.ajax({
        type:'post',
        url: "/files/picturelist",
        data:{'data':thefiles},
        cache: false,
        // headers:{
        //     'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        // },
        success:function (data) {
            alert('chenggong');
        }
    });
}


function docdelete(opn) {
    var aspan = opn.getElementsByTagName("span")[0];
    var aa = aspan.innerHTML;

    console.log(files);

    for(var i=0;i<files.length;i++) {

        if(aa == files[i].name) {
            removeByValue(files,files[i]);
            break;
        }
    }

    console.log(files);

}

function removeByValue(arr, val) {

    for(var i=0; i<arr.length; i++) {
        if(arr[i] == val) {
            delete arr[i];
            break;
        }
    }
}


function cilckReplyid(btn,id) {

    var name = document.getElementById('name'+id).value;
    var email = document.getElementById('email'+id).value;
    var text = document.getElementById('text'+id).value;

    if(name != '' && email != '' && text != '') {
        var myreg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
        if(myreg.test(email)) {
            if(text.length <160) {
                $(btn).prop("type","submit");

            }else {
                alert('评论内容过长');
                return false;
            }
        }else {
            alert('邮箱格式不正确');
            return false;
        }
    }else {
        alert('请填写完整！');
        return false;
    }
}






