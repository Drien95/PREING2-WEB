<?php require_once dirname(__DIR__) . DIRECTORY_SEPARATOR .'class'. DIRECTORY_SEPARATOR .'catclass.php'; ?>
<div  class="navbarleft">
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