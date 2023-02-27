<?php
/**
 * Project template-frontend-package
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 02/07/2022
 * Time: 01:03
 */

namespace nguyenanhung\Platforms\WebBuilderSDK\InitializeCoreServices\Template;

use Twig\Loader\FilesystemLoader as Twig_Loader_FilesystemLoader;
use Twig\Environment as Twig_Environment;
use League\Plates\Engine as League_Plates_Engine;

class Template
{
    /**
     * Function getTemplatesPath
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 27/02/2023 23:29
     */
    public static function getTemplatesPath()
    {
        return dirname(dirname(__DIR__)) . '/templates';
    }

    /**
     * Function getTemplatesExtension
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 2018-12-15 03:18
     *
     * @return string
     */
    public static function getTemplatesExtension()
    {
        return '.html';
    }

    /**
     * Function render
     *
     * @param       $template
     * @param array $data
     *
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 27/02/2023 22:58
     */
    public static function render($template = '', array $data = array())
    {
        $templatesPath = dirname(dirname(__DIR__)) . '/templates';
        $loader = new Twig_Loader_FilesystemLoader($templatesPath);
        $twig = new Twig_Environment($loader);
        $templateFile = $template . '.html';

        return $twig->render($templateFile, $data);
    }

    /**
     * Function nativeRender
     *
     * @param       $template
     * @param array $data
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 27/02/2023 22:53
     */
    public static function nativeRender($template = '', array $data = array())
    {
        $templatesPath = dirname(dirname(__DIR__)) . '/templates';
        $templates = new League_Plates_Engine($templatesPath);

        return $templates->render($template, $data);
    }
}
