<?php

class MY_Router extends CI_Router {
    
    /**
     * The default controller expects a string in the following format: "controller/method".
     * The method at the end is optional. If the method is omitted, the default method is "index".
     * 
     * Examples:
     *  * $route['default_controller'] = "Welcome";
     *  * $route['default_controller'] = "Welcome/index";
     * 
     * Both end up being routed to "Welcome/index".
     * 
     * The default controller does NOT expect a subfolder in the "controllers" folder. So the following won't work:
     *  * $route['default_controller'] = "frontend/Welcome/index"
     * 
     * To make subfolders work, _set_default_controller() needs to be modified, and that's what this MY_Router is for.
     *
     * The modification is kept to a minimum and is marked.
     */
    protected function _set_default_controller()
    {
        if (empty($this->default_controller))
        {
            show_error('Unable to determine what should be displayed. A default route has not been specified in the routing file.');
        }
        
        /* START MODIFICATION */
        
        /*
            Removing this block, as it only allows/look for "controller/method".
            // Is the method being specified?
            if (sscanf($this->default_controller, '%[^/]/%s', $class, $method) !== 2)
            {
                $method = 'index';
            }
        */
        
        /*
            Instead of just checking for "controller/method", we need to also look for a subfolder.
            Because the latter operations depend on the first segment.
            So, the first thing to do is to figure out if the first segment is a folder or a class/file.
            Possible inputs:
                "Welcome"                   -> class                -> autocomplete
                "Welcome/index"             -> class/method
                "frontend"                  -> folder
                "frontend/Welcome"          -> folder/class         -> autocomplete
                "frontend/Welcome/index"    -> folder/class/method
        */
        
        $segments = explode("/", $this->default_controller);
        $segments = array_filter($segments); // ignore leading and trailing slashes
        
        if (count($segments) > 3) {
            show_error('Invalid controller. Default controller supports only one subfolder.');
        }
        
        $method = null;
        
        // If the first segment is a folder, the second needs to be a class/file.
        if (is_dir(APPPATH.'controllers/'.$segments[0])) {
            $this->set_directory($segments[0]);
            if (!isset($segments[1])) {
                show_error('Invalid controller. A subfolder is provided, but the controller class/file is missing.');
            }
            $class = $segments[1];
            if (isset($segments[2])) {
                $method = $segments[2];
            }
        }
        // If the first segment is NOT a folder, then it's a class/file.
        else {
            $class = $segments[0];
            if (isset($segments[1])) {
                $method = $segments[1];
            }
        }
        
        // If the method isn't specified, assume that it's "index".
        if (!$method) {
            $method = "index";
        }
        
        /* END MODIFICATION */
        
        if ( ! file_exists(APPPATH.'controllers/'.$this->directory.ucfirst($class).'.php'))
        {
            // This will trigger 404 later
            return;
        }
        
        $this->set_class($class);
        $this->set_method($method);
        
        // Assign routed segments, index starting from 1
        $this->uri->rsegments = array(
            1 => $class,
            2 => $method
        );
        
        log_message('debug', 'No URI present. Default controller set.');
    }
    
}