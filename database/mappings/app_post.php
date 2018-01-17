<?php

use Sleimanx2\Plastic\Map\Blueprint;
use Sleimanx2\Plastic\Mappings\Mapping;

class AppPost extends Mapping
{
    /**
     * Full name of the model that should be mapped
     *
     * @var string
     */
    protected $model = App\Post::class;

    /**
     * Run the mapping.
     *
     * @return void
     */
    public function map()
    {
        Map::create($this->getModelType(),function(Blueprint $map)
        {
            $map->string('id')->store('true');
            $map->string('title')->store('true')->index('analyzed');
            $map->string('content')->store('true')->index('analyzed');
        },$this->getModelIndex());
    }
}
