<?php

declare(strict_types=1);

return [
    'accepted'             => ':Attribute баталсан байх шаардлагатай.',
    'accepted_if'          => ':Other нь :value байхад :attribute-г хүлээн зөвшөөрөх ёстой.',
    'active_url'           => ':Attribute талбарт зөв URL хаяг оруулна уу.',
    'after'                => ':Attribute талбарт :date-с хойш огноо оруулна уу.',
    'after_or_equal'       => ':Attribute талбарт :date эсвэл түүнээс хойш огноо оруулна уу.',
    'alpha'                => ':Attribute талбарт латин үсэг оруулна уу.',
    'alpha_dash'           => ':Attribute талбарт латин үсэг, тоо болон зураас оруулах боломжтой.',
    'alpha_num'            => ':Attribute талбарт латин үсэг болон тоо оруулах боломжтой.',
    'array'                => ':Attribute талбар массив байх шаардлагатай.',
    'ascii'                => ':Attribute нь зөвхөн нэг байт үсэг, тоон тэмдэгтүүдийг агуулсан байх ёстой.',
    'before'               => ':Attribute талбарт :date-с өмнөх огноо оруулна уу.',
    'before_or_equal'      => ':Attribute талбарт :date эсвэл түүнээс өмнөх огноо оруулна уу.',
    'between'              => [
        'array'   => ':Attribute массивт :min-:max элемэнт байх шаардлагатай.',
        'file'    => ':Attribute талбарт :min-:max килобайт хэмжээтэй файл оруулна уу.',
        'numeric' => ':Attribute талбарт :min-:max хооронд тоо оруулна уу.',
        'string'  => ':Attribute талбарт :min-:max урттай текст оруулна уу.',
    ],
    'boolean'              => ':Attribute талбарын утга үнэн эсвэл худал байх шаардлагатай.',
    'can'                  => ':Attribute талбарт зөвшөөрөлгүй утгыг агуулж байна.',
    'confirmed'            => ':Attribute талбарын баталагажуулалт тохирохгүй байна.',
    'current_password'     => 'Нууц үг буруу байна.',
    'date'                 => ':Attribute талбарт оруулсан огноо буруу байна.',
    'date_equals'          => ':Attribute нь :date онтой тэнцүү байх естой.',
    'date_format'          => ':Attribute талбарт :format хэлбэртэй огноо оруулна уу.',
    'decimal'              => ':Attribute нь :decimal аравтын оронтой байх ёстой.',
    'declined'             => ':Attribute-аас татгалзах ёстой.',
    'declined_if'          => ':Other нь :value байх үед :attribute-аас татгалзах ёстой.',
    'different'            => ':Attribute талбарт :other -с өөр утга оруулах шаардлагатай.',
    'digits'               => ':Attribute талбарт дараах цифрүүдээс оруулах боломжтой. :digits.',
    'digits_between'       => ':Attribute талбарт :min-:max хоорондох цифр оруулах боломжтой.',
    'dimensions'           => ':Attribute талбарийн зургийн хэмжээс буруу байна.',
    'distinct'             => ':Attribute талбарт ялгаатай утга оруулах шаардлагатай.',
    'doesnt_end_with'      => ':Attribute нь дараахын аль нэгээр төгсөхгүй байж болно: :values.',
    'doesnt_start_with'    => ':Attribute нь дараахын аль нэгээр нь эхэлж болохгүй: :values.',
    'email'                => ':Attribute талбарт зөв и-мэйл хаяг оруулах шаардлагатай.',
    'ends_with'            => ':Attribute дараах аль нэгийг нь дуусгах естой: :values.',
    'enum'                 => 'Сонгосон :attribute буруу байна.',
    'exists'               => 'Сонгогдсон :attribute буруу байна.',
    'file'                 => ':Attribute талбарт файл оруулах шаардлагатай.',
    'filled'               => ':Attribute талбар шаардлагатай.',
    'gt'                   => [
        'array'   => ':Attribute нь :value гаруй зүйлтэй байх ёстой.',
        'file'    => ':Attribute нь :value килобайтаас их байх ёстой.',
        'numeric' => ':Attribute нь :value-аас их байх ёстой.',
        'string'  => ':Attribute нь :value тэмдэгтээс их байх ёстой.',
    ],
    'gte'                  => [
        'array'   => ':Attribute нь :value ба түүнээс дээш зүйлтэй байх ёстой.',
        'file'    => ':Attribute нь :value килобайтаас их буюу тэнцүү байх ёстой.',
        'numeric' => ':Attribute нь :value-аас их буюу тэнцүү байх ёстой.',
        'string'  => ':Attribute нь :value тэмдэгтээс их буюу тэнцүү байх ёстой.',
    ],
    'image'                => ':Attribute талбарт зураг оруулна уу.',
    'in'                   => 'Сонгогдсон :attribute буруу байна.',
    'in_array'             => ':Attribute талбарт оруулсан утга :other -д байхгүй байна.',
    'integer'              => ':Attribute талбарт бүхэл тоо оруулах шаардлагатай.',
    'ip'                   => ':Attribute талбарт зөв IP хаяг оруулах шаардлагатай.',
    'ipv4'                 => ':Attribute нь хүчинтэй ЦТ 4-р хаяг байх естой.',
    'ipv6'                 => ':Attribute нь хүчин төгөлдөр Атв6 хаяг байх естой.',
    'json'                 => ':Attribute талбарт зөв JSON тэмдэгт мөр оруулах шаардлагатай.',
    'lowercase'            => ':Attribute нь жижиг үсгээр бичигдсэн байх ёстой.',
    'lt'                   => [
        'array'   => ':Attribute нь :value-аас бага зүйлтэй байх ёстой.',
        'file'    => ':Attribute нь :value килобайтаас бага байх ёстой.',
        'numeric' => ':Attribute нь :value-аас бага байх ёстой.',
        'string'  => ':Attribute нь :value тэмдэгтээс бага байх ёстой.',
    ],
    'lte'                  => [
        'array'   => ':Attribute-д ​​:value-аас илүү зүйл байх ёсгүй.',
        'file'    => ':Attribute нь :value килобайтаас бага буюу тэнцүү байх ёстой.',
        'numeric' => ':Attribute нь :value-аас бага буюу тэнцүү байх ёстой.',
        'string'  => ':Attribute нь :value тэмдэгтээс бага буюу тэнцүү байх ёстой.',
    ],
    'mac_address'          => ':Attribute нь хүчинтэй MAC хаяг байх ёстой.',
    'max'                  => [
        'array'   => ':Attribute талбарт хамгийн ихдээ :max элемэнт оруулах боломжтой.',
        'file'    => ':Attribute талбарт :max килобайтаас бага хэмжээтэй файл оруулна уу.',
        'numeric' => ':Attribute талбарт :max буюу түүнээс бага утга оруулна уу.',
        'string'  => ':Attribute талбарт :max-с бага урттай текст оруулна уу.',
    ],
    'max_digits'           => ':Attribute нь :max-аас илүү цифртэй байж болохгүй.',
    'mimes'                => ':Attribute талбарт дараах төрлийн файл оруулах боломжтой: :values.',
    'mimetypes'            => ':Attribute талбарт дараах төрлийн файл оруулах боломжтой: :values.',
    'min'                  => [
        'array'   => ':Attribute талбарт хамгийн багадаа :min элемэнт оруулах боломжтой.',
        'file'    => ':Attribute талбарт :min килобайтаас их хэмжээтэй файл оруулна уу.',
        'numeric' => ':Attribute талбарт :min буюу түүнээс их тоо оруулна уу.',
        'string'  => ':Attribute талбарт :min буюу түүнээс их үсэг бүхий текст оруулна уу.',
    ],
    'min_digits'           => ':Attribute нь дор хаяж :min оронтой байх ёстой.',
    'missing'              => ':Attribute талбар дутуу байх ёстой.',
    'missing_if'           => ':Other нь :value байхад :attribute талбар дутуу байх ёстой.',
    'missing_unless'       => ':Other нь :value биш л бол :attribute талбар дутуу байх ёстой.',
    'missing_with'         => ':Values байх үед :attribute талбар дутуу байх ёстой.',
    'missing_with_all'     => ':Values байх үед :attribute талбар дутуу байх ёстой.',
    'multiple_of'          => ':Attribute нь олон байх естой :value',
    'not_in'               => 'Буруу :attribute сонгогдсон байна.',
    'not_regex'            => ':Attribute хэлбэр нь хүчин төгөлдөр бус байна.',
    'numeric'              => ':Attribute талбарт тоон утга оруулна уу.',
    'password'             => [
        'letters'       => ':Attribute нь дор хаяж нэг үсэг агуулсан байх ёстой.',
        'mixed'         => ':Attribute нь дор хаяж нэг том, нэг жижиг үсэг агуулсан байх ёстой.',
        'numbers'       => ':Attribute нь дор хаяж нэг тоог агуулсан байх ёстой.',
        'symbols'       => ':Attribute-д ​​дор хаяж нэг тэмдэг орсон байх ёстой.',
        'uncompromised' => 'Өгөгдсөн :attribute нь мэдээлэл алдагдсан байна. Өөр :attribute сонгоно уу.',
    ],
    'present'              => ':Attribute талбар байх шаардлагатай.',
    'prohibited'           => ':Attribute талбар нь хориглоно.',
    'prohibited_if'        => ':Other нь :value үед :attribute талбар нь хориглоно.',
    'prohibited_unless'    => ':Attribute салбарт бол хориглоно :other нь :values.',
    'prohibits'            => ':Attribute талбарт :other хүн байхыг хориглодог.',
    'regex'                => ':Attribute талбарт оруулсан утга буруу байна.',
    'required'             => ':Attribute талбар шаардлагатай.',
    'required_array_keys'  => ':Attribute талбарт :values-д зориулсан оруулгууд байх ёстой.',
    'required_if'          => 'Хэрэв :other :value бол :attribute табларт утга оруулах шаардлагатай.',
    'required_if_accepted' => ':Other-г хүлээн авах үед :attribute талбар шаардлагатай.',
    'required_unless'      => ':Other :values дотор байхгүй бол :attribute талбарт утга оруулах шаардлагатай.',
    'required_with'        => ':Values утгуудийн аль нэг байвал :attribute талбар шаардлагатай.',
    'required_with_all'    => ':Values утгууд байвал :attribute талбар шаардлагатай.',
    'required_without'     => ':Attribute талбар нь :values байхгүй үед шаардлагатай байна.',
    'required_without_all' => 'Аль нь ч байхгүй үед :attribute талбар шаардлагатай байна :values байгаа.',
    'same'                 => ':Attribute болон :other тохирох естой.',
    'size'                 => [
        'array'   => ':Attribute :size элемэнттэй байх шаардлагатай.',
        'file'    => ':Attribute :size килобайт хэмжээтэй байх шаардлагатай.',
        'numeric' => ':Attribute :size хэмжээтэй байх шаардлагатай.',
        'string'  => ':Attribute :size тэмдэгтийн урттай байх шаардлагатай.',
    ],
    'starts_with'          => ':Attribute дараах аль нэг нь эхлэх естой: :values.',
    'string'               => ':Attribute талбарт текст оруулна уу.',
    'timezone'             => ':Attribute талбарт зөв цагийн бүс оруулна уу.',
    'ulid'                 => ':Attribute нь хүчинтэй ULID байх ёстой.',
    'unique'               => 'Оруулсан :attribute аль хэдий нь бүртгэгдсэн байна.',
    'uploaded'             => ':Attribute талбарт оруулсан файлыг хуулхад алдаа гарлаа.',
    'uppercase'            => ':Attribute нь том үсгээр бичигдсэн байх ёстой.',
    'url'                  => ':Attribute зөв url хаяг оруулна уу.',
    'uuid'                 => ':Attribute хүчин төгөлдөр хуучин төгөлдөр улс байх естой.',
    'attributes'           => [
        'address'                  => 'хаяг',
        'age'                      => 'нас',
        'amount'                   => 'хэмжээ',
        'area'                     => 'талбай',
        'available'                => 'боломжтой',
        'birthday'                 => 'төрсөн өдөр',
        'body'                     => 'бие',
        'city'                     => 'хот',
        'content'                  => 'агуулга',
        'country'                  => 'улс',
        'created_at'               => '-д үүсгэсэн',
        'creator'                  => 'бүтээгч',
        'current_password'         => 'Одоогын Нууц Үг',
        'date'                     => 'огноо',
        'date_of_birth'            => 'төрсөн өдөр',
        'day'                      => 'өдөр',
        'deleted_at'               => 'устгасан',
        'description'              => 'тайлбар',
        'district'                 => 'дүүрэг',
        'duration'                 => 'үргэлжлэх хугацаа',
        'email'                    => 'имэйл',
        'excerpt'                  => 'ишлэл',
        'filter'                   => 'шүүлтүүр',
        'first_name'               => 'Нэр',
        'gender'                   => 'хүйс',
        'group'                    => 'бүлэг',
        'hour'                     => 'цаг',
        'image'                    => 'зураг',
        'last_name'                => 'овог нэр',
        'lesson'                   => 'хичээл',
        'line_address_1'           => 'мөрийн хаяг 1',
        'line_address_2'           => 'мөрийн хаяг 2',
        'message'                  => 'Захиа',
        'middle_name'              => 'дунд нэр',
        'minute'                   => 'минут',
        'mobile'                   => 'гар утас',
        'month'                    => 'сар',
        'name'                     => 'нэр',
        'national_code'            => 'үндэсний код',
        'number'                   => 'тоо',
        'password'                 => 'нууц үг',
        'password_confirmation'    => 'нууц үг баталгаажуулах',
        'phone'                    => 'утас',
        'photo'                    => 'гэрэл зураг',
        'postal_code'              => 'шуудангийн код',
        'price'                    => 'Үнэ',
        'province'                 => 'аймаг',
        'recaptcha_response_field' => 'recaptcha хариултын талбар',
        'remember'                 => 'санаж байна',
        'restored_at'              => 'цагт сэргээсэн',
        'result_text_under_image'  => 'зургийн доорх үр дүнгийн текст',
        'role'                     => 'үүрэг',
        'second'                   => 'хоёрдугаарт',
        'sex'                      => 'секс',
        'short_text'               => 'богино текст',
        'size'                     => 'хэмжээ',
        'state'                    => 'муж',
        'street'                   => 'гудамж',
        'student'                  => 'оюутан',
        'subject'                  => 'сэдэв',
        'teacher'                  => 'багш',
        'terms'                    => 'нөхцөл',
        'test_description'         => 'туршилтын тодорхойлолт',
        'test_locale'              => 'туршилтын нутаг дэвсгэр',
        'test_name'                => 'туршилтын нэр',
        'text'                     => 'текст',
        'time'                     => 'цаг',
        'title'                    => 'гарчиг',
        'updated_at'               => 'шинэчлэгдсэн',
        'username'                 => 'хэрэглэгчийн нэр',
        'year'                     => 'жил',
    ],
];
