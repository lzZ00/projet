/*Javascript代码片段，这里使用jQuery*/

function check_values() {
    if ($("#username").val().length !== 0 && $("#password").val().length !== 0) {

        $("#loginbtn").animate({ left: '0' , duration: 'slow'});
        $("#lockbtn").animate({ left: '260px' , duration: 'slow'});
    }
}

$("#loginbtn").click(function(){
    $('#loading').removeClass('hidden');
    //登录相关后台处理，例如: Ajax请求
});



function showInfo(str){
        xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function(){
            if (xmlhttp.readyState==4 && xmlhttp.status == 200){
                if (xmlhttp.responseText == false){
                    document.getElementById("nom").innerHTML = "false";
                    document.getElementById("adresse").innerHTML = "";
                    document.getElementById("ville").innerHTML ="";
                }
                else {
                    var resu = xmlhttp.responseText.split(',');
                    document.getElementById("nom").innerHTML = resu[0] + " " + resu[1] + " " + resu[2];
                    document.getElementById("adresse").innerHTML = resu[3];
                    document.getElementById("ville").innerHTML = resu[4] + " " + resu[5];
                }
            }
        }
        xmlhttp.open("GET","info.php?q="+str,true);
        xmlhttp.send();

}
