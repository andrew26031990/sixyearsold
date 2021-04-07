<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    |  following language lines contain  default error messages used by
    |  validator class. Some of se rules have multiple versions such
    | as  size rules. Feel free to tweak each of se messages here.
    |
    */

    'accepted' => ':attribute должен быть принят.',
    'active_url' => ':attribute не действительный URL.',
    'after' => ':attribute должно быть дата после :date.',
    'after_or_equal' => ':attribute должен быть датой после или равной :date.',
    'alpha' => ':attribute может содержать только буквы.',
    'alpha_dash' => ' :attribute может содержать только буквы, цифры, дефисы и символы подчеркивания.',
    'alpha_num' => ' :attribute может содержать только буквы и цифры.',
    'array' => ' :attribute должен быть массив.',
    'before' => ' :attribute должен быть датой до :date.',
    'before_or_equal' => ' :attribute должен быть датой до или равной :date.',
    'between' => [
        'numeric' => ' :attribute должен быть между :min и :max.',
        'file' => ' :attribute должен быть между :min и :max килобайтов.',
        'string' => ' :attribute должен быть между :min и :max символов.',
        'array' => ' :attribute должен быть между :min и :max предметов.',
    ],
    'boolean' => ' :attribute поле должно быть истинным или ложным.',
    'confirmed' => ' :attribute подтверждение не совпадает.',
    'date' => ' :attribute не действительная дата.',
    'date_equals' => ' :attribute должна быть дата, равная :date.',
    'date_format' => ' :attribute не соответствует формату :format.',
    'different' => ' :attribute и :or должно быть другим.',
    'digits' => ' :attribute должен быть :digits цифр.',
    'digits_between' => ' :attribute должно быть между :min и :max цифр.',
    'dimensions' => ' :attribute имеет недопустимые размеры изображения.',
    'distinct' => ' :attribute поле имеет повторяющееся значение.',
    'email' => ' :attribute адрес эл. почты должен быть действительным.',
    'ends_with' => ' :attribute должен заканчиваться одним из следующих: :values.',
    'exists' => ' выбранный :attribute является недействительным.',
    'file' => ' :attribute должен быть файл.',
    'filled' => ' :attribute поле должно иметь значение.',
    'gt' => [
        'numeric' => ' :attribute должно быть больше чем :value.',
        'file' => ' :attribute должно быть больше чем :value килобайтов.',
        'string' => ' :attribute должно быть больше чем :value символов.',
        'array' => ' :attribute должно быть больше чем :value предметов.',
    ],
    'gte' => [
        'numeric' => ' :attribute должно быть больше или равно :value.',
        'file' => ' :attribute должно быть больше или равно :value килобайтам.',
        'string' => ' :attribute должно быть больше или равно :value символам.',
        'array' => ' :attribute должен быть :value предметов или больше.',
    ],
    'image' => ' :attribute должно быть изображение.',
    'in' => ' выбранный :attribute является недействительным.',
    'in_array' => ' :attribute поле не существует в :or.',
    'integer' => ' :attribute должно быть целым числом.',
    'ip' => ' :attribute должен быть действующий IP-адрес.',
    'ipv4' => ' :attribute должен быть действующий IPv4-адрес.',
    'ipv6' => ' :attribute должен быть действующий IPv6-адрес.',
    'json' => ' :attribute должна быть действительной строкой JSON.',
    'lt' => [
        'numeric' => ' :attribute должно быть меньше чем :value.',
        'file' => ' :attribute должно быть меньше чем :value килобайтов.',
        'string' => ' :attribute должно быть меньше чем :value символов.',
        'array' => ' :attribute должно быть меньше чем :value предметов.',
    ],
    'lte' => [
        'numeric' => ' :attribute должно быть меньше или равно :value.',
        'file' => ' :attribute должно быть меньше или равно :value килобайтам.',
        'string' => ' :attribute должно быть меньше или равно :value символам.',
        'array' => ' :attribute не должно быть больше, чем :value предметов.',
    ],
    'max' => [
        'numeric' => ' :attribute не может быть больше чем :max.',
        'file' => ' :attribute не может быть больше чем :max килобайтов.',
        'string' => ' :attribute не может быть больше чем :max символов.',
        'array' => ' :attribute не может быть больше, чем :max предметов.',
    ],
    'mimes' => ' :attribute должен быть файл типа: :values.',
    'mimetypes' => ' :attribute должен быть файл типа: :values.',
    'min' => [
        'numeric' => ' :attribute должен быть не менее :min.',
        'file' => ' :attribute должен быть не менее :min килобайтов.',
        'string' => ' :attribute должен быть не менее :min символов.',
        'array' => ' :attribute должен иметь как минимум :min предметов.',
    ],
    'multiple_of' => ' :attribute должно быть кратно :value',
    'not_in' => ' выбранный :attribute является недействительным.',
    'not_regex' => ' :attribute формат является недействительным.',
    'numeric' => ' :attribute должно быть числом.',
    'password' => ' неверный пароль.',
    'present' => ' :attribute поле должно присутствовать.',
    'regex' => ' :attribute формат является недействительным.',
    'required' => ' :attribute поле, обязательное для заполнения.',
    'required_if' => ' :attribute поле обязательно, когда :or является :value.',
    'required_unless' => ' :attribute поле является обязательным, если только :or в :values.',
    'required_with' => ' :attribute поле обязательно, когда :values присутствует.',
    'required_with_all' => ' :attribute поле обязательно, когда :values присутствуют.',
    'required_without' => ' :attribute поле обязательно, когда :values не присутствует.',
    'required_without_all' => ' :attribute поле является обязательным, если ни один из :values не присутствуют.',
    'same' => ' :attribute и :or должен соответствовать.',
    'size' => [
        'numeric' => ' :attribute должен быть :size.',
        'file' => ' :attribute должен быть :size килобайтов.',
        'string' => ' :attribute должен быть :size символов.',
        'array' => ' :attribute должен содержать :size предметов.',
    ],
    'starts_with' => ' :attribute должен начинаться с одного из следующих: :values.',
    'string' => ' :attribute должна быть строка.',
    'timezone' => ' :attribute должна быть действующая зона.',
    'unique' => 'Пользователь с таким :attribute уже есть в базе.',//' :attribute has already been taken.'
    'uploaded' => ' :attribute не удалось загрузить.',
    'url' => ' :attribute формат является недействительным.',
    'uuid' => ' :attribute должен быть действительный UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using 
    | convention "attribute.rule" to name  lines. This makes it quick to
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
    |  following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
