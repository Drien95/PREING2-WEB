<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Document</title>
</head>
<?php 
if(!empty($_POST['name']) && !empty($_POST['pwd'])){
    if(file_exists('../;data/client.xml')){
        $check = false;
        $xml = new SimpleXMLElement('../;data/client.xml', 0,true);
        print_r($xml);
        foreach($xml->children() as $user){
            if(strval($user->name) === $_POST['name'] && strval($user->pwd) === $_POST['pwd']){
                session_start();
                $_SESSION['id'] = strval($user->id);
                if(strval($user->admin) === "1"){
                    $_SESSION['admin'] = "1";
                } else {    
                    $_SESSION['admin'] = "0";
                }
                $check = true; 
            }
        }
        if ($check === true)
            header("Location: /");
    }
}
?>
<body>
    <form action="" method="post">
        <h1>Connexion</h1>
        <div class="social-media">
            <p><i class="fa-brands fa-google"></i></p>
            <p><i class="fa-brands fa-twitter"></i></p>
            <p><i class="fa-brands fa-facebook"></i></p>
            <p><i class="fa-brands fa-instagram"></i></p>
        </div>

        <div class="input-grp">
            <input type="user" name="name" placeholder="Nom d'utilisateur">
            <input type="password" name="pwd" placeholder="Mot de passe">
            <a href="#"><h5 class="forgot">mot de passe oublié ?</h5></a>
        </div>
        
        <div class="log">Pas encore inscrit ? <a href="#">S'inscrire</a></div>
        <div class="submit-but"><button class="log-but">Se connecter</button></div>
        <div class="other-co">
            <button class="log-o" style="width: 200px;"><i class="fa-brands fa-google"></i>oogle</button>
            <button class="log-o" style="width: 200px;"><i class="fa-brands fa-facebook"></i>acebook</button>
        </div>

    </form>
</body>
</html>