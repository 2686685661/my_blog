



$(document).ready(function(){

    $(".jFiler-input-dragDrop").click(function () {
        $("#demo-fileInput-4").click();
    })

});


imgRULs =[];


function getImgURL(node) {



    alert(photoExt);
    var imgURL = "";
    try{

        var file = null;
        var files = node.files;

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
                }
            }else {
                imgRULs[0] = window.URL.createObjectURL(file);
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

}