<?php require_once dirname(__DIR__) . DIRECTORY_SEPARATOR .'functions'. DIRECTORY_SEPARATOR .'mailfunction.php'; ?>
<?php

        $data=[];
        parse_str($_POST['data'],$data);
        $errorEmpty = false;
        $errorMail = false;
        $storage=$_POST['storage'];
        // // $json_data=file_get_contents('../;data/products.json');
        // // $json=json_decode($json_data,true);
        

        
        if(empty($data['name']) || empty($data['pren']) || empty($data['ville']) || empty($data['postal']) || empty($data['adresse'])){
            $errorEmpty = true;
            echo "champ vide";
          
        // }elseif(!filter_var($mail, FILTER_VALIDATE_EMAIL)){
        //     $errorMail = true;
        //     echo "<span class='form-error'>Rentrez un mail valide</span>";
            
        }else{
                ////////////////////////////////////////////////////////////////////////
                // ------------------DEBUT DE LA PARTIE POUR LE MAIL-----------------//
                //////////////////////////////////////////////////////////////////////
                $to=$data['mail'];
                // $subject="Achat sur NAG";
                // $headers .="Content-Type: text/html; charset=utf-8\r\n";
                // $headers .= "From: machnik.adrien.pro@gmail.com\r\n";
                // $headers .="content-Transfer-Encoding:8bit";
                // $message="
                // <html>
                //         <body>
                //                 <div align='center'>
                //                 Merci pour votre achat!
                //                 </div>
                //         </body>
                // </html>
                // ";
                // dans le cas ou le mail fait +70char --> probleme donc on coupe tous les 70char mise a la ligne
                // $message=wordwrap($message,70,"\r\n");
                // //envois du mail
                // if(mail($to, $subject, $message, $headers)){
                //         //mail recu
                //         echo "ok";
                // }else{
                //         //prb mail envois
                //         echo "erreur mail";
                // }
                $s = 'Achat sur NAG';
                $m = 'Merci de votre achat</br>';
                sendmail($s,$m,$to);
                ////////////////////////////////////////////////////////////////////////
                // ------------------FIN DE LA PARTIE POUR LE MAIL-------------------//
                //////////////////////////////////////////////////////////////////////
                // ---------------DEBUT DE LA PARTIE POUR MAJ STOCK----------------//
                ////////////////////////////////////////////////////////////////////
                $current_data=file_get_contents('../;data/products.json');
                $json = json_decode($current_data, true);

                foreach($json as $index=>$detail){
                        foreach($detail as $sub_index=>$sub_detail){
                                for($i=0;$i<count($storage);$i++){
                                        if($sub_index==='id'&& $storage[$i]['id']==$sub_detail){
                                                $json[$index]["quantite"] = strval(intval($json[$index]["quantite"]) - intval($storage[$i]['quantite']));
                                                
                                 
                                        }
                                }
                        }
                }
                $final_data=json_encode($json, JSON_PRETTY_PRINT);
                file_put_contents('../;data/products.json',$final_data);
                echo "ok";
                //////////////////////////////////////////////////////////////////////
                // ---------------FIN DE LA PARTIE POUR MAJ STOCK------------------//
                ////////////////////////////////////////////////////////////////////
            
        }
        // // echo json_encode($response);
        // echo json_encode($data);

?>
