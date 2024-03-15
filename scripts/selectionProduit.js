// prendre l'url après ('?')
const url_Id = window.location.search;
let params = new URLSearchParams(url_Id);
//prendre le nom de l'idée du mon item
let Id = params.get('item');
let myRequest = new Request("../;data/products.json");
// lecture de mon fichier à l'aide de fetch
fetch(myRequest)
    .then(function (response) {
        return response.json();
    })
    .then(function (data) {
        // data est un array des produits de mon Json
        // on chercher l'id du produit dans le data en comparant avec l'id du $_GET['item']
        let iDproduit = data.find(element => element.id === Id);
        //accès à la classe ou je veux que le produit sois afficher dans ma page en question
        let item = document.querySelector(".content");

        //structure HTML de mon produit
        let structureHtmlProduit =`
        <div class="prod" style="display:none">${iDproduit.id}</div>
        <div name="image" class="prod"><img src="${iDproduit.image}" alt=""></div>
        <div name="nom" class="prod">${iDproduit.nom}</div>
        <div name="prix" class="prod">${iDproduit.prix}€</div>
        <div name="quantite" class="prod" style="display:none">${iDproduit.quantite}</div>
        <form class="form-prod" action="">
            <input id="qt" type="number" min="0" max="${iDproduit.quantite}">
        </form>
        <button id ="envoyer" type="submit" name="envoyer" class="button-envoyer">Ajouter au panier</button>
        `
        item.innerHTML=structureHtmlProduit;

        let btn=document.querySelector("#envoyer");
        btn.addEventListener("click", (event)=>{
            event.preventDefault();

                let inputqt= document.getElementById('qt').value;

                let optionsProd={
                    id:iDproduit.id,
                    categorie:iDproduit.categorie,
                    quantite:Number(inputqt),
                    nom:iDproduit.nom,
                    prix:Number(iDproduit.prix),
                    image:iDproduit.image,
                    MAXqt:Number(iDproduit.quantite),
                };

             //stockage des produits selecciones dans le localstorage
            let prodInLocalStorage=JSON.parse(localStorage.getItem("produit"));
            if(prodInLocalStorage){

                for(i=0; i<prodInLocalStorage.length; i++){
                    if(prodInLocalStorage[i].id==optionsProd.id){
                        prodInLocalStorage.splice(i, 1);
                    }
                }
                    console.log(prodInLocalStorage.length);
                    prodInLocalStorage.push(optionsProd);
                    localStorage.setItem("produit", JSON.stringify(prodInLocalStorage));
            }else{
                prodInLocalStorage=[];
                prodInLocalStorage.push(optionsProd);
                localStorage.setItem("produit", JSON.stringify(prodInLocalStorage));
            }

        });

       
    });

