<?php
// 服务器 server
header("Access-Control-Allow-Origin: *");  // 允许  所有
header("Content-Type: application/json; charset=UTF-8"); // json格式

//Connect to the server/db
$link = mysqli_connect("localhost", "root", "", "bookdb");//  "root", "",用户名 密码
$query = "SELECT * FROM books";// 查询 语句

$result = mysqli_query ($link, $query) or die ("query failed");// 开始 查询


//Get books 处理 查询 结果成 JSON格式
$outp = "";
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))// 查询 结果 在 数组 里
	{

  if ($outp != "") //  不是第一条数据
    {$outp .= ",";}  // 拼接 一个 逗号，  因为 每条数据 以逗号 分隔
//一条  数据 非常 重要 开始 
  $outp .= '{"ISBN":"'  . $row["isbn"] . '",';
  $outp .= '"Title":"'   . $row["title"]        . '",';
  $outp .= '"Author":"'. $row["author"]     . '"}';
//一条  数据 结束 		  
	}

    //把所有 数据 放在 数组[]里，然后 再包 最外层 的 {}
$outp ='{"records":['.$outp.']}';
//发送 给 client
echo($outp);

//关闭连接
mysqli_close($link);
?>   
