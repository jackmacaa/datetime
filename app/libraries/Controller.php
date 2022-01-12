<?php
    /*
     * Base Controller
     * Loads the model and views
     */
/*namespace app\libraries;*/

    class Controller
    {
        // Load model
        public function model($model)
        {
            // Require model file
            require_once '../app/models/' . $model . '.php';
            // Instantiate model
            return new $model();
        }

        public function view($view, $data =[])
        {
            // Check for view file
            if(file_exists('../app/views/' . $view . '.php'))
            {
                require_once '../app/views/' . $view . '.php';
            }
            else
            {
                die('view does not exist');
            }
        }
    }