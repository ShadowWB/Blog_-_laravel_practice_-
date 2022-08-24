<?php

return [
    // Blog post publishing status
    'statuses' => [
        'draft',
        'published',
        'disabled',
        'archived'
    ],
    'seeds' => [
        'user' => 10,
        'category' => 8,
        'post' => 10,
        'comment' => [
            'min' => 10,
            'max' => 99
        ],
    ],
];
