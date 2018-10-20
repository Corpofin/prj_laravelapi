<?php
//<project>/app/Http/Resources/BaseResource.php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

abstract class BaseResource extends Resource
{
    public static $map = [];
    
    public static function mapAttribute($attribute,$invert=FALSE)
    {
        if($invert)
            return (array_flip(static::$map)[$attribute]);
        return static::$map[$attribute];
    }
    
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        //attributesToArray es un metodo de laravel del modelo los que estan visibles
        $visibleAttributes = $this->resource->attributesToArray();
        $arAttrMapped = [];
        
        foreach($visibleAttributes as $attribute => $value)
            $arAttrMapped[static::mapAttribute($attribute)] = $value;
        
        if(method_exists($this,"generateLinks"))
        {
            $arHateoas = [
                //por definición los enlaces a HATEOAS es links
                "links" => $this->generateLinks($request)
            ];
            
            return array_merge($arAttrMapped,$arHateoas);
        }
        
        return $arAttrMapped;
    }//toArray

}//BaseResource
