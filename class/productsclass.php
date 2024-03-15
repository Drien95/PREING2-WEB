<?php
require_once dirname(__FILE__). DIRECTORY_SEPARATOR .'article.php';
class products{
    public $file;
    public $index;

    public function __construct(string $file){
        $directory=dirname($file);
        if(!(is_dir($directory))){
            mkdir($directory,0777,true);
        }
        if(!(file_exists($file))){
            touch($file);
        }
        $this->file=$file;
    }

    public function addProdutcs(article $article){
        $current_data=file_get_contents($this->file);
        $data=json_decode($current_data);
        $new_data=$article->toJSON();
        $data[]=$new_data;
        $final_data=json_encode($data);
        file_put_contents($this->file,$final_data);
    }

    public function complete_article(){
        $json_data=file_get_contents($this->file);
        $products=json_decode($json_data,true);
        
        if(!(empty($products))){
            
            foreach($products as $product){
                <<<HTML
                <tr>
                    <td>{$product['image']}</td>
                    <td>{$product['nom']}</td>
                    <td>{$product['quantite']}</td>
                    <td>{$product['prix']}</td>
                    <td>{$product['categorie']}</td>
                </tr>
HTML;
            }
        }
        
    }
    // FONCTION QUI SUPPRIME TOUT UN ARTICLE DU .json SI QUANTITE = 0
    public function deleteQuantZ(){
        $json_data=file_get_contents($this->file);
        $products=json_decode($json_data,true);
        if(!(empty($products))){
            foreach($products as $index=>$key){
                $quantite='quantite';
                foreach($key as $detail=>$fu){
                    if($detail==$quantite){
                        if($fu=='0'){
                            unset($products[$index]);
                            $products=array_values($products);
                            $encode=json_encode($products);
                            file_put_contents($this->file,$encode);
                        };               
                    };
                };

        };
        };
    }

    }
            
?>