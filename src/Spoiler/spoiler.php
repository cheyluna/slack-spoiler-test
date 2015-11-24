<?php

namespace Spoiler;

class Spoiler
{
    public $config_name = 'config.php';
    
    public $config_path = '';
    
    public $config_vars = array(
        'SLASH_COMMAND',
        'SLASH_COMMAND_TOKEN',
        'WEBHOOK_URL'
    );

    private $config_errors = null;

    public function loadConfig()
    {
        if ($this->hasConfig()) {
            $this->config_path = $_SERVER['DOCUMENT_ROOT'] . "/" . $this->config_name;
            require_once($this->config_path);

            return true;
        }

        return false;
    }

    private function hasConfig()
    {
        return file_exists($_SERVER['DOCUMENT_ROOT'] . "/" . $this->config_name);
    }
    
    public function setupConfigVars()
    {
        foreach ($this->config_vars as $config_var) {
            $result = $this->checkConfigVar($config_var);

            if ($result !== true) {
                $this->config_errors[] = $result;
            }
        }
    }
    
    private function checkConfigVar($config_var)
    {
        $check = getenv($config_var);
        $const = null;

        if ($check !== false) {
            if (empty($check)) {
                return $config_var . ' is empty. Please make sure you have properly set your configuration variables.';
            }

            return define($config_var, $check);
        } elseif (defined($config_var)) {
            $const = constant($config_var);

            if (empty($const)) {
                return $config_var . ' is empty. Please make sure you have your config.php set up properly';
            }

            return true;
        } else {
            return $config_var . ' was not found. Please make sure you have it defined either in your config.php or as a Config Variable.';
        }
    }

    public function hasConfigErrors()
    {
        return $this->config_errors !== null;
    }

    public function getConfigErrors()
    {
        return $this->config_errors;
    }
}
