<?php require_once dirname(__DIR__) . DIRECTORY_SEPARATOR .'./elements'. DIRECTORY_SEPARATOR .'header.php'; ?>
<?php require_once dirname(__DIR__) . DIRECTORY_SEPARATOR .'functions'. DIRECTORY_SEPARATOR .'mailfunction.php'; ?>

<?php 
//    require 'vendor/autoload.php';
//    use \Mailjet\Resources;
//    define('API_PUBLIC_KEY', '3c879c86e0ee3ae2694064da34cd7d5c');
//    define('API_PRIVATE_KEY', '4bb198d9fba3ea25778aa36436fe4e00');
//    $mj = new \Mailjet\Client('3c879c86e0ee3ae2694064da34cd7d5c','4bb198d9fba3ea25778aa36436fe4e00',true,['version' => 'v3.1']);


//    if(!empty($_POST['surname']) && !empty($_POST['firstname']) && !empty($_POST['email']) && !empty($_POST['message'])){
//        $surname = htmlspecialchars($_POST['surname']);
//        $firstname = htmlspecialchars($_POST['firstname']);
//        $email = htmlspecialchars($_POST['email']);
//        $message = htmlspecialchars($_POST['message']);
//        $message = htmlspecialchars($_POST['date']);

//        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
//        $body = [
//            'Messages' => [
//            [
//                'From' => [
//                'Email' => "noe.mersni@hotmail.com",
//                'Name' => "no"
//                ],
//                'To' => [
//                [
//                    'Email' => "noe.mersni@hotmail.com",
//                    'Name' => "me"
//                ]
//                ],
//                'Subject' => "chaussure",
//                'TextPart' => 'salut salut', 
//                'HTMLPart' => "TEXT EMAIL",
               
//            ]
//            ]
//        ];
//            $response = $mj->post(Resources::$Email, ['body' => $body]);
//            $response->success();
//            echo "Email envoyé avec succès !";
//        }
//        else{
//            echo "Email non valide";
//        }

//    } else {
//        header('Location: index.php');
//        die();
//    }
    
 

    if(isset($_POST['firstname'],$_POST['surname'], $_POST['email'], $_POST['message'])){
            $surname = htmlspecialchars($_POST['surname']);
            $firstname = htmlspecialchars($_POST['firstname']);
            $email = htmlspecialchars($_POST['email']);
            $message = htmlspecialchars($_POST['message']);
            $date = htmlspecialchars($_POST['date']);

            if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                $s='Contact NAG';
                sendmail($s,$message,$email);
            }
            else{
                echo "Email non valide";
            }

        } else {
            header('Location: product.php');
            die();
        }
?>


<div class="container">
        <div class="d-flex justify-content-center">
            <div class="col-8 m-4">
                <form action="" method="POST">
                    <div class="form-group">
                        <div class="text-center">
                            <h1>page contact </h1>
                        </div>
                        <div><input type="date" placeholder="jj/mm/aaaa"></div>
                        <br/>
                        <div class="nom-prenom">
                            <input type="text" name="surname" placeholder="Entrez votre Nom" autocomplete="off" class="form-control"/>
                            <input type="text" name="firstname" placeholder="Entrez votre Prénom" autocomplete="off" class="form-control"/>
                        </div>
                        <br/>
                        <input type="email" name="email" placeholder="Entrez votre email" autocomplete="off" class="form-control"/>
                        <br/>
                        <textarea rows="10" name="message" placeholder="Votre message" class="form-control"></textarea>
                        <br/>
                        <div>
                        <input type="radio">Femme <input type="radio">Homme </td> </div>
                        <br/>
                        <div><input type="date" placeholder="jj/mm/aaaa"></div>
                        <br/>
                        <button class="btn btn-lg btn-primary">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
</div>

<? require_once '../elements/footer.php'; ?>