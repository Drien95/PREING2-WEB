<?php

class categorie{

    public $csv;
    public $truecsv;
    public $file;
    public $catg;

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

    //recherche toutes les catégorie dans le json
    public function listCatJson(string $json){
        
        $json = file_get_contents($json);
        $json = json_decode($json);
    
            foreach($json as $index=>$product){
                foreach($product as $detail=>$cat){
                    if($detail=='categorie'){
                        $tab[]=$cat;
                    }
                }
            }
            $this->csv=$tab;

        
    }

    public function createTabCat(){
        $csv =array_count_values($this->csv);
        foreach($csv as $cat=>$freq){
            $this->truecsv[]=['cat'=>$cat];
        }
    }

    public function createCSV(){
        $src=fopen("$this->file", "w");
        foreach($this->truecsv as $ctg){
            fputcsv($src,$ctg);
        }
        fclose($src);
    }

    public function CSVupdate(string $FIRST_FILE){
        $this->listCatJson($FIRST_FILE);
        $this->createTabCat();
        $this->createCSV();
    }

    public function displayCAT(){
        if(!empty($this->file)){
            $handle = fopen("$this->file", "r");
            $lineNumber = 1;
            while (($raw_string = fgets($handle)) !== false) {
                $row =str_getcsv($raw_string);
                $string=$row[0];
                $upp=strtoupper($string);
                echo "<div>"."<a href='/pages/product.php?cat=".$row[0]."'>".$upp."</a>"."</div>";
                $this->catg[]=$string;
                $lineNumber++;
            }
            fclose($handle);
        }
    }
}