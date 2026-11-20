<?php

// Only the rules the public contact form uses. Other rules fall back to English.
return [
    'required' => 'حقل :attribute مطلوب.',
    'string' => 'يجب أن يكون :attribute نصًا.',
    'email' => 'يُرجى إدخال بريد إلكتروني صحيح.',
    'regex' => 'صيغة :attribute غير صحيحة.',
    'prohibited' => 'تعذّر إرسال رسالتك.',
    'min' => [
        'string' => 'يجب ألّا يقلّ :attribute عن :min حرفًا.',
    ],
    'max' => [
        'string' => 'يجب ألّا يزيد :attribute عن :max حرفًا.',
    ],
    'attributes' => [
        'name' => 'الاسم',
        'email' => 'البريد الإلكتروني',
        'phone' => 'رقم الهاتف',
        'subject' => 'الموضوع',
        'message' => 'الرسالة',
    ],
];
