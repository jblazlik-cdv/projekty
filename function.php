<?php
    function get_login_parametr() {
        // auto form complete
        $db_config = array('db_type' => '','db_host' => '', 'db_user' => '', 'db_pass' => '','db_name' => '');

        if(file_exists('wp-config.php')){
            $plik = fopen("wp-config.php","r");
            while(!feof($plik)){
                $linia = fgets($plik);
                $db_config['db_type'] = 'server';
                if(preg_match('@define\(\s*[\'|"]DB_HOST[\'|"]\s*,\s*[\'|"]([^\'"]*)[\'|"]\s*\)@Usmi',$linia,$match)) $db_config['db_host'] = $match[1];
                if(preg_match('@define\(\s*[\'|"]DB_USER[\'|"]\s*,\s*[\'|"]([^\'"]*)[\'|"]\s*\)@Usmi',$linia,$match)) $db_config['db_user'] = $match[1];
                if(preg_match('@define\(\s*[\'|"]DB_PASSWORD[\'|"]\s*,\s*[\'|"]([^\'"]*)[\'|"]\s*\)@Usmi',$linia,$match)) $db_config['db_pass'] = $match[1];
                if(preg_match('@define\(\s*[\'|"]DB_NAME[\'|"]\s*,\s*[\'|"]([^\'"]*)[\'|"]\s*\)@Usmi',$linia,$match)) $db_config['db_name'] = $match[1];
                
                //echo $linia."<br>";
            }

            fclose($plik);
        }
        //var_dump($db_config);
        return $db_config;
    }
?>