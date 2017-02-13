<?php

if (!function_exists('env')) {
    /**
     * Gets and optionally parses an environment variable.
     *
     * @param string $name
     * @param mixed $default
     * @return mixed
     */
    function env($name, $default = null)
    {
        $env = getenv($name);

        if ($env === false) {
            return $default;
        }

        switch (strtolower($env)) {
            case 'true':
                return true;
            case 'false':
                return false;
            case 'null':
                return null;
        }

        return $env;
    }
}
