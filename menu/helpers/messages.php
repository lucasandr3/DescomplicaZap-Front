<?php

function set_flash($type,$message)
{
    if($type == 'error') {
       f_error($_SESSION['error'] = $message);
    } else {
       f_success($_SESSION['success'] = $message); 
    }
}

function f_error()
{
    if (isset($_SESSION['error']) && !empty($_SESSION['error'])) {
        echo '<div class="alert alert-danger" role="alert" style="border-radius:0px;text-align:center;margin-top:-46px;">'
                .$_SESSION['error'].                
            '</div>';
        
        $_SESSION['error'] = '';
    }
}

function f_success()
{
    if (isset($_SESSION['success']) && !empty($_SESSION['error'])) {
        echo '<div class="alert alert-success" role="alert" style="border-radius:0px;text-align:center;margin-top:-46px;">'
                .$_SESSION['success'].                
            '</div>';
        
        $_SESSION['success'] = '';
    }
}