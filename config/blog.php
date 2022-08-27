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
        'post' => 10,
        'comment' => [
            'min' => 3,
            'max' => 20
        ],
    ],
    'categories' => [
        'Food blogs',
        'Travel blogs',
        'Health and fitness blogs',
        'Lifestyle blogs',
        'Fashion and beauty blogs',
        'Photography blogs',
        'Personal blogs',
        'DIY craft blogs',
        'Art and design blogs',
        'Book and writing blogs',
        'Personal finance blogs',
        'Interior design blogs',
        'Sports blogs',
        'News blogs',
        'Movie blogs',
        'Religion blogs',
        'Political blogs',
    ]
];
