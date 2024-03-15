<?php require_once dirname(__DIR__) . DIRECTORY_SEPARATOR .'./elements'. DIRECTORY_SEPARATOR .'header.php'; ?>
<?php require_once dirname(__DIR__) . DIRECTORY_SEPARATOR .'./class'. DIRECTORY_SEPARATOR .'article.php'; ?>
<?php require_once dirname(__DIR__) . DIRECTORY_SEPARATOR .'./class'. DIRECTORY_SEPARATOR .'productsclass.php'; ?>
<?php require_once dirname(__DIR__) . DIRECTORY_SEPARATOR .'class'. DIRECTORY_SEPARATOR .'catclass.php'; ?>
<?php 
    session_start();
    if($_SESSION['admin']!=="1"){
        header("Location: /");
        exit();
    }
    ?>
<?php 
        $errors = null;
        $success =null;
        if(isset($_POST['categorie'],$_POST['quantite'], $_POST['nom'], $_POST['prix'], $_POST['image'])){
            $article = new article($_POST['categorie'],$_POST['quantite'], $_POST['nom'], $_POST['prix'], $_POST['image']);
        
            if($article->isValid()){
                $products = new products('../;data/products.json');
                $products->addProdutcs ($article);
                $cat = new categorie('../;data/cat.csv');
                $cat->CSVupdate('../;data/products.json');
                $success=true;
                $_POST=[];
            }else{
                $errors= $article->getErrors();
            }
        }
        $products = new products('../;data/products.json');
        $products->deleteQuantZ();
        $cat = new categorie('../;data/cat.csv');
        $cat->CSVupdate('../;data/products.json');
    
?>
    <?php if (!empty($errors)): ?>
        <div class="errors">
            Erreur
        </div>
    <?php endif ?>
    <?php if ($success): ?>
        <div class="success">
            Produit ajouté
        </div>
    <?php endif ?>
    <div class="container-ajout-article">
        <form action="" method="post">
            <div class="sub-container-ajout-article">
                <input type="text" name="categorie" placeholder="catégorie" value="<?= htmlentities($_POST['categorie']?? '')?>"></br>
                <?php if(isset($errors['quantite'])):?>
                <div class="invalid"><?= $errors['quantite'] ?></div>
                <?php endif ?>
                <input type="text" name="quantite" placeholder="quantité" value="<?= htmlentities($_POST['quantite']?? '')?>"></br>
                <input type="text" name="nom" placeholder="nom" value="<?= htmlentities($_POST['nom']?? '')?>"></br>
                <?php if(isset($errors['prix'])):?>
                <div class="invalid"><?= $errors['prix'] ?></div>
                <?php endif ?>
                <input type="text" name="prix" placeholder="prix" value="<?= htmlentities($_POST['prix']?? '')?>"></br>
                <input type="text" name="image" placeholder="image" value="<?= htmlentities($_POST['image']?? '')?>"></br>
                <button>Envoyer</button>
            </div>
        </form>
    </div>        
    <div class="article">
        <table class="table-article">
            <?php $json_data=file_get_contents("../;data/products.json");?>
            <?php $products=json_decode($json_data,true); ?>
            <?php if(!(empty($products))): ?>
                <?php foreach($products as $product): ?>

                    <tr>
                        <td><img src="<?php echo $product['image']?>" alt=""></td>
                        <td><?php echo $product['nom']?></td>
                        <td><?php echo $product['quantite']?></td>
                        <td><?php echo $product['prix']?></td>
                        <td><?php echo $product['categorie']?></td>
                    </tr>
                <?php endforeach ?>
            <?php endif ?>
        </table>
    </div>



<?php require_once dirname(__DIR__) . DIRECTORY_SEPARATOR .'./elements'. DIRECTORY_SEPARATOR .'footer.php'; ?>