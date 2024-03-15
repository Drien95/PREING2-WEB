
<?php
session_start();

function nav_index(string $lien): string{
    if($_SERVER['SCRIPT_NAME'] === $lien){
        $file= $lien;
        return $file;
     }
     else{
         $file= '..' . $lien;
     }
     return $file;
}
// fonction qui déconne
function nav_class(string $lien): string{
    if($_SERVER['SCRIPT_NAME'] === $lien){
        $class='active';
    }
    else{
        $class='unactive';
    }
    return $class;
}
?>
<?php require_once dirname(__DIR__) . DIRECTORY_SEPARATOR .'class'. DIRECTORY_SEPARATOR .'catclass.php'; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>page d'acceuil</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../styles/acceuil1.css">
    <link rel="stylesheet" href="../styles/nav.css">
    <link rel="stylesheet" href="../styles/article.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>
    <div class="banner">
        <div class="navbar">
            <span style="cursor:pointer;"onclick="openNav()"><h3>||| </h3> </style></span>
            
            <div class="typewriter">
                <h1>NAG</h1>
            </div>
            <ul>
                <li><a href="<?php $_SERVER['REQUEST_URI']='/'; echo $_SERVER['REQUEST_URI'];?>">home</a></li>
                <li><a href="<?php $_SERVER['REQUEST_URI']='/pages/product.php'; echo $_SERVER['REQUEST_URI'];?>">SHOP</a></li>
                <li><a href="<?php $_SERVER['REQUEST_URI']='/pages/contact.php'; echo $_SERVER['REQUEST_URI'];?>">contact</a></li>
                <li><a href="<?php $_SERVER['REQUEST_URI']='/pages/panier.php'; echo $_SERVER['REQUEST_URI'];?>">
                        <div>PANIER</div>
                        <div id="petiteBubblePanier"></div>
                    </a>
                </li>
            <?php if(isset($_SESSION['id']) && !empty($_SESSION['id'])): ?>
                <li><a href="/pages/logout.php" class="login"><button>Logout</button></a></li>
                <li><a href="/pages/dashboard.php" class="register"><button>Dashboard</button></a></li>    
            <?php else: ?>
                <li><a href="/pages/login.php" class="login"><button>Login</button></a></li>
                <li><a href="/pages/register.php" class="register"><button>Register</button></a></li>        
            <?php endif ?>
            </ul>
            <div id="myNav" class="overlay">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <div class="overlay-content">
 
                    <?php if($_SERVER['SCRIPT_NAME']=='/index.php'):?>
                        <?php $cat = new categorie('./;data/cat.csv')?>
                        <?php $cat->displayCAT()?>
                    <?php else:?>
                        <?php $cat = new categorie('../;data/cat.csv')?>
                        <?php $cat->displayCAT()?>
                    <?php endif?>
                </div>
    
            </div>
        </div>
    </div>
