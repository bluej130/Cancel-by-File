<?php

/**
 * Created by: Jared Dunham http://djared.com
 * Inspired by: https://stackoverflow.com/a/27296801/3208151
 */

class cancel_by_file {
    
    private $file_name = false;
    
    /**
     * cancel_by_file constructor.
     * Init the temp. file
     *
     * @param $name
     */
    public function __construct($name) {
        $this->init($name);
    }
    
    /**
     * Apply this to check if file has been deleted or not to cancel the process.
     */
    function check(){
        if ( file_get_contents(sys_get_temp_dir()."/{$this->file_name}") != 'run' ) {
            exit('Script was canceled by file deletion.') ;
        }
    }
    
    /**
     * Update cancel file name.
     *
     * @param string $name The new name of the cancel file.
     */
    function name_update($name){
        $this->check(); // first check
        unlink(sys_get_temp_dir()."/$this->file_name");
        $this->init($name);
    }
    
    private function init($name){
        $this->file_name = $this->name_format($name);
        file_put_contents(sys_get_temp_dir()."/$this->file_name",'run');
    }
    
    private function name_format($name){
        return $this->file_name = "php_".date("YmdHis")."_$name";
    }
    
    function __destruct() {
        unlink(sys_get_temp_dir()."/$this->file_name");
    }
    
}
