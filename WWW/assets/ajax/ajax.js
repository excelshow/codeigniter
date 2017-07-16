var base_url='https://www.thinkmoon.cn/index.php/';
function new_xmlhttp(){
    var xmlhttp;
        if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
        }
        else
        {// code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
    return xmlhttp;
}
    function toast(url) {
        alert("正在处理。。请稍候");
        var xmlhttp = new_xmlhttp();
        xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                alert(xmlhttp.responseText);
            }
        }
        xmlhttp.open("GET",base_url+url,true);
        xmlhttp.send();
        return false;
    }
    function change_content(url)
    {
        document.getElementById("content").innerHTML="<br/>&nbsp;<h3>&nbsp;正在加载数据........请稍候！</h3>";
        var xmlhttp = new_xmlhttp();
        xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                document.getElementById("content").innerHTML=xmlhttp.responseText;
            }
        }

        xmlhttp.open("GET",base_url+url,true);
        xmlhttp.send();
        return false;
    }
    function update_data(url,id,data)
    {

        var xmlhttp = new_xmlhttp();
        xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
//                alert(xmlhttp.responseText);
                document.getElementById(id).innerHTML=xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET",base_url+url+data,true);
        //var str = '<?=base_url("index.php/")?>'+url+data;
        //alert(str);
        xmlhttp.send();
        return false;
    }
function born(id)
{
    if(document.getElementById(id).checked == true){
        alert('nice');
    }else{
        alert('yes');
    }
}
