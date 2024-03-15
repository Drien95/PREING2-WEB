<?php require_once dirname(__DIR__) . DIRECTORY_SEPARATOR .'./elements'. DIRECTORY_SEPARATOR .'header.php'; ?>
<?php require_once dirname(__DIR__) . DIRECTORY_SEPARATOR .'class'. DIRECTORY_SEPARATOR .'article.php'; ?>
<?php require_once dirname(__DIR__) . DIRECTORY_SEPARATOR .'class'. DIRECTORY_SEPARATOR .'productsclass.php'; ?>
<?php require_once dirname(__DIR__) . DIRECTORY_SEPARATOR .'class'. DIRECTORY_SEPARATOR .'catclass.php'; ?> 
<?php $products = new products('../;data/products.json');
    $products->deleteQuantZ();
    $cat = new categorie('../;data/cat.csv');
    $cat->CSVupdate('../;data/products.json'); ?>

    <aside>
        <nav class=side-bar>
            <section class=block-side-bar>
                <div>
                    <?php $cat = new categorie('../;data/cat.csv')?>
                    <?php $cat->displayCAT()?>
                </div>
            </section>
        </nav>
    </aside>

    <main>
        <?php if($_GET['cat']==NULL): ?>
        <div class="article">
        <div class="table-article">
                <?php $json_data=file_get_contents("../;data/products.json");?>
                <?php $products=json_decode($json_data,true); ?>
                <?php if(!(empty($products))): ?>
                    <?php foreach($products as $product): ?>

                        <div class="card">
                            <a href="<?php echo "/pages/item.php?item=".$product['id']; ?>">
                                <div class="imgbox">
                                    <img src="<?php echo $product['image']?>" alt="" class="sneakersImg">
                                </div>
                                <div class="contentBox">
                                    <h5><?php echo $product['nom']?></h5>
                                    <h2><?php echo $product['categorie']?></h2>
                                    <div style="display:none;"><?php echo $product['quantite']?></div>
                                    <h3 class="priceContentBoxCard"><?php echo $product['prix']?>€</h3>
                                </div>
                            </a> 
                        </div>
                    <?php endforeach ?>
                <?php endif ?>
            </div>
            </div>
        <?php endif ?>
        <?php foreach($cat->catg as $realcatg):?>
            <?php if($_GET['cat']==$realcatg): ?>
                <div class="article">
                <div class="table-article">
                <?php $json_data=file_get_contents("../;data/products.json");?>
                <?php $products=json_decode($json_data,true); ?>
                <?php if(!(empty($products))): ?>
                    <?php foreach($products as $index=>$key): ?>
                        <?php $cat='categorie';?>
                        <?php foreach($key as $detail=>$fu): ?>
                            <?php if($detail=='categorie'): ?>
                                <?php if($fu==$realcatg): ?>
                                    <div class="card">
                                        <a href="<?php echo "/pages/item.php?item=".$key['id']; ?>">
                                            <div>
                                                <img src="<?php echo $key['image']?>" alt="" class="sneakersImg">
                                            </div>
                                            <div class="contentBox">
                                                <h5><?php echo $key['nom']?></h5>
                                                <h2><?php echo $key['categorie']?></h2>
                                                <div style="display:none;"><?php echo $key['quantite']?></div>
                                                <h3 class="priceContentBoxCard"><?php echo $key['prix']?>€</h3>
                                            </div>
                                        </a>
                                    </tr>
                                <?php endif ?>
                            <?php endif ?>
                        <?php endforeach ?>
                    <?php endforeach ?>
                <?php endif ?>
                </div>
                </div>
            <?php endif ?>
        <?php endforeach ?>
        </div>
    </main>

<?php require_once dirname(__DIR__) . DIRECTORY_SEPARATOR .'./elements'. DIRECTORY_SEPARATOR .'footer.php'; ?>