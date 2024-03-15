
<?php require_once dirname(__FILE__) . DIRECTORY_SEPARATOR .'./elements'. DIRECTORY_SEPARATOR .'header.php'; ?>
<?php require_once dirname(__FILE__) . DIRECTORY_SEPARATOR .'./class'. DIRECTORY_SEPARATOR .'article.php'; ?>
<?php require_once dirname(__FILE__) . DIRECTORY_SEPARATOR .'./class'. DIRECTORY_SEPARATOR .'productsclass.php'; ?>
<?php require_once dirname(__FILE__) . DIRECTORY_SEPARATOR .'class'. DIRECTORY_SEPARATOR .'catclass.php'; ?>
<style>
    .slider {
        width: 400px;
        overflow: hidden;
        margin: 300px auto;
    }
    
    .slider1 {
        width: calc(400px * 3);
        animation: avancer 10s infinite;
    }
    
    .slide {
        float: left;
    }
    
    @keyframes avancer {
        0% {
            transform: translateX(0);
        }
        10% {
            transform: translateX(0);
        }
        33% {
            transform: translateX(-500px);
        }
        45% {
            transform: translateX(-500px);
        }
        66% {
            transform: translateX(-1000px);
        }
        80% {
            transform: translateX(-1000px);
        }
        100% {
            transform: translateX(0);
        }
    }
</style>
<div class="content">
            <h2>site de chaussure</h2>
            <p>Bienvenue sur le meilleur site de chaussure de France</p>
 

    <div class="slider ">
        <div class="slider1">
            <div class="slide"><img src="/images/img1.jpg" alt="" /></slides>
                <div class="slide"><img src="/images/img2.jpg" alt="" /></slides>
                    <div class="slide"></div><img src="/images/img3.jpg" alt="" /></slides>
                </div>
     </div>

</div>

<?php require './elements/footer.php'; ?>