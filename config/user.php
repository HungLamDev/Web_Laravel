<?php

return [

    'drop_menu' => [
        [
            'name' => 'cập nhật thông tin công ty',
            'icon' => 'la la-file-text',
            'route' => 'get_employer.company.index'
        ]
    ],
    'sidebar' => [
        [
            'title' => 'Dah sách ứng tuyển',
            'icon' => 'la la-file-text',
            'route' => 'get_user.apply_job.index'
        ],
        [
            'title' => 'Danh sách yêu thích',
            'icon' => 'la la-briefcase',
            'route' => 'get_user.job.favourite'
        ],
        [
            'title' => 'Cập nhật mật khẩu',
            'icon' => 'la la-lock',
            'route' => ''
        ],
        [
            'title' => 'Đăng xuất',
            'icon' => 'la la-unlink',
            'route' => ''
        ]
    ]
];
