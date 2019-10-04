<?php
include("php/dbconnect.php");

$error = '';
if(isset($_POST['login']))
{

$username =  mysqli_real_escape_string($conn,trim($_POST['username']));
$password =  mysqli_real_escape_string($conn,$_POST['password']);

if($username=='' || $password=='')
{
$error='All fields are required';
}

$sql = "select * from user where username='".$username."' and password = '".md5($password)."'";

$q = $conn->query($sql);
if($q->num_rows==1)
{
$res = $q->fetch_assoc();
$_SESSION['rainbow_username']=$res['username'];
$_SESSION['rainbow_uid']=$res['id'];
$_SESSION['rainbow_name']=$res['name'];
echo '<script type="text/javascript">window.location="index.php"; </script>';

}else
{
$error = 'Invalid Username or Password';
}

}

?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mokėjimų administravimo sistema</title>


    <link href="css/bootstrap.css" rel="stylesheet" />
  
    <link href="css/font-awesome.css" rel="stylesheet" />
 
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
<style>
   body {
         background: linear-gradient(0.75turn,white, #069,#20204E);
     }
.myhead{
margin-top:0px;
margin-bottom:0px;
text-align:center;
color: #FFFFFF;
}
</style>

</head>
<body >
    <div class="container">
        
         <div class="row ">
               
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                          
                            <div class="panel-body" style="background-color: #011A27; margin-top:50px; border:solid 4px #4D648D;">
							  <h3 class="myhead">Mokėjimų administravimo sistema</h3>
                                <form role="form" action="login.php" method="post">
                                    <hr />
									<?php
									if($error!='')
									{									
									echo '<h5 class="text-danger text-center">'.$error.'</h5>';
									}
									?>
									
                                   
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                            <input type="text" class="form-control" placeholder="Vartotojo vardas " name="username" required />
                                        </div>
                                        
									<div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" class="form-control"  placeholder="Slaptažodis" name="password" required />
                                        </div>
										
                                    <div class="form-group">
                                           
                                            <span class="pull-right">
                                                   <a href="labas.html" >Pamiršote slaptažodį ? </a> 
                                            </span>
                                     </div>
                                     
                                     <button class="btn btn-primary" type= "submit" name="login">Prisijungti</button>
                                   
                                    </form>
                            </div>
                           
                        </div>
                
                
        </div>
    </div>

</body>
</html>
