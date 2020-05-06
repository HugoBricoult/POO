<?php

require './Form/Form.php';
require './Html/Html.php';
require './Validator/Validator.php';

//----------------FORMULAIRE------------------
//créer un formulaire avec tableau de valeur (si besoin)
$form = new Form($_POST);
var_dump($_POST);
//Debut form -> formOpen(action,methode,class)
echo $form->formOpen('#','post','formclass');

//Ajouter un input text (name)
echo $form->inputText('username');
//Ajouter un input Nombre (name)
echo $form->inputNumber('nombre');
//Ajouter un input Select (name,options[array])
echo $form->inputSelect('pays',array("Belgique","France","Allemagne"));
//Ajouter un input textarea (name)
echo $form->inputTextArea('message');
//Ajouter un input RadioButton (name,options[array])
echo $form->inputRadio('sexe',array("Femme","Homme","Autre"));
//Ajouter un input Checkbox (name,options[array])
echo $form->inputCheckbox('A_acheter',array("pomme","poire","pêche"));

//Ajouter un label(name,input)
echo $form->labelInput("text input",$form->inputText('salut'));

//ajouter submit
echo $form->submit();

//Fin form
echo $form->formClose();
//----------------------------------------------


//-------------------HTML-----------------------
$html = new Html();

echo $html->doctype();
echo $html->htmlOpen("fr");
echo $html->headOpen();
echo $html->title('site de test');
echo $html->metaDesc('description du site');
echo $html->metaCharset('utf-8');
echo $html->linkCss("style.css");
echo $html->headClose();
echo $html->bodyOpen();
echo $html->imgLink('./img/logo.jpg',"logo");
echo $html->aLink('http://www.google.be',"google");
echo $html->bodyClose();
echo $html->scriptJs('script.js');
echo $html->htmlClose();
//----------------------------------------------


//-------------------Validator------------------
$validator = new Validator();
echo '<br>';
echo $validator->validateText("salut") ? "ok " : "pas ok ";
echo $validator->validateText('123_è()') ? "ok " : "pas ok ";
echo '<br>';
echo $validator->validateInteger(12) ? "ok " : "pas ok ";
echo $validator->validateInteger(12.5) ? "ok " : "pas ok ";
echo $validator->validateInteger("salut") ? "ok " : "pas ok ";
echo '<br>';
echo $validator->validateFloat(12) ? "ok " : "pas ok ";
echo $validator->validateFloat(12.5) ? "ok " : "pas ok ";
echo $validator->validateFloat("salut") ? "ok " : "pas ok ";
echo '<br>';
echo $validator->validateEmail("hugo.br@sal.com") ? "ok " : "pas ok ";
echo $validator->validateEmail("hugo.br") ? "ok " : "pas ok ";
echo '<br>';
if(isset($_POST['fileToUpload'])){
    //$image,extentions(array),size(MB),MAXWidth,MAXHeight
    $validator->validateImage($_FILES["fileToUpload"],array("jpg","png"),10,100000,100000);
}
