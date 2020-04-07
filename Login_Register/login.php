<?php
header("Content-type: text/html; charset=utf-8");
session_start(); //初始化session变量
$Qname = $_POST['Qname']; //接收表单提交的用户名
$password=$_POST['password']; //接收表单提交的密码
$link = mysqli_connect('localhost','root','123456','mydata');
if($link->connect_error){
    die("连接失败！".$link->connect_error);
}
$sql = "SELECT Qname,student_num,password from student";
$result = $link->query($sql);

if ($result->num_rows > 0) {
    $i=1;
    while($row = $result->fetch_assoc()) {
         $userarr[$i]=$row["Qname"];
         $pwarr[$i]=$row["password"];
         $i++;
    }
} else {
    echo "表单为空!";
}
if(($key=array_search($Qname,$userarr))!=null){
    if($password==$pwarr[$key]){
        echo "登录成功！";
    }else{
        echo "密码错误！";
    }
}else{
    echo "没有此用户！";
}
$link->close();
?>