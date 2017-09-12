// //new 一个xmlhttp对象
// function new_xmlhttp(){
//     var xmlhttp;
//         if (window.XMLHttpRequest)
//         {// code for IE7+, Firefox, Chrome, Opera, Safari
//             xmlhttp=new XMLHttpRequest();
//         }
//         else
//         {// code for IE6, IE5
//             xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
//         }
//     return xmlhttp;
// }
// //该函数想直接弃用，但是考虑到兼容性，留在此处
//     function toast(url) {
//     	//alert(url);
//         alert("正在处理。。请稍候");
//         var xmlhttp = new_xmlhttp();
//         xmlhttp.onreadystatechange=function()
//         {
//             if (xmlhttp.readyState==4 && xmlhttp.status==200)
//             {
//                 alert(xmlhttp.responseText);
//             }
//         }
//         xmlhttp.open("GET",base_url+url,true);
//         xmlhttp.send();
//         return false;
//     }
//     //这是一个改变中心内容的函数
//     function change_content(url)
//     {
//         $("#content").html("<br/>&nbsp;<h3>&nbsp;正在加载数据........请稍候！</h3>");
//         request_url = base_url+url;
//         htmlobj=$.ajax({
//             url:request_url,
//             success:function(data,textStatus){
//                  $("#content").html(data);
//              }
//         });
//         return false;
//     }
//     //这是改变部分id内容的函数
//     function update_data(url,id,data)
//     {
//         var xmlhttp = new_xmlhttp();
//         xmlhttp.onreadystatechange=function()
//         {
//             if (xmlhttp.readyState==4 && xmlhttp.status==200)
//             {
// //                alert(xmlhttp.responseText);
//                 document.getElementById(id).innerHTML=xmlhttp.responseText;
//             }
//         }
//         xmlhttp.open("GET",base_url+url+data,true);
//         var str = url+data;
//         //alert(str);
//         xmlhttp.send();
//         return false;
//     }
function btn_click(url){
    $('#mymodal_content').html('加载中');
    $('#myModal').modal('show');
    request_url = base_url+url;
    htmlobj=$.ajax({url:request_url,async:false});
    $("#mymodal_content").html(htmlobj.responseText);
}
    