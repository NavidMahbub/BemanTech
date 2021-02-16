<?php

return [
    'site' => 'PKCSBD',
    'theme' => 'theme6',
    'registration' => [
        'user' => true,
        'email' => true,
        'sms' => true,
        'payment' => true,
        'form' => [
            [
                'title' => 'Basic Information',
                'title_bn' => 'ব্যাসিক ইনফরমেশন',
                'fields' => [
                    [
                        'name' => 'Image',
                        'name_bn' => 'ছবি',
                        'field' => 'image',
                        'grid' => 'col-md-12',
                        'type' => 'file',
                        'rules' => 'required',
                        'star' => true
                    ],
                    [
                        'name' => 'Division',
                        'name_bn' => 'বিভাগ',
                        'field' => 'geo_division_id',
                        'grid' => 'col-md-4',
                        'rules' => 'required',
                        'type' => 'select',
                        'options' => [],
                        'options_bn' => [],
                        'star' => true
                    ],
                    [
                        'name' => 'District',
                        'name_bn' => 'জেলা',
                        'field' => 'geo_district_id',
                        'grid' => 'col-md-4',
                        'rules' => 'required',
                        'type' => 'select',
                        'options' => [],
                        'options_bn' => [],
                        'star' => true
                    ],
                    [
                        'name' => 'Upazila',
                        'name_bn' => 'উপজেলা',
                        'field' => 'geo_upazila_id',
                        'grid' => 'col-md-4',
                        'rules' => 'required',
                        'type' => 'select',
                        'options' => [],
                        'options_bn' => [],
                        'star' => true
                    ],
                    [
                        'name' => 'Union',
                        'name_bn' => 'উপজেলা',
                        'field' => 'geo_union_id',
                        'grid' => 'col-md-4',
                        'rules' => '',
                        'type' => 'select',
                        'options' => [],
                        'options_bn' => [],
                        'star' => false
                    ],
                    [
                        'name' => 'District Code',
                        'name_bn' => 'জেলা কোড',
                        'field' => 'district_code',
                        'grid' => 'col-md-4',
                        'type' => 'text',
                        'rules' => '',
                        'star' => false
                    ],
                    [
                        'name' => 'Name',
                        'name_bn' => 'নাম',
                        'field' => 'name',
                        'grid' => 'col-md-4',
                        'type' => 'text',
                        'rules' => 'required',
                        'star' => true
                    ],
                    [
                        'name' => 'Father\'s Name',
                        'name_bn' => 'পিতার নাম',
                        'field' => 'father_name',
                        'grid' => 'col-md-4',
                        'type' => 'text',
                        'rules' => '',
                        'star' => false
                    ],
                    [
                        'name' => 'Mother\'s Name',
                        'name_bn' => 'মাতার নাম',
                        'field' => 'mother_name',
                        'grid' => 'col-md-4',
                        'type' => 'text',
                        'rules' => '',
                        'star' => false
                    ],
                    [
                        'name' => 'Mobile No of Player',
                        'name_bn' => 'খেলোয়াড়ের মোবাইল নম্বর',
                        'field' => 'player_mobile',
                        'grid' => 'col-md-4',
                        'type' => 'text',
                        'rules' => '',
                        'star' => false
                    ],
                    [
                        'name' => 'Mobile No of Guardian',
                        'name_bn' => 'গার্ডিয়ানের মোবাইল নম্বর',
                        'field' => 'guardian_mobile',
                        'grid' => 'col-md-4',
                        'type' => 'text',
                        'rules' => '',
                        'star' => false
                    ],
                    [
                        'name' => 'Facebook ID',
                        'name_bn' => 'ফেসবুক আইডি',
                        'field' => 'fb_id',
                        'grid' => 'col-md-4',
                        'type' => 'text',
                        'rules' => '',
                        'star' => false
                    ],
                    [
                        'name' => 'Skype/Imo/Viber ID',
                        'name_bn' => 'স্কাইপ/ইমো/ভাইবার আইডি',
                        'field' => 'siv_id',
                        'grid' => 'col-md-4',
                        'type' => 'text',
                        'rules' => '',
                        'star' => false
                    ],
                    [
                        'name' => 'School/College',
                        'name_bn' => 'স্কুল/কলেজ',
                        'field' => 'school_college',
                        'grid' => 'col-md-4',
                        'type' => 'text',
                        'rules' => '',
                        'star' => false
                    ],
                    [
                        'name' => 'Class/Year',
                        'name_bn' => 'শ্রেনী/বর্ষ',
                        'field' => 'class_year',
                        'grid' => 'col-md-4',
                        'type' => 'text',
                        'rules' => '',
                        'star' => false
                    ],
                    [
                        'name' => 'Section',
                        'name_bn' => 'সেকশান',
                        'field' => 'section',
                        'grid' => 'col-md-4',
                        'type' => 'text',
                        'rules' => '',
                        'star' => false
                    ],
                    [
                        'name' => 'Height',
                        'name_bn' => 'উচ্চতা',
                        'field' => 'height',
                        'grid' => 'col-md-4',
                        'type' => 'text',
                        'rules' => '',
                        'star' => false
                    ],
                    [
                        'name' => 'Weight',
                        'name_bn' => 'ওজন',
                        'field' => 'weight',
                        'grid' => 'col-md-4',
                        'type' => 'text',
                        'rules' => '',
                        'star' => false
                    ],
                    [
                        'name' => 'Blood Group',
                        'name_bn' => 'রক্তের গ্রুপ',
                        'field' => 'blood_group',
                        'grid' => 'col-md-4',
                        'type' => 'text',
                        'rules' => '',
                        'star' => false
                    ],
                    [
                        'name' => 'Group',
                        'name_bn' => 'গ্রুপ',
                        'field' => 'group',
                        'grid' => 'col-md-4',
                        'type' => 'radio',
                        'options' => [
                            'Group A (Class 6 + 7)' => 'Group A (Class 6 + 7)',
                            'Group B (Class 8 + 9 + 10)' => 'Group B (Class 8 + 9 + 10)',
                            'Group C (Class 11 + 12)' => 'Group C (Class 11 + 12)'
                        ],
                        'options_bn' => [
                            'Group A (Class 6 + 7)' => 'গ্রুপ এ (ষষ্ঠ ও সপ্তম শ্রেনী)',
                            'Group B (Class 8 + 9 + 10)' => 'গ্রুপ বি (অষ্টম, নবম ও দশম শ্রেনী)',
                            'Group C (Class 11 + 12)' => 'গ্রুপ বি (একাদশ ও দ্বাদশ শ্রেনী)'
                        ],
                        'rules' => 'required',
                        'star' => true
                    ],
                    [
                        'name' => 'Playing Action',
                        'name_bn' => 'খেলার ধরন',
                        'field' => 'playing_action',
                        'grid' => 'col-md-4',
                        'type' => 'radio',
                        'options' => [
                            'Batting' => 'Batting',
                            'Bowling' => 'Bowling',
                            'Wicket Keeping' => 'Wicket Keeping'
                        ],
                        'options_bn' => [
                            'Batting' => 'ব্যাটিং',
                            'Bowling' => 'বোলিং',
                            'Wicket Keeping' => 'উইকেট কিপিং'
                        ],
                        'rules' => 'required',
                        'star' => true
                    ]
                ]
            ],
            [
                'title' => 'Present Address',
                'title_bn' => 'বর্তমান ঠিকানা',
                'fields' => [
                    [
                        'name' => 'Village/Road',
                        'name_bn' => 'গ্রাম/রোড',
                        'field' => 'village_road',
                        'grid' => 'col-md-4',
                        'type' => 'text',
                        'rules' => '',
                        'star' => false
                    ],
                    [
                        'name' => 'House',
                        'name_bn' => 'হাউজ',
                        'field' => 'house',
                        'grid' => 'col-md-4',
                        'type' => 'text',
                        'rules' => '',
                        'star' => false
                    ],
                    [
                        'name' => 'Floor',
                        'name_bn' => 'ফ্লোর',
                        'field' => 'floor',
                        'grid' => 'col-md-4',
                        'type' => 'text',
                        'rules' => '',
                        'star' => false
                    ],
                    [
                        'name' => 'P.S.',
                        'name_bn' => 'পি. এস.',
                        'field' => 'ps',
                        'grid' => 'col-md-4',
                        'type' => 'text',
                        'rules' => '',
                        'star' => false
                    ],
                    [
                        'name' => 'District',
                        'name_bn' => 'জেলা',
                        'field' => 'district',
                        'grid' => 'col-md-4',
                        'type' => 'text',
                        'rules' => '',
                        'star' => false
                    ]
                ]
            ],
            [
                'title' => 'Permanent Address',
                'title_bn' => 'স্থায়ী ঠিকানা',
                'fields' => [
                    [
                        'name' => 'Village',
                        'name_bn' => 'গ্রাম',
                        'field' => 'village',
                        'grid' => 'col-md-4',
                        'type' => 'text',
                        'rules' => '',
                        'star' => false
                    ],
                    [
                        'name' => 'P.O.',
                        'name_bn' => 'ডাকঘর',
                        'field' => 'po',
                        'grid' => 'col-md-4',
                        'type' => 'text',
                        'rules' => '',
                        'star' => false
                    ],
                    [
                        'name' => 'P.S.',
                        'name_bn' => 'পিএস',
                        'field' => 'ps',
                        'grid' => 'col-md-4',
                        'type' => 'text',
                        'rules' => '',
                        'star' => false
                    ],
                    [
                        'name' => 'District',
                        'name_bn' => 'জেলা',
                        'field' => 'district',
                        'grid' => 'col-md-4',
                        'type' => 'text',
                        'rules' => '',
                        'star' => false
                    ]
                ]
            ],
            [
                'title' => 'Playing Details',
                'title_bn' => 'খেলার বিবরণ',
                'fields' => [
                    [
                        'name' => 'Batting Style',
                        'name_bn' => 'ব্যাটিং স্টাইল',
                        'field' => 'batting_style',
                        'grid' => 'col-md-12',
                        'type' => 'radio',
                        'options' => [
                            'Left Handed Bat' => 'Left Handed Bat',
                            'Right Handed Bat' => 'Right Handed Bat'
                        ],
                        'options_bn' => [
                            'Left Handed Bat' => 'বাঁহাতি ব্যাটিং',
                            'Right Handed Bat' => 'ডানহাতি ব্যাটিং'
                        ],
                        'rules' => 'required',
                        'star' => true
                    ],
                    [
                        'name' => 'Bowling Style',
                        'name_bn' => 'বোলিং স্টাইল',
                        'field' => 'bowling_style',
                        'grid' => 'col-md-12',
                        'type' => 'radio',
                        'options' => [
                            'Left Handed Bowl' => 'Left Handed Bowl',
                            'Right Handed Bowl' => 'Right Handed Bowl'
                        ],
                        'options_bn' => [
                            'Left Handed Bat' => 'বাঁহাতি বোলিং',
                            'Right Handed Bat' => 'ডানহাতি বোলিং'
                        ],
                        'rules' => 'required',
                        'star' => true
                    ],
                    [
                        'name' => 'Bowling Pattern',
                        'name_bn' => 'বোলিং প্যাটার্ন',
                        'field' => 'bowling_pattern',
                        'grid' => 'col-md-12',
                        'type' => 'radio',
                        'options' => [
                            'Left-arm Offbreak' => 'Left-arm Offbreak',
                            'Right-arm Offbreak' => 'Right-arm Offbreak',
                            'Left-arm Legbreak' => 'Left-arm Legbreak',
                            'Right-arm Legbreak' => 'Right-arm Legbreak',
                            'Left-arm Orthodox' => 'Left-arm Orthodox',
                            'Right-arm Orthodox' => 'Right-arm Orthodox',
                            'Left-arm Medium Fast' => 'Left-arm Medium Fast',
                            'Right-arm Medium Fast' => 'Right-arm Medium Fast'
                        ],
                        'options_bn' => [
                            'Left-arm Offbreak' => 'বাঁহাতি অফব্রেক',
                            'Right-arm Offbreak' => 'ডানহাতি অফব্রেক',
                            'Left-arm Legbreak' => 'বাঁহাতি লেগব্রেক',
                            'Right-arm Legbreak' => 'ডানহাতি লেগব্রেক',
                            'Left-arm Orthodox' => 'বাঁহাতি অর্থোডক্স',
                            'Right-arm Orthodox' => 'ডানহাতি অর্থোডক্স',
                            'Left-arm Medium Fast' => 'বাঁহাতি মিডিয়াম ফাস্ট',
                            'Right-arm Medium Fast' => 'ডানহাতি মিডিয়াম ফাস্ট'
                        ],
                        'rules' => 'required',
                        'star' => true
                    ]
                ]
            ],
            [
                'title' => 'Cricket Background',
                'title_bn' => 'ক্রিকেট ব্যাকগ্রাউন্ড',
                'fields' => [
                    [
                        'name' => 'Cricket Academy',
                        'name_bn' => 'ক্রিকেট একাডেমি',
                        'field' => 'cricket_academy',
                        'grid' => 'col-md-4',
                        'type' => 'text',
                        'rules' => '',
                        'star' => false
                    ],
                    [
                        'name' => 'Cricket Club',
                        'name_bn' => 'ক্রিকেট ক্লাব',
                        'field' => 'cricket_club',
                        'grid' => 'col-md-4',
                        'type' => 'text',
                        'rules' => '',
                        'star' => false
                    ],
                    [
                        'name' => 'Major Team',
                        'name_bn' => 'মেজর টীম',
                        'field' => 'major_team',
                        'grid' => 'col-md-4',
                        'type' => 'text',
                        'rules' => '',
                        'star' => false
                    ],
                    [
                        'name' => 'Which Playing Format You Will Participate in this Program?',
                        'name_bn' => 'এই প্রোগ্রামে কোন প্লেয়িং ফরম্যাটে খেলবেন?',
                        'field' => 'playing_format',
                        'grid' => 'col-md-4',
                        'type' => 'text',
                        'rules' => '',
                        'star' => false
                    ]
                ]
            ],
            [
                'title' => 'Account Information',
                'title_bn' => 'একাউন্ট ইনফরমেশন',
                'fields' => [
                    [
                        'name' => 'Email/Phone',
                        'name_bn' => 'ইমেইল/ফোন',
                        'field' => 'phone',
                        'grid' => 'col-md-4',
                        'type' => 'text',
                        'rules' => 'required|unique:users',
                        'star' => true
                    ],
                    [
                        'name' => 'Password',
                        'name_bn' => 'পাসওয়ার্ড',
                        'field' => 'password',
                        'grid' => 'col-md-4',
                        'type' => 'password',
                        'rules' => 'required|min:6|confirmed',
                        'star' => true
                    ],
                    [
                        'name' => 'Confirm Password',
                        'name_bn' => 'কনফার্ম পাসওয়ার্ড',
                        'field' => 'password_confirmation',
                        'grid' => 'col-md-4',
                        'type' => 'password',
                        'rules' => 'required',
                        'star' => true
                    ]
                ]
            ],
            [
                'title' => 'Payment Information',
                'title_bn' => 'পেমেন্ট ইনফরমেশন',
                'fields' => [
                    [
                        'name' => 'Payment Type',
                        'name_bn' => 'পেমেন্ট টাইপ',
                        'field' => 'payment_type',
                        'grid' => 'col-md-4',
                        'type' => 'radio',
                        'options' => [
                            'Bkash' => 'Bkash',
                            'Bank' => 'Bank'
                        ],
                        'options_bn' => [
                            'Bkash' => 'বিকাশ',
                            'Bank' => 'ব্যাংক'
                        ],
                        'rules' => 'required',
                        'star' => true
                    ]
                ]
            ]
        ],
        'shortForm' => [
            [
                'title' => 'Basic Information',
                'title_bn' => 'ব্যাসিক ইনফরমেশন',
                'fields' => [
                    [
                        'name' => 'Image',
                        'name_bn' => 'ছবি',
                        'field' => 'image',
                        'grid' => 'col-md-12',
                        'type' => 'file',
                        'rules' => 'required',
                        'star' => true
                    ],
                    [
                        'name' => 'Division',
                        'name_bn' => 'বিভাগ',
                        'field' => 'geo_division_id',
                        'grid' => 'col-md-4',
                        'rules' => 'required',
                        'type' => 'select',
                        'options' => [],
                        'options_bn' => [],
                        'star' => true
                    ],
                    [
                        'name' => 'District',
                        'name_bn' => 'জেলা',
                        'field' => 'geo_district_id',
                        'grid' => 'col-md-4',
                        'rules' => 'required',
                        'type' => 'select',
                        'options' => [],
                        'options_bn' => [],
                        'star' => true
                    ],
                    [
                        'name' => 'Upazila',
                        'name_bn' => 'উপজেলা',
                        'field' => 'geo_upazila_id',
                        'grid' => 'col-md-4',
                        'rules' => 'required',
                        'type' => 'select',
                        'options' => [],
                        'options_bn' => [],
                        'star' => true
                    ],
                    [
                        'name' => 'District Code',
                        'name_bn' => 'জেলা কোড',
                        'field' => 'district_code',
                        'grid' => 'col-md-4',
                        'type' => 'text',
                        'rules' => '',
                        'star' => false
                    ],
                    [
                        'name' => 'Name',
                        'name_bn' => 'নাম',
                        'field' => 'name',
                        'grid' => 'col-md-4',
                        'type' => 'text',
                        'rules' => 'required',
                        'star' => true
                    ],
                    [
                        'name' => 'Mobile No',
                        'name_bn' => 'মোবাইল নম্বর',
                        'field' => 'player_mobile',
                        'grid' => 'col-md-4',
                        'type' => 'text',
                        'rules' => '',
                        'star' => false
                    ],
                    [
                        'name' => 'School/College',
                        'name_bn' => 'স্কুল/কলেজ',
                        'field' => 'school_college',
                        'grid' => 'col-md-4',
                        'type' => 'text',
                        'rules' => '',
                        'star' => false
                    ],
                    [
                        'name' => 'Group',
                        'name_bn' => 'গ্রুপ',
                        'field' => 'group',
                        'grid' => 'col-md-4',
                        'type' => 'radio',
                        'options' => [
                            'Group A (Class 6 + 7)' => 'Group A (Class 6 + 7)',
                            'Group B (Class 8 + 9 + 10)' => 'Group B (Class 8 + 9 + 10)',
                            'Group C (Class 11 + 12)' => 'Group C (Class 11 + 12)'
                        ],
                        'options_bn' => [
                            'Group A (Class 6 + 7)' => 'গ্রুপ এ (ষষ্ঠ ও সপ্তম শ্রেনী)',
                            'Group B (Class 8 + 9 + 10)' => 'গ্রুপ বি (অষ্টম, নবম ও দশম শ্রেনী)',
                            'Group C (Class 11 + 12)' => 'গ্রুপ বি (একাদশ ও দ্বাদশ শ্রেনী)'
                        ],
                        'rules' => 'required',
                        'star' => true
                    ],
                    [
                        'name' => 'Playing Action',
                        'name_bn' => 'খেলার ধরণ',
                        'field' => 'playing_action',
                        'grid' => 'col-md-4',
                        'type' => 'radio',
                        'options' => [
                            'Batting' => 'Batting',
                            'Bowling' => 'Bowling',
                            'Wicket Keeping' => 'Wicket Keeping'
                        ],
                        'options_bn' => [
                            'Batting' => 'ব্যাটিং',
                            'Bowling' => 'বোলিং',
                            'Wicket Keeping' => 'উইকেট কিপিং'
                        ],
                        'rules' => 'required',
                        'star' => true
                    ]
                ]
            ],
            [
                'title' => 'Account Information',
                'title_bn' => 'একাউন্ট ইনফরমেশন',
                'fields' => [
                    [
                        'name' => 'Email/Phone',
                        'name_bn' => 'ইমেইল/ফোন',
                        'field' => 'phone',
                        'grid' => 'col-md-4',
                        'type' => 'text',
                        'rules' => 'required|unique:users',
                        'star' => true
                    ],
                    [
                        'name' => 'Password',
                        'name_bn' => 'পাসওয়ার্ড',
                        'field' => 'password',
                        'grid' => 'col-md-4',
                        'type' => 'password',
                        'rules' => 'required|min:6|confirmed',
                        'star' => true
                    ],
                    [
                        'name' => 'Confirm Password',
                        'name_bn' => 'কনফার্ম পাসওয়ার্ড',
                        'field' => 'password_confirmation',
                        'grid' => 'col-md-4',
                        'type' => 'password',
                        'rules' => 'required',
                        'star' => true
                    ]
                ]
            ],
            [
                'title' => 'Payment Information',
                'title_bn' => 'পেমেন্ট ইনফরমেশন',
                'fields' => [
                    [
                        'name' => 'Payment Type',
                        'name_bn' => 'পেমেন্ট টাইপ',
                        'field' => 'payment_type',
                        'grid' => 'col-md-4',
                        'type' => 'radio',
                        'options' => [
                            'Bkash' => 'Bkash',
                            'Bank' => 'Bank'
                        ],
                        'options_bn' => [
                            'Bkash' => 'বিকাশ',
                            'Bank' => 'ব্যাংক'
                        ],
                        'rules' => 'required',
                        'star' => true
                    ]
                ]
            ]
        ]
    ]
];
