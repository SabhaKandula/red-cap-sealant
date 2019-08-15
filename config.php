<?php
$my_env_var = getenv('sealant_api');
$GLOBALS['super_api_token'] = 'ABCD1234ABCD1234ABCD1234ABCD1234ABCD1234ABCD1234ABCD1234ABCD1234';
$GLOBALS['api_token']       =  $my_env_var ;
$GLOBALS['api_url']         = 'https://redcap.uky.edu/redcap/api/';
