let prodInLocalStorage=JSON.parse(localStorage.getItem("produit"));
let posItemPanier=document.querySelector(".article-info");
let PrixTOT=document.getElementById("PrixTOT");
let petiteBubblePanier= document.querySelector("#petiteBubblePanier");

function afficherItem(){
    if(!prodInLocalStorage ||prodInLocalStorage ==0){
        posItemPanier.innerHTML="";
        let panierVide=`
        <div class="panier_vide">
            <div>Panier vide</div>
        </div>
        `
        posItemPanier.innerHTML=panierVide;
    
    }else{
            posItemPanier.innerHTML="";
            prodInLocalStorage.forEach((item) => {
                posItemPanier.innerHTML+=`
                <div class="prod">
                    <div class="id" style="display:none">${item.id}</div>
                    <div name="image" class="prod"><img src="${item.image}" alt=""></div>
                    <div name="nom" class="prod">${item.nom}</div>
                    <div name="prix" id="qtPrix" class="prod">${item.prix}€</div>
                    <div class="qt">
                        <div class="moins" moins="moins" idname="${item.id}" imax="${item.MAXqt}" >-</div>
                        <input id="val" type="number" idname="${item.id}" name="quantite" class="prod" style="" value="${item.quantite}" max="${item.MAXqt}" min="1">
                        <div class="plus" plus="plus" idname="${item.id}" >+</div>
                    </div>
                    <button type="submit" id="btn_suppItem" idname="${item.id}" >Supprimer l'article</button>
                </div>
                `
            });
        }
}
afficherItem();
//////////////////////////////////////////////////////////////////////////
// ------DEBUT DE PARTIE POUR ++/-- QUANTITE DUN PRODUIT VOULU --------//
////////////////////////////////////////////////////////////////////////
//fonction qui va prendre tout les .moins et .plus sous forme de array qui nous permettra de faire un appel de nos fonction minusqt et plusqt
function refreshClick(){
    let Bmoins = document.querySelectorAll(".moins");
    let Bplus = document.querySelectorAll(".plus");
    let Value = document.querySelectorAll("#val");
    let btn_suppItem = document.querySelectorAll("#btn_suppItem");
    for (i = 0; i < Bmoins.length; i++) {
        element1 = Bmoins[i];
        element2 = Bplus[i];
        element3 = Value[i];
        element4 = btn_suppItem[i];
        element1.addEventListener("click", minusProd);
        element2.addEventListener("click", plusProd);
        element3.addEventListener("change", valueChange);
        element4.addEventListener("click", suppItemOnce);
    }
}
//fonction qui change la value du input directement
refreshClick();
function valueChange(){
    id = this.getAttribute('idname');
    for(i=0; i<prodInLocalStorage.length; i++){
        if(prodInLocalStorage[i].id==id && this.value>=1 && this.value<=prodInLocalStorage[i].MAXqt){
            prodInLocalStorage[i].quantite=`${this.value}`;
            localStorage.setItem("produit", JSON.stringify(prodInLocalStorage));
        };
    };
    
    afficherItem();
    refreshClick();
    PrixTOT();
   
};
//fonction pour --qt
function minusProd(){
    id = this.getAttribute('idname');
    array=prodInLocalStorage.map((item)=>{
        qt=item.quantite;
        if(item.id===id && qt>1){
            qt--;
            for(i=0; i<prodInLocalStorage.length; i++){
                if(prodInLocalStorage[i].id==id){
                    prodInLocalStorage[i].quantite=qt;
                    localStorage.setItem("produit", JSON.stringify(prodInLocalStorage));
                };
            };
        };
        
    });
    
    afficherItem();
    refreshClick();
    prixTOT();
    
};
// fonction pour ++qt
function plusProd(){
    console.log("+");
    id = this.getAttribute("idname");
    imax = this.getAttribute("imax");
    moins= this.getAttribute("moins");
    array=prodInLocalStorage.map((item)=>{
        qt=item.quantite;
        console.log(qt);
        console.log(imax);
        console.log(moins);
        if(item.id===id && item.quantite<item.MAXqt){
                for(let i=0; i<prodInLocalStorage.length; i++){
                    if(prodInLocalStorage[i].id==id && item.quantite<prodInLocalStorage[i].MAXqt){
                            qt++;
                            prodInLocalStorage[i].quantite=qt;
                            localStorage.setItem("produit", JSON.stringify(prodInLocalStorage));         
                    };
                
                };
        };
     
    });
    
    afficherItem();
    refreshClick();
    prixTOT();
    
    
};
//////////////////////////////////////////////////////////////////////////
// ------FIN DE PARTIE POUR ++/-- QUANTITE DUN PRODUIT VOULU ----------//
////////////////////////////////////////////////////////////////////////
// ------------DEBUT DE LA PARTIE POUR LES VALEUR TOTALE-------------//
//////////////////////////////////////////////////////////////////////

prixTOT()
function prixTOT(){
    let prixTotA= 0;
    let nbrItem=0;
    prodInLocalStorage.forEach((item)=>{
        prixTotA+=item.prix * item.quantite;
        nbrItem+=item.quantite;
    });
    console.log(prixTotA);
    PrixTOT.innerHTML=`
            Vous en avez pour : ${prixTotA}€ ! (${nbrItem}) articles selectionnés !
        `
    petiteBubblePanier.innerHTML=`${nbrItem}`
};

function suppItemOnce(){
    id = this.getAttribute("idname");
    prodInLocalStorage= prodInLocalStorage.filter((item)=> item.id !== id);
    localStorage.setItem("produit", JSON.stringify(prodInLocalStorage));
    afficherItem();
    refreshClick();
    prixTOT();
} 


let btn_sup_panier= document.getElementById("vider-panier");
btn_sup_panier.addEventListener("click", (event)=>{
    event.preventDefault();
    localStorage.removeItem("produit");
    alert("Le panier à été vider")
    window.location.href="/pages/product.php";
})


let structFORM=`
    <div class="input_form_cmd" ><input type="text" id="nom-form" name="name" placeholder="NOM"></div>
    <div class="input_form_cmd" ><input type="text" id="pren-form" name="pren" placeholder="Prénom"></div>
    <div class="input_form_cmd" ><input type="text" id="adresse-form" name="adresse" placeholder="Adresse"></div>
    <div class="input_form_cmd" ><input type="text" id="ville-form" name="ville" placeholder="Ville"></div>
    <div class="input_form_cmd" ><input type="number" id="postal-form" name="postal" placeholder="Code Postal"></div>
    <div class="input_form_cmd" ><input type="email" id="mail-form" name="mail" placeholder="E-mail"></div>
    <div class="input_form_cmd" ><button type="button" id="submit-form"  name="submit">Valider la commande</button></div>
    <p class="form-message"></p>
`
let form=document.getElementById("postform");
if(localStorage){
    form.innerHTML=structFORM;

};

///////////////////
// function makeRequest(data, file) {
//     xhr = new XMLHttpRequest();
//     if (!xhr) {
//         console.log("Abort: Unable to create an instance of XMLHTTP");
//         return false;
//     }
//     xhr.onreadystatechange = function () {
//         if (xhr.readyState == 4 && xhr.status == 200){
//             alert('yes');
//             }else if(xhr.status == 404){
//                 alert('Erreur 404:/');
//             };
//         }
    
//     xhr.open('POST', file, false);
//     xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//     xhr.send(data);
// }
//////////////////
$(function(){
    $("#submit-form").on('click', function(e){
        e.preventDefault();
        
    
        $.ajax({
            url:'../pages/verifFormAchat.php',
            method:'post',
            data: {data:$("#postform").serialize(),storage: prodInLocalStorage},
            success:function(result){
                if(result!="ok"){
                    $(".successform").empty();
                    $(".errorform").empty().append(result);

                }else{
                    localStorage.removeItem("produit");
                    $(".errorform").empty();
                    $(".successform").empty().append("achat effetué!");
                    alert("Merci de votre achat");
                    window.location.href="/pages/product.php";
                }
                
            }
        })
        return false;
        
    });
});


