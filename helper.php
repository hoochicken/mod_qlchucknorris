<?php
/**
 * @package        mod_qlchucknorris
 * @copyright    Copyright (C) 2022 ql.de All rights reserved.
 * @author        Mareike Riegel mareike.riegel@ql.de
 * @license        GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

class modQlchucknorrisHelper
{
    public $params;
    public $module;

    /** @var string */
    public $strButtons = '';
    /** @var string */
    public $strText = '';
    /** @var string */
    public $strButton = '';
    /** @var */
    public $objDb;

    /**
     * modQlchucknorrisHelper constructor.
     * @param $module
     * @param $params
     */
    function __construct($module, $params)
    {
        $this->module = $module;
        $this->params = $params;
        $this->objDb = JFactory::getDbo();
    }

    /**
     * @param $strText
     * @return mixed
     */
    public function cleanString($strText)
    {
        $strRegex = '/[^#%\'!.,()-’a-zA-Z0-9\s]/';
        $strText = preg_replace($strRegex, '', $strText);
        return $strText;
    }

    /**
     * @return string
     */
    public function getTextDefault()
    {
        require_once __DIR__ . '/php/classes/ChuckNorrisFacts.php';
        $this->strText = mar::getText();
        return $this->strText;
    }

    /**
     * @return string
     */
    public function getButtonsDefault()
    {
        require_once __DIR__ . '/php/classes/ChuckNorrisFacts.php';
        $this->strButtons = mar::getButtons();
        return $this->strButtons;
    }

    /**
     * @return string
     */
    public function getTextModule()
    {
        $this->strText = $this->params->get('text', '');
        return $this->strText;
    }

    /**
     * @return string
     */
    public function getButtonsModule()
    {
        $this->strButtons = $this->params->get('buttons', '');
        return $this->strButtons;
    }

    /**
     * @return string
     */
    public function getTextArticle()
    {
        $strArticleIds = trim($this->params->get('articles', ''));
        if (empty($strArticleIds)) {
            return '';
        }
        $strArticleIds = $this->checkAndClean($strArticleIds);
        if (empty($strArticleIds)) {
            return '';
        }
        $objQuery = $this->objDb->getQuery(true);
        $objQuery->select('*');
        $objQuery->from('#__content');
        $objQuery->where('state = 1');
        $objQuery->where('id IN (' . $strArticleIds . ')');
        $this->objDb->setQuery($objQuery);
        $arrArticle = $this->objDb->loadObject();
        $this->strText = $arrArticle->introtext . $arrArticle->fulltext;
        return $this->strText;
    }

    /**
     * @return string
     */
    public function getButtonsArticle()
    {
        $this->strButtons = $this->params->get('buttons', '');
        return $this->strButtons;
    }

    /**
     * @return string
     */
    public function getButton()
    {
        $this->strButton = $this->getRandomLine($this->strButtons);
        return $this->strButton;
    }

    /**
     * @param string $string
     * @param string $strDelimiter
     * @return string
     */
    private function getRandomLine($string = '', $strDelimiter = "\n")
    {
        $arrText = explode($strDelimiter, $string);
        return trim($arrText[array_rand($arrText)]);
    }

    /**
     * @param $strIds
     * @param string $strDelimiter
     * @param bool $boolImplode
     * @param string $strGlue
     * @return mixed
     */
    private function checkAndClean($strIds, $strDelimiter = ',', $boolImplode = true, $strGlue = ',')
    {
        $arrReturn = [];
        $arr = explode($strDelimiter, $strIds);
        foreach ($arr as $numId) {
            if (empty($numId) || !is_numeric($numId)) {
                continue;
            }
            $arrReturn[] = $numId;
        }
        if (!$boolImplode) {
            return $arrReturn;
        }
        return implode($strGlue, $arrReturn);
    }
}
