<?php require_once dirname(__DIR__) . DIRECTORY_SEPARATOR .'./elements'. DIRECTORY_SEPARATOR .'header.php'; ?>

<div class="content">
    <h2>Vos produits</h2>
    <div class="article-info">

    </div>
    <div class="total">
        <div id="PrixTOT"></div>
        <div><button id="vider-panier">Vider le panier</button></div>
    </div>
    <p>Click me!</p>
</div>

<div id="formulaire" class="formulaire">
    <div class="errorform" style="color:red;"></div>
    <div class="successform" style="color:green;"></div>
    <form action="" method="post" id="postform">

    </form>
</div>


<script src="../scripts/panier.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.4/jquery.validate.min.js" integrity="sha512-FOhq9HThdn7ltbK8abmGn60A/EMtEzIzv1rvuh+DqzJtSGq8BRdEN0U+j0iKEIffiw/yEtVuladk6rsG4X6Uqg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<?php require_once dirname(__DIR__) . DIRECTORY_SEPARATOR .'./elements'. DIRECTORY_SEPARATOR .'footer.php'; ?>