<?php
/**
 * Created by PhpStorm.
 * User: Yuriy
 * Date: 21.07.2018
 * Time: 21:02
 */

namespace frontend\controllers;


use common\models\Category;

class Functions
{
    public static function dd($value)
    {
        echo '<pre>'. print_r($value, true). '</pre>';
    }

    public static function calcMiles($Lat1, $Lon1, $Lat2, $Lon2){//calcMiles($y, $x, $y2, $x2);
        return 3958.75 * acos(  sin($Lat1/57.2958) * sin($Lat2/57.2958) + cos($Lat1/57.2958) * cos($Lat2/57.2958) * cos($Lon2/57.2958 - $Lon1/57.2958)) * 1609.344;
    }

    public static function deleteCKEditorFirstTag1($value)
    {
        $value = trim($value);
        $value = substr($value, 3, 100000);
        $value = substr($value, 0, -4);
        return($value);
    }

    public static function deleteCKEditorFirstTag2($value)
    {
        $value = trim($value);
        $value = substr($value, 4, 100000);
        $value = substr($value, 0, -5);
        return($value);
    }
//    public static function deleteCKEditorTag($value, $tag = 'ul')
//    {
//        $value = trim($value);
//        $pattern = "/^(\<".$tag."\>)(.+)(\<\/".$tag."\>)$/i";
//        $replacement = "\${2}";
//        return preg_replace($pattern, $replacement, $value);
//    }

    public static function calculate_age($birthday) {//2000-0-0
        $birthday_timestamp = strtotime($birthday);
        $age = date('Y') - date('Y', $birthday_timestamp);
        if (date('md', $birthday_timestamp) > date('md')) {
            $age--;
        }
        return $age;
    }
////////////////////рукурсивное меню parent_id
    public static $menu;
    public static function MenuParent_id($menu){
        self::$menu = $menu;
        $tree = self::getTree();
        self::dd($tree);die;
    }

    protected function getTree(){
        $tree = [];
        foreach (self::$menu as $id=>&$node) {
            if (!$node['parent_id'])
                $tree[$id] = &$node;
            else
                self::$menu[$node['parent_id']]['childs'][$node['id']] = &$node;
        }
        return $tree;
    }
////////////////////////////////////////////////////////
}