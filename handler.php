<?php

function display_char($lang = "de") {
    require("arrays.php");
    require("langs/".$lang.".php");
    $c = $chars[array_rand($chars)];
    $cn = $c["name"];
    $cf = $c["file"];
    $output = "";
    $output .= '<div class="row">';
    $output .= '<div class="cell-2">';
    $output .= '<img src="'.$cf.'" width="100%" alt="'.$lang["quiz"]["char"].'">';
    $output .= '</div>';
    $output .= '<div class="cell-10">';
    $output .= '<input tabindex="1" autofocus type="text" data-role="materialinput" maxlength="3" placeholder="'.$lang["quiz"]["char_input"].'" name="user">';
    $output .= '</div>';
    $output .= '<div class="cell-8">';
    $output .= '<button tabindex="2" class="image-button success" type="submit" name="char" style="width:100%" value="'.$cn.'"><span class="mif-checkmark icon"></span><span class="caption">'.$lang["quiz"]["submit"].'</span></button>';
    $output .= '</div>';
    $output .= '<div class="cell-4">';
    $output .= '<button class="image-button default" style="width:100%" onclick="reloadPage()"><span class="mif-shuffle icon"></span><span class="caption">'.$lang["quiz"]["skip"].'</span></button>';
    $output .= '</div>';
    $output .= '<input type="text" hidden value="'.$cf.'" name="image">';
    $output .= '</div>';
    
    echo $output;
}

?>
