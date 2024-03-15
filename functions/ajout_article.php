<?php require_once dirname(__DIR__) . DIRECTORY_SEPARATOR .'class'. DIRECTORY_SEPARATOR .'article.php'; ?>
<?php require_once dirname(__DIR__) . DIRECTORY_SEPARATOR .'class'. DIRECTORY_SEPARATOR .'productsclass.php'; ?>
<?php
    $errors = null;
    $success =null;
    if(isset($_POST['categorie'],$_POST['quantite'], $_POST['nom'], $_POST['prix'], $_POST['image'])){
        $article = new article($_POST['categorie'],$_POST['quantite'], $_POST['nom'], $_POST['prix'], $_POST['image']);
    
        if($article->isValid()){
            $products = new products(PATH_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'products.json');
            $products->addProdutcs ($article);
            $success=true;
            $_POST=[];
        }else{
            $errors= $article->getErrors();
        }
    }
    $products = new products(PATH_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'products.json');
    $products->deleteQuantZ()

?>