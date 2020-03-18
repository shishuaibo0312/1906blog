<?php
	
	$account=empty($_POST['account'])?"":$_POST['account'];
	$user_pwd=empty($_POST['user_pwd'])?"":md5($_POST['user_pwd']);
	if(empty($account)){
	die("用户名不能为空");
	}
	if(empty($user_pwd)){
	die("密码必须必填");
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
	$user_name=addslashes($user_name);
	$sql="select * from p_users where user_name='{$account}'"."or email='{$account}'"."or phone='{$account}'"."and user_pwd='{$user_pwd}'";
	//echo $sql;die;
	$res=$dbh->query($sql);
	$row=$res->fetch(PDO::FETCH_BOTH);			//PDO处理结果集
	if(empty($row[0])){					//判断
		echo "登陆失败";
	}else{
		echo "登录成功";
	}
	
	
	