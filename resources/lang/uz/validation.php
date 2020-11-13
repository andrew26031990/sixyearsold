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

    'accepted' => ':attribute қабул қилиниши керак.',
    'active_url' => ':attribute мавжуд URL эмас.',
    'after' => ':attribute , :date дан кейинги сана бўлиши керак.',
    'after_or_equal' => ':attribute , :date дан кейинги йоки унга тенг сана бўлиши керак.',
    'alpha' => ':attribute фақат ҳарфлардан иборат бўлиши мумкин.',
    'alpha_dash' => ':attribute фақат ҳарфлар, рақамлар, чизиқча ва пастки чизиқларни ўз ичига олиши мумкин.',
    'alpha_num' => ':attribute фақат ҳарфлар ва рақамларни ўз ичига олиши мумкин.',
    'array' => ':attribute қатор бўлиши керак.',
    'before' => ':attribute , :date дан олдинги сана бўлиши керак.',
    'before_or_equal' => ':attribute , :date дан олдин йоки унга тенг сана бўлиши лозим.',
    'between' => [
        'numeric' => ':attribute , :min ва :max ни ўртасида бўлиши керак.',
        'file' => ':attribute , :min ва :max килобайт ўртасида бўлиши керак.',
        'string' => ':attribute , :min ва :max белгилар ўртасида бўлиши керак.',
        'array' => ':attribute , :min ва :max ўртасида бўлиши керак.',
    ],
    'boolean' => ':attribute майдон тўғри ёки нотўғри бўлиши керак.',
    'confirmed' => ':attribute тасдиқлаш мос емас.',
    'date' => ':attribute ҳақиқий сана эмас.',
    'date_equals' => ':attribute :date санасига тенг бўлиши керак.',
    'date_format' => ':attribute :format форматга мос келмайди.',
    'different' => ':attribute ва :other ҳар хил бўлиши керак.',
    'digits' => ':attribute , :digits та сон бўлиши керак.',
    'digits_between' => ':attribute , :min ва :max та сон ўртасида бўлиши керак.',
    'dimensions' => ':attribute номуносиб расм ўлчамларига эга.',
    'distinct' => ':attribute майдон такрорланадиган қийматга эга.',
    'email' => ':attribute ҳақиқий электрон почта манзили бўлиши керак.',
    'ends_with' => ':attribute қуйидагилардан бири билан тугаши керак: :values.',
    'exists' => 'Танланган :attribute яроқсиз.',
    'file' => ':attribute файл бўлиши керак.',
    'filled' => ':attribute майдон қийматга эга бўлиши керак.',
    'gt' => [
        'numeric' => ':attribute :value дан каттароқ бўлиши керак.',
        'file' => ':attribute :value килобайтдан каттароқ бўлиши керак.',
        'string' => ':attribute :value белгидан кўпроқ бўлиши керак.',
        'array' => ':attribute :value дан кўпроқ элементлар бўлиши керак.',
    ],
    'gte' => [
        'numeric' => ':attribute :value дан каттароқ йоки тенг бўлиши керак.',
        'file' => ':attribute :value килобайтдан каттароқ йоки шунга тенг бўлиши керак.',
        'string' => ':attribute :value та белгидан кўпроқ йоки тенг бўлиши керак.',
        'array' => ':attribute :value йоки унданда кўпроқ элементлари бўлиши керак.',
    ],
    'image' => ':attribute расм бўлиши керак.',
    'in' => 'Танланган :attribute яроқсиз.',
    'in_array' => ':attribute майдони :other да мавжуд эмас.',
    'integer' => ':attribute бутун сон бўлиши керак.',
    'ip' => ':attribute яроқли IP-манзил бўлиши керак.',
    'ipv4' => ':attribute яроқли IPv4-манзил бўлиши керак.',
    'ipv6' => ':attribute яроқли IPv6-манзил бўлиши керак.',
    'json' => ':attribute яроқли JSON кетма-кетлиги бўлиши керак.',
    'lt' => [
        'numeric' => ':attribute :value дан кам бўлиши керак.',
        'file' => ':attribute :value килобайтдан кам бўлиши керак.',
        'string' => ':attribute :value та белгидан кам бўлиши керак.',
        'array' => ':attribute :value тадан кам элементлари бўлиши керак.',
    ],
    'lte' => [
        'numeric' => ':attribute :value дан кам йоки тенг бўлиши керак.',
        'file' => ':attribute :value килобайтдан кам йоки тенг бўлиши керак.',
        'string' => ':attribute :value та белгидан кам йоки шунга тенг бўлиши керак.',
        'array' => ':attribute :value та элементдан ошмаслиги керак.',
    ],
    'max' => [
        'numeric' => ':attribute :max дан катта бўлмаслиги керак.',
        'file' => ':attribute :max килобайтдан катта бўлмаслиги керак.',
        'string' => ':attribute :max та белгидан катта бўлмаслиги керак.',
        'array' => ':attribute :max элементлардан ортиқ бўлмаслиги керак.',
    ],
    'mimes' => ':attribute қуйидаги турдаги файллар бўлиши мумкин: :values.',
    'mimetypes' => ':attribute қуйидаги турдаги файллар бўлиши мумкин: :values.',
    'min' => [
        'numeric' => ':attribute камида :min бўлиши керак.',
        'file' => ':attribute камида :min килобайт бўлиши керак.',
        'string' => ':attribute камида :min та белги бўлиши керак.',
        'array' => ':attribute камида :min та элементлар бўлиши керак.',
    ],
    'multiple_of' => ':attribute :value нинг кўпайтмаси бўлиши керак',
    'not_in' => 'Танланган :attribute яроқсиз.',
    'not_regex' => ':attribute формат яроқсиз.',
    'numeric' => ':attribute сон бўлиши керак.',
    'password' => 'Парол нотўғри.',
    'present' => ':attribute майдон мавжуд бўлиши керак.',
    'regex' => ':attribute формат яроқсиз.',
    'required' => ':attribute майдон тўлдирилиши мажбурий.',
    'required_if' => ':attribute майдон тўлдирилиши мажбурий қачонки :other :value га тенг бўлганида.',
    'required_unless' => ':attribute тўлдирилиши мажбурий фақатгина :other :values да мавжуд бўлса.',
    'required_with' => ':attribute майдон тўлдирилиши мажбурий фақатгина :values мавжуд бўлса.',
    'required_with_all' => ':attribute майдон тўлдирилиши мажбурий қачонки :values мавжуд бўлса.',
    'required_without' => ':attribute майдон тўлдирилиши мажбурий қачонки :values мавжуд бўлмаса.',
    'required_without_all' => ':attribute майдон тўлдирилиши мажбурий қачонки хеч бир :values лар мавжуд бўлмаса.',
    'same' => ':attribute ва :other мос келиши керак.',
    'size' => [
        'numeric' => ':attribute :size бўлиши керак.',
        'file' => ':attribute :size килобайт бўлиши керак.',
        'string' => ':attribute :size та белгидан иборат бўлиши керак.',
        'array' => ':attribute :size та элементлардан ташкил топган бўлиши керак.',
    ],
    'starts_with' => ':attribute қуйидагиларни бири билан бошланиши керак: :values.',
    'string' => ':attribute сўздан ташкил топган бўлиши керак.',
    'timezone' => ':attribute мавжуд майдон бўлиши керак.',
    'unique' => ':attribute маълумотга эга фойдаланувчи маълумотлар базасида мавжуд.',//'The :attribute has already been taken.'
    'uploaded' => ':attribute юкланмади.',
    'url' => ':attribute формат яроқсиз.',
    'uuid' => ':attribute мавжуд UUID бўлиши керак.',

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
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
