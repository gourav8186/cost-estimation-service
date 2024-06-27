<?php   
    function get_url_params() {
        //Get the query string made of slashes
        $slashes = explode("/",trim(htmlentities(array_shift($_GET),ENT_QUOTES),"/"));

        //Extract the asked page from those parameters
        $i = 0; $params = array();
        foreach ($slashes as $p) {
            $i++;
            if($i > 1) $params[] = $p; else $params['page'] = $p;
        }
        
        return $params;
    }

    $pages = get_url_params();