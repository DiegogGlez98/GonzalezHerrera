<?php




if ($_SERVER["REQUEST_METHOD"]=="POST"){

  $user=$_POST['username'];
  $pass=$_POST['password'];
  
  
  $login = array("username" => $user, "password" => $pass);
      $endpoint = "http://localhost/api_restful/controllers/users.php?op=selectusr";
      $ch = curl_init($endpoint);
      $payload = json_encode($login);
      //attach encoded JSON string to the POST fields
      curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
      //set the content type to application/json
      curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
      //return response instead of outputting
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      //execute the POST request
      $response = curl_exec($ch);
      //close cURL resource
      curl_close($ch);
  
 
  
  $response=json_decode($response,true);
  
  for ($i=0; $i < count($response); $i++) { 
  
    $username=$datos($i)['username'];
    $password=$datos($i)['password'];
  
  //privilegio
  }
  
  if ($user==$username && $password==$pass) {
    session_start();
    $_SESSION['username']=$user;
    $_SESSION['password']=$pass;
  
  
    echo "<script>
    alert('bienvenido');
    location.href='inicio.php';
  </script>";
  } else {
  echo "<script>
    alert('Error, Intente de Nuevo');
    location.href='index.php';
  </script>";
  
  }

}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
    <table>
    <form acction="" method="post">
  <!-- Email input -->
  <div class="form-outline mb-4">
    <input type="text" id="form2Example1" name="username" class="form-control" />
    <label class="form-label" for="form2Example1">Usuario</label>
  </div>

  <!-- Password input -->
  <div class="form-outline mb-4">
    <input type="password" id="form2Example2" name="password" class="form-control" />
    <label class="form-label" for="form2Example2">Password</label>
  </div>


  <!-- Submit button -->
  <input type="submit" class="btn btn-primary btn-block mb-4">

  </div>
</form>

    </table>
    
</body>
</html>