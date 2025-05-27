<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    */

    'accepted'             => 'يجب قبول حقل :attribute.',
    'active_url'           => 'حقل :attribute ليس رابطًا صحيحًا.',
    'after'                => 'يجب أن يكون حقل :attribute تاريخًا بعد :date.',
    'after_or_equal'       => 'يجب أن يكون حقل :attribute تاريخًا يساوي أو بعد :date.',
    'alpha'                => 'يجب أن يحتوي حقل :attribute على حروف فقط.',
    'alpha_dash'           => 'يجب أن يحتوي حقل :attribute على حروف، أرقام، شرطات وشرطات سفلية فقط.',
    'alpha_num'            => 'يجب أن يحتوي حقل :attribute على حروف وأرقام فقط.',
    'array'                => 'يجب أن يكون حقل :attribute مصفوفة.',
    'before'               => 'يجب أن يكون حقل :attribute تاريخًا قبل :date.',
    'before_or_equal'      => 'يجب أن يكون حقل :attribute تاريخًا يساوي أو قبل :date.',
    'between'              => [
        'numeric' => 'يجب أن تكون قيمة حقل :attribute بين :min و :max.',
        'file'    => 'يجب أن يكون حجم ملف حقل :attribute بين :min و :max كيلوبايت.',
        'string'  => 'يجب أن يكون عدد حروف حقل :attribute بين :min و :max.',
        'array'   => 'يجب أن يحتوي حقل :attribute على عدد من العناصر بين :min و :max.',
    ],
    'boolean'              => 'يجب أن تكون قيمة حقل :attribute إما true أو false.',
    'confirmed'            => 'تأكيد حقل :attribute غير متطابق.',
    'date'                 => 'حقل :attribute ليس تاريخًا صحيحًا.',
    'date_equals'          => 'يجب أن يكون حقل :attribute تاريخًا يساوي :date.',
    'date_format'          => 'لا يتطابق حقل :attribute مع الصيغة :format.',
    'different'            => 'يجب أن يكون حقل :attribute و :other مختلفين.',
    'digits'               => 'يجب أن يحتوي حقل :attribute على :digits رقمًا.',
    'digits_between'       => 'يجب أن يحتوي حقل :attribute على عدد من الأرقام بين :min و :max.',
    'dimensions'           => 'حقل :attribute يحتوي على أبعاد صورة غير صالحة.',
    'distinct'             => 'حقل :attribute يحتوي على قيمة مكررة.',
    'email'                => 'يجب أن يكون حقل :attribute بريدًا إلكترونيًا صالحًا.',
    'exists'               => 'حقل :attribute المحدد غير صالح.',
    'file'                 => 'يجب أن يكون حقل :attribute ملفًا.',
    'filled'               => 'حقل :attribute يجب أن يحتوي على قيمة.',
    'gt'                   => [
        'numeric' => 'يجب أن تكون قيمة حقل :attribute أكبر من :value.',
        'file'    => 'يجب أن يكون حجم ملف حقل :attribute أكبر من :value كيلوبايت.',
        'string'  => 'يجب أن يكون عدد حروف حقل :attribute أكبر من :value.',
        'array'   => 'يجب أن يحتوي حقل :attribute على أكثر من :value عنصر.',
    ],
    'gte'                  => [
        'numeric' => 'يجب أن تكون قيمة حقل :attribute أكبر من أو تساوي :value.',
        'file'    => 'يجب أن يكون حجم ملف حقل :attribute أكبر من أو يساوي :value كيلوبايت.',
        'string'  => 'يجب أن يكون عدد حروف حقل :attribute أكبر من أو يساوي :value.',
        'array'   => 'يجب أن يحتوي حقل :attribute على :value عنصرًا أو أكثر.',
    ],
    'image'                => 'يجب أن يكون حقل :attribute صورة.',
    'in'                   => 'حقل :attribute المحدد غير صالح.',
    'in_array'             => 'حقل :attribute غير موجود في :other.',
    'integer'              => 'يجب أن يكون حقل :attribute عددًا صحيحًا.',
    'ip'                   => 'يجب أن يكون حقل :attribute عنوان IP صالحًا.',
    'ipv4'                 => 'يجب أن يكون حقل :attribute عنوان IPv4 صالحًا.',
    'ipv6'                 => 'يجب أن يكون حقل :attribute عنوان IPv6 صالحًا.',
    'json'                 => 'يجب أن يكون حقل :attribute نص JSON صالحًا.',
    'lt'                   => [
        'numeric' => 'يجب أن تكون قيمة حقل :attribute أقل من :value.',
        'file'    => 'يجب أن يكون حجم ملف حقل :attribute أقل من :value كيلوبايت.',
        'string'  => 'يجب أن يكون عدد حروف حقل :attribute أقل من :value.',
        'array'   => 'يجب أن يحتوي حقل :attribute على أقل من :value عنصر.',
    ],
    'lte'                  => [
        'numeric' => 'يجب أن تكون قيمة حقل :attribute أقل من أو تساوي :value.',
        'file'    => 'يجب أن يكون حجم ملف حقل :attribute أقل من أو يساوي :value كيلوبايت.',
        'string'  => 'يجب أن يكون عدد حروف حقل :attribute أقل من أو يساوي :value.',
        'array'   => 'يجب ألا يحتوي حقل :attribute على أكثر من :value عنصر.',
    ],
    'max'                  => [
        'numeric' => 'يجب ألا تكون قيمة حقل :attribute أكبر من :max.',
        'file'    => 'يجب ألا يكون حجم ملف حقل :attribute أكبر من :max كيلوبايت.',
        'string'  => 'يجب ألا يكون عدد حروف حقل :attribute أكبر من :max.',
        'array'   => 'يجب ألا يحتوي حقل :attribute على أكثر من :max عنصر.',
    ],
    'mimes'                => 'يجب أن يكون حقل :attribute ملفًا من النوع: :values.',
    'mimetypes'            => 'يجب أن يكون حقل :attribute ملفًا من النوع: :values.',
    'min'                  => [
        'numeric' => 'يجب أن تكون قيمة حقل :attribute على الأقل :min.',
        'file'    => 'يجب أن يكون حجم ملف حقل :attribute على الأقل :min كيلوبايت.',
        'string'  => 'يجب أن يكون عدد حروف حقل :attribute على الأقل :min.',
        'array'   => 'يجب أن يحتوي حقل :attribute على الأقل على :min عنصر.',
    ],
    'not_in'               => 'حقل :attribute المحدد غير صالح.',
    'not_regex'            => 'صيغة حقل :attribute غير صالحة.',
    'numeric'              => 'يجب أن يكون حقل :attribute رقمًا.',
    'password'             => 'كلمة المرور غير صحيحة.',
    'present'              => 'يجب وجود حقل :attribute.',
    'regex'                => 'صيغة حقل :attribute غير صالحة.',
    'required'             => 'حقل :attribute مطلوب.',
    'required_if'          => 'حقل :attribute مطلوب عندما يكون :other هو :value.',
    'required_unless'      => 'حقل :attribute مطلوب ما لم يكن :other موجودًا في :values.',
    'required_with'        => 'حقل :attribute مطلوب عندما يكون :values موجودًا.',
    'required_with_all'    => 'حقل :attribute مطلوب عندما تكون :values موجودة.',
    'required_without'     => 'حقل :attribute مطلوب عندما لا يكون :values موجودًا.',
    'required_without_all' => 'حقل :attribute مطلوب عندما لا تكون أي من :values موجودة.',
    'same'                 => 'يجب أن يتطابق حقل :attribute مع :other.',
    'size'                 => [
        'numeric' => 'يجب أن تكون قيمة حقل :attribute هي :size.',
        'file'    => 'يجب أن يكون حجم ملف حقل :attribute هو :size كيلوبايت.',
        'string'  => 'يجب أن يكون عدد حروف حقل :attribute هو :size.',
        'array'   => 'يجب أن يحتوي حقل :attribute على :size عنصر.',
    ],
    'string'               => 'يجب أن يكون حقل :attribute نصًا.',
    'timezone'             => 'يجب أن يكون حقل :attribute منطقة زمنية صالحة.',
    'unique'               => 'حقل :attribute مستخدم بالفعل.',
    'uploaded'             => 'فشل رفع حقل :attribute.',
    'url'                  => 'صيغة حقل :attribute غير صالحة.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    */

    'attributes' => [
        'old_password'    => 'كلمة المرور القديمة',
        'new_password'    => 'كلمة المرور الجديدة',
        'repeat_password' => 'تأكيد كلمة المرور',
        'password_confirmation' => 'تأكيد كلمة المرور',
        'password'        => 'كلمة المرور',
        'email'           => 'البريد الإلكتروني',
        'name'            => 'الاسم',
        'phone_number'    => 'رقم الهاتف',
    ],

];
