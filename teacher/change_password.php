<?php
include('session.php');

?>

<?php
$title="<title>Guidance School Management</title>";
include('header.php');
include('menu.php');
?>
<div id="body">
<?php  include('notices.php');  ?>
<?php  include('welcome.php');  ?>
<div class="mainjob">
<?php
include('leftbar.php');
?>

<div class="rightbar">
<h4>Change Password</h4>
<form method="POST" action="">
<label class="label1">Old Password :</label><input class="inputform" type="password" name="old_password" required="required" /><br />
<label class="label1">New Password :</label><input class="inputform" type="password" name="new_password" required="required" /><br />
<label class="label1">Confirm Password :</label><input class="inputform" type="password" name="confirm_password" required="required" /><br />
<input type="submit" class="submitbutton" name="submit" value="Change Password"/>
</form>
<?php
if(isset($_POST['submit'])){
$oldpassword=md5(trim($_POST['old_password']));
$newpassword=md5(trim($_POST['new_password']));
$confirmpassword=md5(trim($_POST['confirm_password']));
if(($oldpassword!="")&&($newpassword!="")&&($confirmpassword!="")){
if($newpassword==$confirmpassword){
include('connect.php');
$username=$adminuser['username'];
$query=mysql_query("SELECT password FROM teacher WHERE username='$username'");
$sql=mysql_fetch_assoc($query);
$password=$sql['password'];
if($oldpassword==$password){
$update=mysql_query("UPDATE teacher SET password='$confirmpassword' WHERE username='$username'");
if($update){
echo"<script>alert('Password Successfully Changed!!!')</script>";
}else{
echo mysql.error();
}
}else{
echo"<script>alert('Your Old Password Is Incorrect!!!')</script>";
}


}else{
echo"New And Confirm Password Does Not Match";
echo"<script>alert('New And Confirm Password Does Not Match!!!')</script>";
}
}else{
echo"All Fields Are Required";
}

}

?>
</div>
</div>
</div>

</body>
</html>
