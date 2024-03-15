<?php 


$json_data=file_get_contents('../;data/products.json');
$json=json_decode($json_data,true);


    foreach($json as $index_json =>$detail ){
        foreach($detail as $index_sub=>$detail_sub){
            if($index_sub=='id'){
                var_dump($detail_sub);
             }
        };
    }
// $json_data=file_get_contents('../;data/products.json');
// $json=json_decode($json_data,true);
// foreach($json as $index_json =>$detail ){
//     foreach($detail as $index_sub=>$detail_sub){
//         if($detail_sub=='ni1'){
//             $detail['quantite']='44';
//             $json[$index_json]=$detail;
//             var_dump($json);
//         }

        
//     }
// }                if($detail['id']==$detail_sto['id']){
//     $detail['quantite']=-$detail_sto('quantite');
//     $json[$index_json]=$detail;
//     $final_data=json_encode($json);
//     file_put_contents($this->file,$final_data);

?>
  <!-- $.ajax({
            url:"/pages/verifFormAchat.php",
            type : 'POST',
            data: formData,
            success: function(data)
            {
                var res= JSON.parse(data);
                console.log('bonjour');
                if(res.success==true){
                    alert('VRAI');
                    $(".form-message").html('<span style="color:green;">Commande effectuée avec succès</span>');
                    
                }
                $(".form-message").html('<span style="color:red;">Veuillez remplir correctement le formulaire</span>');
                alert(data);

            },
             error:   function(xhr, ajaxOptions, thrownError) { alert(xhr.status);
                                     } 


        }); -->