<?php
class CustomSecurity{
    function security($db){
        $f3 = Base::instance();
        $tmp = new Template;
        $secSvr = new UsersServices($db);
        $f3->set('success',$f3->get('GET.success')!= null ? $f3->get('GET.success') : '');
        $f3->set('error',$f3->get('GET.error') != null ? $f3->get('GET.error') : '');
        if ($f3->get('COOKIE.user_id') != null && $f3->get('COOKIE.key') != null){
            $user = $secSvr->getUserID($f3->get('COOKIE.user_id'));
            if (md5($user->id.$f3->get('HASH_SECRET')) == $f3->get('COOKIE.key')){
                $f3->set('LOGON_USER_ID',$user->id);
                $f3->set('LOGON_USER_SUBJECT_ID',$user->subject_id);
                $f3->set('LOGON_USER_NAME',$user->first_name);
                $f3->set('LOGON_USER_EMAIL',$user->email);
                $f3->set('LOGON_USER_ROLE', $user->role);
                $f3->set('LOGON_USER_AVATAR', $user->profile_avatar);
            } else {
                $f3->clear('COOKIE.user_id');
                $f3->clear('COOKIE.key');
                echo($tmp->render('backend/login.html'));
                die();
            }
        } else {
            echo($tmp->render('backend/login.html'));
            die();
        }
    }
}