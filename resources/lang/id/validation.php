<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'Kolom :attribute harus diterima.',
    'active_url'           => 'Kolom :attribute bukan merupakan a valid URL.',
    'after'                => 'Kolom :attribute harus a date after :date.',
    'alpha'                => 'Kolom :attribute hanya boleh berisi huruf.',
    'alpha_dash'           => 'Kolom :attribute hanya boleh berisi huruf, angka, dan dashes.',
    'alpha_num'            => 'Kolom :attribute hanya boleh berisi huruf dan angka.',
    'array'                => 'Kolom :attribute harus an array.',
    'before'               => 'Kolom :attribute harus a date before :date.',
    'between'              => [
        'numeric' => 'Kolom :attribute harus diantara :min dan :max.',
        'file'    => 'Kolom :attribute harus diantara :min dan :max kilobytes.',
        'string'  => 'Kolom :attribute harus diantara :min dan :max karakter.',
        'array'   => 'Kolom :attribute harus berisi antara :min dan :max items.',
    ],
    'boolean'              => 'Kolom :attribute field harus true atau false.',
    'confirmed'            => 'Kolom :attribute confirmation does not match.',
    'date'                 => 'Kolom :attribute bukan merupakan a valid date.',
    'date_format'          => 'Kolom :attribute does not match the format :format.',
    'different'            => 'Kolom :attribute dan :other harus different.',
    'digits'               => 'Kolom :attribute harus :digits digits.',
    'digits_between'       => 'Kolom :attribute harus diantara :min dan :max digits.',
    'distinct'             => 'Kolom :attribute field has a duplicate value.',
    'email'                => 'Kolom :attribute harus a valid email address.',
    'exists'               => 'The selected :attribute tidak valid.',
    'filled'               => 'Kolom :attribute harus diisi.',
    'image'                => 'Kolom :attribute harus an image.',
    'in'                   => 'The selected :attribute tidak valid.',
    'in_array'             => 'Kolom :attribute field does not exist in :other.',
    'integer'              => 'Kolom :attribute harus an integer.',
    'ip'                   => 'Kolom :attribute harus a valid IP address.',
    'json'                 => 'Kolom :attribute harus a valid JSON string.',
    'max'                  => [
        'numeric' => 'Kolom :attribute may not be greater than :max.',
        'file'    => 'Kolom :attribute may not be greater than :max kilobytes.',
        'string'  => 'Kolom :attribute may not be greater than :max karakter.',
        'array'   => 'Kolom :attribute may not have more than :max items.',
    ],
    'mimes'                => 'Kolom :attribute harus a file of type: :values.',
    'min'                  => [
        'numeric' => 'Kolom :attribute harus at least :min.',
        'file'    => 'Kolom :attribute harus at least :min kilobytes.',
        'string'  => 'Kolom :attribute harus at least :min karakter.',
        'array'   => 'Kolom :attribute must have at least :min items.',
    ],
    'not_in'               => 'The selected :attribute tidak valid.',
    'numeric'              => 'Kolom :attribute harus a number.',
    'present'              => 'Kolom :attribute field harus present.',
    'regex'                => 'Format kolom :attribute tidak valid.',
    'required'             => 'Kolom :attribute harus diisi.',
    'required_if'          => 'Kolom :attribute harus diisi ketika :other is :value.',
    'required_unless'      => 'Kolom :attribute harus diisi unless :other is in :values.',
    'required_with'        => 'Kolom :attribute harus diisi ketika :values is present.',
    'required_with_all'    => 'Kolom :attribute harus diisi ketika :values is present.',
    'required_without'     => 'Kolom :attribute harus diisi ketika :values bukan merupakan present.',
    'required_without_all' => 'Kolom :attribute harus diisi ketika none of :values are present.',
    'same'                 => 'Kolom :attribute dan :other must match.',
    'size'                 => [
        'numeric' => 'Kolom :attribute harus :size.',
        'file'    => 'Kolom :attribute harus :size kilobytes.',
        'string'  => 'Kolom :attribute harus :size karakter.',
        'array'   => 'Kolom :attribute must contain :size items.',
    ],
    'string'               => 'Kolom :attribute harus a string.',
    'timezone'             => 'Kolom :attribute harus a valid zone.',
    'unique'               => 'Kolom :attribute has already been taken.',
    'url'                  => 'Format kolom :attribute tidak valid.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
