<?php namespace SevenShores\Kraken\Transformers;

use SevenShores\Kraken\PropertyType;

class PropertyTypeTransformer extends Transformer
{
    /**
     * Transform this item object into a generic array.
     *
     * @param PropertyType $type
     * @return array
     */
    public function transform(PropertyType $type)
    {
        return [
            'id'      => (int) $type->id,
            'name'    => $type->name,
            'element' => $type->element,
            'type'    => $type->type,
            'is_void' => (bool) $type->is_void,
        ];
    }
}
