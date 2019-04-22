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

    'accepted'             => 'El Campo :attribute debe ser acceptado.',
    'active_url'           => 'El Campo :attribute no es una valid URL.',
    'after'                => 'El Campo :attribute debe ser una fecha después de :date.',
    'after_or_equal'       => 'El Campo :attribute debe ser una fecha después o igual a :date.',
    'alpha'                => 'El Campo :attribute solo puede contener letras.',
    'alpha_dash'           => 'El Campo :attribute solo puede contener letras, números, y guiones.',
    'alpha_num'            => 'El Campo :attribute solo puede contener letras y númenos.',
    'array'                => 'El Campo :attribute debe ser an array.',
    'before'               => 'El Campo :attribute debe ser una fecha antes :date.',
    'before_or_equal'      => 'El Campo :attribute debe ser una fecha antes o igual a :date.',
    'between'              => [
        'numeric' => 'El Campo :attribute debe estar entre :min y :max.',
        'file'    => 'El Campo :attribute debe estar entre :min y :max kilobytes.',
        'string'  => 'El Campo :attribute debe estar entre :min y :max carateres.',
        'array'   => 'El Campo :attribute debe tener entre :min y :max elementos.',
    ],
    'boolean'              => 'El Campo :attribute field debe ser verdadero o falso.',
    'confirmed'            => 'El Campo confirmación de :attribute no coincide.',
    'date'                 => 'El Campo :attribute no es una fecha valida.',
    'date_format'          => 'El Campo :attribute no corresponde con el formato :format.',
    'different'            => 'Los Campos :attribute y :other deben ser diferentes.',
    'digits'               => 'El Campo :attribute debe ser :digits digitos.',
    'digits_between'       => 'El Campo :attribute debe tener entre :min y :max digitos.',
    'dimensions'           => 'El Campo :attribute has invalid image dimensions.',
    'distinct'             => 'El Campo :attribute field has a duplicate value.',
    'email'                => 'El Formato del :attribute es invalido.',
    'exists'               => 'El Campo seleccionado :attribute es invalido.',
    'file'                 => 'El Campo :attribute debe ser un archivo.',
    'filled'               => 'El Campo :attribute es requerido.',
    'image'                => 'El Campo :attribute debe ser una imagen.',
    'in'                   => 'El Campo seleccionado :attribute es invalido.',
    'in_array'             => 'El Campo :attribute field does not exist in :other.',
    'integer'              => 'El Campo :attribute debe ser un entero.',
    'ip'                   => 'El Campo :attribute debe ser una valida IP address.',
    'ipv4'                 => 'El Campo :attribute debe ser una valida IPv4 address.',
    'ipv6'                 => 'El Campo :attribute debe ser una valida IPv6 address.',
    'json'                 => 'El Campo :attribute debe ser una valida JSON string.',
    'max'                  => [
        'numeric' => 'El Campo :attribute debe ser menor que :max.',
        'file'    => 'El Campo :attribute debe ser menor que :max kilobytes.',
        'string'  => 'El Campo :attribute debe ser menor que :max caracteres.',
        'array'   => 'El Campo :attribute debe tener al menos :max elementos.',
    ],
    'mimes'                => 'El Campo :attribute debe ser un archivo de tipo: :values.',
    'mimetypes'            => 'El Campo :attribute debe ser un archivo de tipo: :values.',
    'min'                  => [
        'numeric' => 'El Campo :attribute debe tener al menos :min.',
        'file'    => 'El Campo :attribute debe tener al menos :min kilobytes.',
        'string'  => 'El Campo :attribute debe tener al menos :min caracteres.',
        'array'   => 'El Campo :attribute must have at least :min elementos.',
    ],
    'not_in'               => 'El Campo :attribute seleccionado es invalido.',
    'numeric'              => 'El Campo :attribute debe ser un numero.',
    'present'              => 'El Campo :attribute field debe estar presente.',
    'regex'                => 'El Formato del campo :attribute es invalido.',
    'required'             => 'El Campo :attribute es requerido.',
    'required_if'          => 'El Campo :attribute es requerido cuando el campo :other es :value.',
    'required_unless'      => 'El Campo :attribute es requerido a menos que :other es in :values.',
    'required_with'        => 'El Campo :attribute es requerido cuando :values está presente.',
    'required_with_all'    => 'El Campo :attribute es requerido cuando :values está presente.',
    'required_without'     => 'El Campo :attribute es requerido cuando :values no está presente.',
    'required_without_all' => 'El Campo :attribute es requerido cuando ningun :values está presente.',
    'same'                 => 'El Campo :attribute y :other deben coincidir.',
    'size'                 => [
        'numeric' => 'El Campo :attribute debe ser :size.',
        'file'    => 'El Campo :attribute debe ser :size kilobytes.',
        'string'  => 'El Campo :attribute debe tener :size caracteres.',
        'array'   => 'El Campo :attribute debe contener :size elementos.',
    ],
    'string'               => 'El Campo :attribute debe ser una cadena.',
    'timezone'             => 'El Campo :attribute debe ser una zona valida.',
    'unique'               => 'El Campo :attribute ya ha sido Registrado.',
    'uploaded'             => 'El Campo :attribute fallido la subida.',
    'url'                  => 'El Formato de :attribute es invalido.',

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
