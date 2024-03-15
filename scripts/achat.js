
let errorEmpty="<?php echo $errorEmpty?>";
let errorMail="<?php echo $errorMail?>";
    $("#nom-form","#pren-form","#adresse-form","#ville-form","#postal-form","#mail-form").removeCLass("form-error");

if(errorEmpty == true){
    $("#nom-form","#pren-form","#adresse-form","#ville-form","#postal-form","#mail-form").addClass("form-error");
}
if(errorMail == true){
    $("#mail-form").addClass("form-error");
}
if(errorEmpty == false && errorMail == false){
    $("#nom-form","#pren-form","#adresse-form","#ville-form","#postal-form","#mail-form").addClass("form-success");
}