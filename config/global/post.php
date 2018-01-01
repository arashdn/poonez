<?php

return [
    'image' => [
        'path' => storage_path('post_images'),
        'thumbnail_path' => storage_path('post_images'.DIRECTORY_SEPARATOR.'thumbnails'),

        'size' => ['w'=>800 , 'h'=>600],
        'thumbnail_size' => ['w'=>180 , 'h'=>180],
    ]
];