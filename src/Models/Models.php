<?php
namespace dormscript\Data\Models;

/**
 * 读取表的对象
 */
class Models
{
    public static $ModelArr;
    public static function getObj($tablename)
    {
        if (!isset(self::$ModelArr[md5($tablename)])) {
            self::$ModelArr[md5($tablename)] = self::readFile($tablename);
        }
        return self::$ModelArr[md5($tablename)];
    }

    //释放资源
    public static function delObj($tablename)
    {
        if (isset(self::$ModelArr[md5($tablename)])) {
            unset(self::$ModelArr[md5($tablename)]);
        }
    }

    /**
     * 根据tablename获取Models对象
     * @param  [type] $tablename [description]
     * @return [type]            [description]
     */
    public static function readFile($tablename)
    {
        if (class_exists($tablename)) {
            return new $tablename;
        }
        die("\n表不存在:" . $tablename);
    }
}
