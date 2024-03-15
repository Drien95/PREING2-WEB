<?php
require_once dirname(__FILE__). DIRECTORY_SEPARATOR .'productsclass.php';
require_once dirname(__FILE__). DIRECTORY_SEPARATOR .'catclass.php';
class article{

    public $categorie;
    public $quantite;
    public $nom;
    public $prix;
    public $image;
    public $id;


    public function __construct(string $categorie, string $quantite, string $nom, string $prix, string $image){
        $this->categorie=$categorie;
        $this->quantite=$quantite;
        $this->nom=$nom;
        $this->prix=$prix;
        $this->image=$image;
    }

    public function isValid():bool{
        return empty($this->getErrors());
    }

    public function getErrors():array{
        $errors =[];
        $verif_prix = (bool)preg_match("/^\\d+$/", $this->prix);
        $verif_quantite = (bool)preg_match("/^\\d+$/", $this->quantite);
        if(!($verif_prix)){
            $errors['prix']='prix doit avoir des chiffres';
        }
        if(!($verif_quantite)){
            $errors['quantite']='quantite doit avoir des chiffres';
        }
        return $errors;
    }

    public function createID(){
        $substr=substr($this->categorie,0,2);
        $current_data=file_get_contents('../;data/products.json');
        $json = json_decode($current_data);
          if(!empty($json)){
            foreach($json as $index=>$product){
                foreach($product as $detail=>$cat){
                    if($detail=='categorie'){
                        $tab[]=$cat;
                    }
                }
            }

            $frq =array_count_values($tab);
            
            foreach($frq as $cat=>$freq){
                if($cat==$this->categorie){
                    $nbId = (string)($freq + 1);
                }
                else{
                    $nbId=1;
                    $nbId= (string)$nbId;
                }
            }
          }else{
              $nbId=1;
          }
            $this->id= $substr . $nbId;
            return $this->id;
    }

    public function toJSON():array{
            return [
                'id'=> $this->createID(),
                'categorie'=> $this->categorie,
                'quantite'=> $this->quantite,
                'nom'=> $this->nom,
                'prix'=> $this->prix,
                'image'=> $this->image,

            ];
    }
}
    // $arr= new article('eee', '1', 'dddd', 'fffff', 'ccc');
    // $arr->createID();

?>