<html>
<head>
<title><?=$maintitle;?></title>
</head>
<body>
<?php
$udata = array('name'=>'username','id'=>'u','size'=>20);
$pdata = array('name'=>'password','id'=>'p','size'=>20);
echo form_open("wrzcms/verify");
echo form_label('username','u') ."<br/>";
echo form_input($udata) . "</p>";
echo form_label('password','p') ."<br/>";
echo form_password($pdata) . "</p>";
echo form_submit('submit','login');
echo form_close();
?>
</body>
</html>
