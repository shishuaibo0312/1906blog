<?php

	$user_name=empty($_POST['user_name'])?"":$_POST['user_name'];
	$phone=empty($_POST['phone'])?"":$_POST['phone'];
	$email=empty($_POST['email'])?"":$_POST['email'];
	$user_pwd=empty($_POST['user_pwd'])?"":md5($_POST['user_pwd']);
	//echo $email;die;
	if(empty($user_name)){
	die("用户名不能为空");
	}
	if(empty($user_pwd)){
	die("密码必须必填");
	}
	if(empty($phone)){
	die("用户名不能为空");
	}
	if(empty($email)){
	die("邮箱必须必填");
	}

	//连接数据库
	$dsn = 'mysql:dbname=1906blog;host=127.0.0.1';
	$user = 'root';
	$password = 'root';
	$dbh = new PDO($dsn, $user, $password);
	if(!$dbh){
		echo "连接数据库失败";die;
	}
	echo "Success: 连接数据库成功"."<br>";
	//添加一条记录
	$sql="insert into p_users (user_name,email,user_pwd,phone) values('$user_name','$email','$user_pwd',$phone)";
	$res=$dbh->exec($sql);
	//print_r($res);
	//$id=$dbh->lastInsertId();    //返回自增ID
	//echo "自增ID：".$id;
	if($res==true){
		echo "注册成功";
		header("refresh:2,url='login.html'");
	}else{
		echo "注册失败";
		header("refresh:2,url='regist.html'");
	}