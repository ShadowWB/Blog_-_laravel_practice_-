<?php

return [
    // Blog post publishing status
    'statuses' => [
        'default' => 'draft',
        'options' => ['draft',
            'published',
            'disabled',
            'archived']
    ],
    'seeds' => [
        'user' => 10,
        'category' => 8,
        'post' => [
            'count'=>10,
            'date_from' => '2020-01-01 00:00:00',
            'date_to' => '2022-12-31 23:59:59'
        ],
        'comment' => [
            'min' => 3,
            'max' => 10
        ],
    ],
    'categories' => [
        'Food',
        'Travel',
        'Health and fitness',
        'Lifestyle',
        'Fashion and beauty',
        'Photography',
        'Personal',
        'DIY craft',
        'Art and design',
        'Book and writing',
        'Personal finance',
        'Interior design',
        'Sports',
        'News',
        'Movie',
        'Religion',
        'Political',
    ],
    'images'=>[
        'img/11.png',
        'img/12.png',
        'img/13.png',
        'img/14.png',
        'img/15.png',
        'img/16.png',
        'img/17.png',
        'img/18.png',
        'img/19.png',
        'img/20.png',
        'img/21.png',
        'img/22.png',
        'img/23.png',
        'img/25.png',
        'img/24.png',
        'img/26.png',
        'img/27.png',
        'img/28.png',
        'img/29.png',
        'img/30.png',
        'img/31.png',
        'img/32.png',
        'img/33.png',
        'img/34.png',
        'img/35.png',
    ]

];
