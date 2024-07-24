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

    function fSecurity($db){
        $f3 = Base::instance();
        $logon_member_type = $f3->get('COOKIE.logon_type');
        if ($f3->get('COOKIE.logon_id') != null && $f3->get('COOKIE.logon_key') != null){
            if($f3->get('COOKIE.logon_type') == 'member'){
                $Svr = new MemberServices($db);
                $item = $Svr->getMemberID($f3->get('COOKIE.logon_id'));
            }
            if($f3->get('COOKIE.logon_type') == 'staff'){
                $Svr = new StaffServices($db);
                $item = $Svr->getStaffID($f3->get('COOKIE.logon_id'));
            }
            if (md5($item->id.$f3->get('HASH_SECRET')) == $f3->get('COOKIE.logon_key')){
                $f3->set('LOGON_MEMBER_ID',$item->id);
                $f3->set('LOGON_STAFF_NO',$item->staff_no);
                $f3->set('LOGON_MEMBER_NO',$f3->get('COOKIE.logon_type') == 'member' ? $item->member_no : 0);
                $f3->set('LOGON_MEMBER_NAME',$item->first_name);
                $f3->set('LOGON_MEMBER_EMAIL',$item->email);
                $f3->set('LOGON_MEMBER_STATUS',true);
                $f3->set('LOGON_MEMBER_TYPE',$logon_member_type);
                $f3->set('LOGON_MEMBER_ROLE',$item->role);
                $f3->set('LOGON_MEMBER_CURRENCY',$item->currency_id);
            } else {
                $f3->set('LOGON_MEMBER_ID',0);
                $f3->set('LOGON_MEMBER_TYPE','');
                $f3->set('LOGON_STAFF_NO',0);
                $f3->set('LOGON_MEMBER_NO',0);
                $f3->set('LOGON_MEMBER_NAME','');
                $f3->set('LOGON_MEMBER_STATUS',false);
                $f3->set('LOGON_MEMBER_ROLE',0);
                $f3->set('LOGON_MEMBER_CURRENCY',0);
            }
        } else {
            $f3->set('LOGON_MEMBER_ID',0);
            $f3->set('LOGON_MEMBER_TYPE','');
            $f3->set('LOGON_STAFF_NO',0);
            $f3->set('LOGON_MEMBER_NO',0);
            $f3->set('LOGON_MEMBER_NAME','');
            $f3->set('LOGON_MEMBER_STATUS',false);
            $f3->set('LOGON_MEMBER_ROLE',0);
            $f3->set('LOGON_MEMBER_CURRENCY',0);
        }
    }
}