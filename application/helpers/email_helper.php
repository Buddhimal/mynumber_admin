<?php


class EmailSender{

    const mynumber_info = 'My Number';
}

class EmailConfigs {

    public static function verification_url($params){

        if ( ENVIRONMENT != 'development' ) {
            return sprintf('https://sales.mynumber.me/verify/%s', $params);
        } else {
            return sprintf('https://sales.mynumber.lk/verify/%s', $params);
        }
    }
}

class EmailTemplate {
    const add_manager = '034370ef-60df-11ed-8a2f-a41f7281c512';
    const clinic_register = '';
}