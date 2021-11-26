<?php

/**
 * @package app\libraries
 * @license https://mit-license.org/ MIT License
 * @author  Samuel Reka <rekasamuel0@gmail.com>
 */

namespace app\libraries;

/**
 * Class Config
 * 
 * @param string $base
 * @param string $footer
 * @param string $error
 * @param string $hostname
 * @param string $dbname
 * @param string $username
 * @param string $password
 */
class Config {

    /**
     * @var string $base
     * The base view layout
     */
    public $base = "/app/views/base.html";
    /**
     * @var string $footer
     * The footer view layout
     */
    public $footer = "/app/views/footer.html";
    /**
     * @var string $error
     * The error view layout
     */
    public $error = "/app/views/error.html";
    /**
     * @var string $hostname
     * The host name
     */
    public static $hostname = "127.0.0.1";
    /**
     * @var string $dbname
     * The database name
     */
    public static $dbname = "test";
    /**
     * @var string $username
     * The user name
     */
    public static $username = "root";
    /**
     * @var string $password
     * The password
     */
    public static $password = "123";

}