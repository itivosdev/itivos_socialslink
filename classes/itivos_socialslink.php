<?php
/**
 * @author Bernardo Fuentes
 * @since 05/03/2024
 */

class itivos_socialslink extends Model
{
	public $id;
	public $position;
	public $name; 
	public $link;
	public $icon;

	public static function updateOrder($id, $order)
	{
		$query = 'UPDATE '.__DB_PREFIX__.'itivos_socialslink SET position ='.$order.' WHERE id = '.$id.'';
		return connect::execute($query);
	}
	public static function getSocialsLinks()
	{
		$query = "SELECT *, from_base64(icon) as icon  FROM 
					".__DB_PREFIX__."itivos_socialslink ORDER BY position asc";
		return connect::execute($query, "select");
	}
	public static function reOrderSlider($params)
    {
        foreach ($params as $key => $param) {
            self::setOrderSlider($param, $key);
        }
    }
    public static function setOrderSlider($id, $position)
    {
        $query = "UPDATE ".__DB_PREFIX__."itivos_socialslink SET `position` = ".$position." WHERE id ='".$id."' ";
        return connect::execute($query);
    }
}
class_alias("itivos_socialslink", "itivosSocialsLinkC");