<?php
/**
 * 静态服务类
 * StaticService
 * @author tzw
 */
namespace Server;
class StaticService{
    protected static $data;

    /**
     * 设置静态数据
     * @param string $key key
     * @param mixed $data data
     * @return mixed
     */
    public static function setData($key,$data){
        self::$data[$key] = $data;
        return self::$data[$key];
    }
    
    /**
     * 通过引用使用静态数据
     * @param string $key key
     * @return mixed
     */
    public static function & getData($key){
		if(!isset(self::$data[$key])){
            self::$data[$key] = null;
        }
		return self::$data[$key];
    }
    
    /**
     * 缓存实例化过的对象
     * @param string $name 类名
     * @return object
     */
    public static function getInstance($name){
		$key = 'service_@_'.$name;
		$model = &self::getData($key);
		if($model === null){
			$model = new $name();
		}
		return $model;
    }
    
    /**
     * html转义过滤
     * @param mixed $input 输入
     * @return mixed
     */
    public static function htmlFilter($input){
        if(is_array($input)) {
            foreach($input as & $row) {
                $row = self::htmlFilter($row);
            }
        } else {
            if(!get_magic_quotes_gpc()) {
                $input = addslashes($input);
            } 
            $input = htmlspecialchars($input);
        }
        return $input;
    }
}