<?php

function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('auth');
    } else {
        $id_role = $ci->session->userdata('id_role');
    }
}

function activate_menu($menu)
{
    $ci = get_instance();
    $classname = $ci->router->fetch_class();
    return $classname == $menu ? 'active' : '';
}