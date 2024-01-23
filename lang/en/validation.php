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

    'accepted' => 'Câmpul :attribute trebuie să fie acceptat.',
    'accepted_if' => 'Câmpul :attribute trebuie să fie acceptat când :other este :value.',
    'active_url' => 'Câmpul :attribute trebuie să fie un URL valid.',
    'after' => 'Câmpul :attribute trebuie să fie o dată după :date.',
    'after_or_equal' => 'Câmpul :attribute trebuie să fie o dată după sau egală cu :date.',
    'alpha' => 'Câmpul :attribute trebuie să conțină doar litere.',
    'alpha_dash' => 'Câmpul :attribute trebuie să conțină doar litere, numere, liniuțe și sublinieri.',
    'alpha_num' => 'Câmpul :attribute trebuie să conțină doar litere și numere.',
    'array' => 'Câmpul :attribute trebuie să fie un array.',
    'ascii' => 'Câmpul :attribute trebuie să conțină doar caractere alfanumerice și simboluri single-byte.',
    'before' => 'Câmpul :attribute trebuie să fie o dată înainte de :date.',
    'before_or_equal' => 'Câmpul :attribute trebuie să fie o dată înainte sau egală cu :date.',
    'between' => [
        'array' => 'Câmpul :attribute trebuie să aibă între :min și :max elemente.',
        'file' => 'Câmpul :attribute trebuie să fie între :min și :max kilobytes.',
        'numeric' => 'Câmpul :attribute trebuie să fie între :min și :max.',
        'string' => 'Câmpul :attribute trebuie să fie între :min și :max caractere.',
    ],
    'boolean' => 'Câmpul :attribute trebuie să fie adevărat sau fals.',
    'can' => 'Câmpul :attribute conține o valoare neautorizată.',
    'confirmed' => 'Confirmarea câmpului :attribute nu se potrivește.',
    'current_password' => 'Parola este incorectă.',
    'date' => 'Câmpul :attribute trebuie să fie o dată validă.',
    'date_equals' => 'Câmpul :attribute trebuie să fie o dată egală cu :date.',
    'date_format' => 'Câmpul :attribute trebuie să corespundă formatului :format.',
    'decimal' => 'Câmpul :attribute trebuie să aibă :decimal zecimale.',
    'declined' => 'Câmpul :attribute trebuie să fie refuzat.',
    'declined_if' => 'Câmpul :attribute trebuie să fie refuzat când :other este :value.',
    'different' => 'Câmpurile :attribute și :other trebuie să fie diferite.',
    'digits' => 'Câmpul :attribute trebuie să aibă :digits cifre.',
    'digits_between' => 'Câmpul :attribute trebuie să fie între :min și :max cifre.',
    'dimensions' => 'Câmpul :attribute are dimensiuni invalide pentru imagine.',
    'distinct' => 'Câmpul :attribute are o valoare duplicată.',
    'doesnt_end_with' => 'Câmpul :attribute nu trebuie să se termine cu următoarele: :values.',
    'doesnt_start_with' => 'Câmpul :attribute nu trebuie să înceapă cu următoarele: :values.',
    'email' => 'Câmpul :attribute trebuie să fie o adresă de email validă.',
    'ends_with' => 'Câmpul :attribute trebuie să se termine cu una din următoarele: :values.',
    'enum' => ':attribute selectat este invalid.',
    'exists' => ':attribute selectat este invalid.',
    'extensions' => 'Câmpul :attribute trebuie să aibă una din următoarele extensii: :values.',
    'file' => 'Câmpul :attribute trebuie să fie un fișier.',
    'filled' => 'Câmpul :attribute trebuie să aibă o valoare.',
    'gt' => [
        'array' => 'Câmpul :attribute trebuie să aibă mai mult de :value elemente.',
        'file' => 'Câmpul :attribute trebuie să fie mai mare de :value kilobytes.',
        'numeric' => 'Câmpul :attribute trebuie să fie mai mare de :value.',
        'string' => 'Câmpul :attribute trebuie să fie mai mare de :value caractere.',
    ],
    'gte' => [
        'array' => 'Câmpul :attribute trebuie să aibă :value elemente sau mai multe.',
        'file' => 'Câmpul :attribute trebuie să fie mai mare sau egal cu :value kilobytes.',
        'numeric' => 'Câmpul :attribute trebuie să fie mai mare sau egal cu :value.',
        'string' => 'Câmpul :attribute trebuie să fie mai mare sau egal cu :value caractere.',
    ],
    'hex_color' => 'Câmpul :attribute trebuie să fie o culoare hexadecimală validă.',
    'image' => 'Câmpul :attribute trebuie să fie o imagine.',
    'in' => ':attribute selectat este invalid.',
    'in_array' => 'Câmpul :attribute trebuie să existe în :other.',
    'integer' => 'Câmpul :attribute trebuie să fie un întreg.',
    'ip' => 'Câmpul :attribute trebuie să fie o adresă IP validă.',
    'ipv4' => 'Câmpul :attribute trebuie să fie o adresă IPv4 validă.',
    'ipv6' => 'Câmpul :attribute trebuie să fie o adresă IPv6 validă.',
    'json' => 'Câmpul :attribute trebuie să fie un șir JSON valid.',
    'lowercase' => 'Câmpul :attribute trebuie să fie scris cu litere mici.',
    'lt' => [
        'array' => 'Câmpul :attribute trebuie să aibă mai puțin de :value elemente.',
        'file' => 'Câmpul :attribute trebuie să fie mai mic de :value kilobytes.',
        'numeric' => 'Câmpul :attribute trebuie să fie mai mic de :value.',
        'string' => 'Câmpul :attribute trebuie să fie mai mic de :value caractere.',
    ],
    'lte' => [
        'array' => 'Câmpul :attribute nu trebuie să aibă mai mult de :value elemente.',
        'file' => 'Câmpul :attribute trebuie să fie mai mic sau egal cu :value kilobytes.',
        'numeric' => 'Câmpul :attribute trebuie să fie mai mic sau egal cu :value.',
        'string' => 'Câmpul :attribute trebuie să fie mai mic sau egal cu :value caractere.',
    ],
    'mac_address' => 'Câmpul :attribute trebuie să fie o adresă MAC validă.',
    'max' => [
        'array' => 'Câmpul :attribute nu trebuie să aibă mai mult de :max elemente.',
        'file' => 'Câmpul :attribute nu trebuie să fie mai mare de :max kilobytes.',
        'numeric' => 'Câmpul :attribute nu trebuie să fie mai mare de :max.',
        'string' => 'Câmpul :attribute nu trebuie să fie mai mare de :max caractere.',
    ],
    'max_digits' => 'Câmpul :attribute nu trebuie să aibă mai mult de :max cifre.',
    'mimes' => 'Câmpul :attribute trebuie să fie un fișier de tipul: :values.',
    'mimetypes' => 'Câmpul :attribute trebuie să fie un fișier de tipul: :values.',
    'min' => [
        'array' => 'Câmpul :attribute trebuie să aibă cel puțin :min elemente.',
        'file' => 'Câmpul :attribute trebuie să fie de cel puțin :min kilobytes.',
        'numeric' => 'Câmpul :attribute trebuie să fie de cel puțin :min.',
        'string' => 'Câmpul :attribute trebuie să fie de cel puțin :min caractere.',
    ],
    'min_digits' => 'Câmpul :attribute trebuie să aibă cel puțin :min cifre.',
    'missing' => 'Câmpul :attribute trebuie să lipsească.',
    'missing_if' => 'Câmpul :attribute trebuie să lipsească când :other este :value.',
    'missing_unless' => 'Câmpul :attribute trebuie să lipsească decât dacă :other este în :values.',
    'missing_with' => 'Câmpul :attribute trebuie să lipsească când :values este prezent.',
    'missing_with_all' => 'Câmpul :attribute trebuie să lipsească când :values sunt prezente.',
    'multiple_of' => 'Câmpul :attribute trebuie să fie un multiplu de :value.',
    'not_in' => 'Câmpul :attribute selectat este invalid.',
    'not_regex' => 'Formatul câmpului :attribute este invalid.',
    'numeric' => 'Câmpul :attribute trebuie să fie un număr.',
    'password' => [
        'letters' => 'Câmpul :attribute trebuie să conțină cel puțin o literă.',
        'mixed' => 'Câmpul :attribute trebuie să conțină cel puțin o literă majusculă și una minusculă.',
        'numbers' => 'Câmpul :attribute trebuie să conțină cel puțin un număr.',
        'symbols' => 'Câmpul :attribute trebuie să conțină cel puțin un simbol.',
        'uncompromised' => ':attribute dat a apărut într-o scurgere de date. Vă rugăm să alegeți un alt :attribute.',
    ],
    'present' => 'Câmpul :attribute trebuie să fie prezent.',
    'present_if' => 'Câmpul :attribute trebuie să fie prezent când :other este :value.',
    'present_unless' => 'Câmpul :attribute trebuie să fie prezent dacă :other nu este :value.',
    'present_with' => 'Câmpul :attribute trebuie să fie prezent când :values este prezent.',
    'present_with_all' => 'Câmpul :attribute trebuie să fie prezent când :values sunt prezente.',
    'prohibited' => 'Câmpul :attribute este interzis.',
    'prohibited_if' => 'Câmpul :attribute este interzis când :other este :value.',
    'prohibited_unless' => 'Câmpul :attribute este interzis dacă :other nu este în :values.',
    'prohibits' => 'Câmpul :attribute interzice :other să fie prezent.',
    'regex' => 'Formatul câmpului :attribute este invalid.',
    'required' => 'Câmpul :attribute este obligatoriu.',
    'required_array_keys' => 'Câmpul :attribute trebuie să conțină intrări pentru: :values.',
    'required_if' => 'Câmpul :attribute este obligatoriu când :other este :value.',
    'required_if_accepted' => 'Câmpul :attribute este obligatoriu când :other este acceptat.',
    'required_unless' => 'Câmpul :attribute este obligatoriu cu excepția cazului în care :other este în :values.',
    'required_with' => 'Câmpul :attribute este obligatoriu când :values este prezent.',
    'required_with_all' => 'Câmpul :attribute este obligatoriu când :values sunt prezente.',
    'required_without' => 'Câmpul :attribute este obligatoriu când :values nu este prezent.',
    'required_without_all' => 'Câmpul :attribute este obligatoriu când niciuna dintre :values nu este prezentă.',
    'same' => 'Câmpul :attribute trebuie să se potrivească cu :other.',
    'size' => [
        'array' => 'Câmpul :attribute trebuie să conțină :size elemente.',
        'file' => 'Câmpul :attribute trebuie să aibă :size kilobytes.',
        'numeric' => 'Câmpul :attribute trebuie să fie :size.',
        'string' => 'Câmpul :attribute trebuie să aibă :size caractere.',
    ],
    'starts_with' => 'Câmpul :attribute trebuie să înceapă cu una din următoarele: :values.',
    'string' => 'Câmpul :attribute trebuie să fie un șir de caractere.',
    'timezone' => 'Câmpul :attribute trebuie să fie un fus orar valid.',
    'unique' => ':attribute a fost deja luat.',
    'uploaded' => ':attribute nu a reușit să fie încărcat.',
    'uppercase' => 'Câmpul :attribute trebuie să fie scris cu litere mari.',
    'url' => 'Câmpul :attribute trebuie să fie un URL valid.',
    'ulid' => 'Câmpul :attribute trebuie să fie un ULID valid.',
    'uuid' => 'Câmpul :attribute trebuie să fie un UUID valid.',


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