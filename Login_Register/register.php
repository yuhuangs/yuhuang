<?
    header('Content-type:text/html;charset=utf-8');
    $Q_name = $_POST['Q_name'];
    $StudyNum = $_POST['StudyNum'];
    $password = $_POST['Password'];
    $link = mysqli_connect('localhost','root','123456',"mydata");
    if(!$link){
        die('连接数据库失败!'.mysqli_error());
    }
    mysqli_query($link,"SELECT * FROM student");
    $rst=mysqli_query($link,"INSERT INTO student(Qname,student_num,password)
    VALUES('$Q_name','$StudyNum','$password')");
    if($rst){
        echo "您已成功注册！<br>点击链接跳转";
        echo '<a href="login.html">返回登陆界面</a>';
    }else{
        echo "注册失败！";
    }
?>