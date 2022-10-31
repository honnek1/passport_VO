<?php

namespace Glavfinans\Core\Passport;

use Glavfinans\Core\ValueObject\ValueObjectInterface;
use PDO;

/**
 * ValueObject кода субъекта региона.
 */
class CodeOfSubject implements ValueObjectInterface
{
    /** @var string Республика Адыгея */
    protected const ADYGEA_REPUBLIC = '01';

    /** @var string Республика Башкортостан */
    protected const BASHKORTOSTAN_REPUBLIC = '02';

    /** @var string Республика Бурятия */
    protected const BURYATIA_REPUBLIC = '03';

    /** @var string Республика Алтай */
    protected const ALTAY_REPUBLIC = '04';

    /** @var string Республика Дагестан */
    protected const DAGESTAN_REPUBLIC = '05';

    /** @var string Республика Ингушетия */
    protected const INGUSHETIA_REPUBLIC = '06';

    /** @var string Кабардино-Балкарская Республика */
    protected const KABARDINO_BALKARIAN_REPUBLIC = '07';

    /** @var string Республика Калмыкия */
    protected const KALMYKIA_REPUBLIC = '08';

    /** @var string Карачаево-Черкесская Республика */
    protected const KARACHAY_CHERKESSKAYA_REPUBLIC = '09';

    /** @var string Республика Карелия */
    protected const KARELIA_REPUBLIC = '10';

    /** @var string Республика Коми */
    protected const KOMI_REPUBLIC = '11';

    /** @var string Республика Марий Эл */
    protected const MARI_EL_REPUBLIC = '12';

    /** @var string Республика Мордовия */
    protected const MORDOVIA_REPUBLIC = '13';

    /** @var string Республика Саха (Якутия) */
    protected const SAHA_REPUBLIC = '14';

    /** @var string Республика Северная Осетия - Алания */
    protected const NORTH_OSSETIA_REPUBLIC = '15';

    /** @var string Республика Татарстан */
    protected const TATARSTAN_REPUBLIC = '16';

    /** @var string Республика Тыва */
    protected const TYVA_REPUBLIC = '17';

    /** @var string Удмуртская Республика */
    protected const UDMURT_REPUBLIC = '18';

    /** @var string Республика Хакасия */
    protected const KHAKASSIA_REPUBLIC = '19';

    /** @var string Чеченская Республика */
    protected const CHECHEN_REPUBLIC = '20';

    /** @var string Чувашская Республика */
    protected const CHUVASH_REPUBLIC = '21';

    /** @var string Алтайский край */
    protected const ALTAISKY_KRAI = '22';

    /** @var string Краснодарский край */
    protected const KRASNODARSKY_KRAI = '23';

    /** @var string Красноярский край */
    protected const KRASNOYARSKY_KRAI = '24';

    /** @var string Приморский край */
    protected const PRIMORSKY_KRAI = '25';

    /** @var string Ставропольский край */
    protected const STAVROPOLSKY_KRAI = '26';

    /** @var string Хабаровский край */
    protected const KHABAROVSKY_KRAI = '27';

    /** @var string Амурская область */
    protected const AMYRSKAYA_OBLAST = '28';

    /** @var string Архангельская область */
    protected const ARHANGELSKAYA_OBLAST = '29';

    /** @var string Астраханская область */
    protected const ASTRAKHANSKAYA_OBLAST = '30';

    /** @var string Белгородская область */
    protected const BELGORODSKAYA_OBLAST = '31';

    /** @var string Брянская область */
    protected const BRYANSKAYA_OBLAST = '32';

    /** @var string Владимирская область */
    protected const VLADIMIRSKAYA_OBLAST = '33';

    /** @var string Волгоградская область */
    protected const VOLGOGRADSKAYA_OBLAST = '34';

    /** @var string Вологодская область */
    protected const VOLOGODSKAYA_OBLAST = '35';

    /** @var string Воронежская область */
    protected const VORONEJSKAYA_OBLAST = '36';

    /** @var string Ивановская область */
    protected const IVANOVSKAYA_OBLAST = '37';

    /** @var string Иркутская область */
    protected const IRKYTSKAYA_OBLAST = '38';

    /** @var string Калининградская область */
    protected const KALININGRADSKAYA_OBLAST = '39';

    /** @var string Калужская область */
    protected const KALUZSKAYA_OBLAST = '40';

    /** @var string Камчатский край */
    protected const KAMCHATSKY_KRAI = '41';

    /** @var string Кемеровская область */
    protected const KEMEROVSKAYA_OBLAST = '42';

    /** @var string Кировская область */
    protected const KIROVSKAYA_OBLAST = '43';

    /** @var string Костромская область */
    protected const KOSTROMSKAYA_OBLAST = '44';

    /** @var string Курганская область */
    protected const KYRGANSKAYA_OBLAST = '45';

    /** @var string Курская область */
    protected const KYRSKAYA_OBLAST = '46';

    /** @var string Ленинградская область */
    protected const LENINGRADSKAYA_OBLAST = '47';

    /** @var string Липецкая область */
    protected const LIPETSKAYA_OBLAST = '48';

    /** @var string Магаданская область */
    protected const MAGADANSKAYA_OBLAST = '49';

    /** @var string Московская область */
    protected const MOSCOWSKAYA_OBLAST = '50';

    /** @var string Мурманская область */
    protected const MYRMANSKAYA_OBLAST = '51';

    /** @var string Нижегородская область */
    protected const NIZEGORODSKAYA_OBLAST = '52';

    /** @var string Новгородская область */
    protected const NOVGORODSKAYA_OBLAST = '53';

    /** @var string Новосибирская область */
    protected const NOVOSIBIRSKAYA_OBLAST = '54';

    /** @var string Омская область */
    protected const OMSKAYA_OBLAST = '55';

    /** @var string Оренбургская область */
    protected const ORENBURZSKAYA_OBLAST = '56';

    /** @var string Орловская область */
    protected const ORLOVSKAYA_OBLAST = '57';

    /** @var string Пензенская область */
    protected const PENZENSKAYA_OBLAST = '58';

    /** @var string Пермский край */
    protected const PERMSKY_KRAI = '59';

    /** @var string Псковская область */
    protected const PSCOWSKAYA_OBLAST = '60';

    /** @var string Ростовская область */
    protected const ROSTOWSKAYA_OBLAST = '61';

    /** @var string Рязанская область */
    protected const RYAZANSKAYA_OBLAST = '62';

    /** @var string Самарская область */
    protected const SAMARSKAYA_OBLAST = '63';

    /** @var string Саратовская область */
    protected const SARATOVSKAYA_OBLAST = '64';

    /** @var string Сахалинская область */
    protected const SAHALINSKAYA_OBLAST = '65';

    /** @var string Свердловская область */
    protected const SVERDLOVSKAYA_OBLAST = '66';

    /** @var string Смоленская область */
    protected const SMOLENSKAYA_OBLAST = '67';

    /** @var string Тамбовская область */
    protected const TAMBOVSKAYA_OBLAST = '68';

    /** @var string Тверская область */
    protected const TVERSKAYA_OBLAST = '69';

    /** @var string Томская область */
    protected const TOMSKAYA_OBLAST = '70';

    /** @var string Тульская область */
    protected const TYLSKAYA_OBLAST = '71';

    /** @var string Тюменская область */
    protected const TUMENSKAYA_OBLAST = '72';

    /** @var string Ульяновская область */
    protected const ULYANOVSKAYA_OBLAST = '73';

    /** @var string Челябинская область */
    protected const CHELYABINSKAYA_OBLAST = '74';

    /** @var string Забайкальский край */
    protected const ZABAYKALSKY_KRAI = '75';

    /** @var string Ярославская область */
    protected const YAROSLAVSKAYA_OBLAST = '76';

    /** @var string Москва */
    protected const MOSCOW = '77';

    /** @var string Санкт-Петербург */
    protected const SAINT_PETERSBURG = '78';

    /** @var string Еврейская автономная область */
    protected const EVREYASKAYA_OBLAST = '79';

    /** @var string Ненецкий автономный округ */
    protected const NENETSKII_OKRUG = '83';

    /** @var string Ханты-Мансийский автономный округ — Югра */
    protected const HANTY_MANSIISKII_OKRUG = '86';

    /** @var string Чукотский автономный округ */
    protected const CHYKOTSKY_OKRUG = '87';

    /** @var string Ямало-Ненецкий автономный округ */
    protected const YAMALO_NENETSKII_OKRUG = '89';

    /** @var string Республика Крым */
    protected const CRIMEA_REPUBLIC = '91';

    /** @var string Севастополь */
    protected const SEVASTOPOL = '92';

    /** @var string Байконур */
    protected const BAYKONUR = '99';


    /** @var string $code - значение текущего кода субъекта региона */
    protected string $code;


    /**
     * Записываем в свойство код субъекта региона
     * @param string $codeOfSubject - код субъекта региона
     */
    public function __construct(string $codeOfSubject)
    {
        $this->code = $codeOfSubject;
    }

    /**
     * @inheritDoc
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @inheritDoc
     */
    public function getTitle(): string
    {
        return self::getAssocList()[$this->getCode()];
    }

    /**
     * @inheritDoc
     */
    public static function getCodeList(): array
    {
        return [
            self::ADYGEA_REPUBLIC,
            self::BASHKORTOSTAN_REPUBLIC,
            self::BURYATIA_REPUBLIC,
            self::ALTAY_REPUBLIC,
            self::DAGESTAN_REPUBLIC,
            self::INGUSHETIA_REPUBLIC,
            self::KABARDINO_BALKARIAN_REPUBLIC,
            self::KALMYKIA_REPUBLIC,
            self::KARACHAY_CHERKESSKAYA_REPUBLIC,
            self::KARELIA_REPUBLIC,
            self::KOMI_REPUBLIC,
            self::MARI_EL_REPUBLIC,
            self::MORDOVIA_REPUBLIC,
            self::SAHA_REPUBLIC,
            self::NORTH_OSSETIA_REPUBLIC,
            self::TATARSTAN_REPUBLIC,
            self::TYVA_REPUBLIC,
            self::UDMURT_REPUBLIC,
            self::KHAKASSIA_REPUBLIC,
            self::CHECHEN_REPUBLIC,
            self::CHUVASH_REPUBLIC,
            self::ALTAISKY_KRAI,
            self::KRASNODARSKY_KRAI,
            self::KRASNOYARSKY_KRAI,
            self::PRIMORSKY_KRAI,
            self::STAVROPOLSKY_KRAI,
            self::KHABAROVSKY_KRAI,
            self::AMYRSKAYA_OBLAST,
            self::ARHANGELSKAYA_OBLAST,
            self::ASTRAKHANSKAYA_OBLAST,
            self::BELGORODSKAYA_OBLAST,
            self::BRYANSKAYA_OBLAST,
            self::VLADIMIRSKAYA_OBLAST,
            self::VOLGOGRADSKAYA_OBLAST,
            self::VOLOGODSKAYA_OBLAST,
            self::VORONEJSKAYA_OBLAST,
            self::IVANOVSKAYA_OBLAST,
            self::IRKYTSKAYA_OBLAST,
            self::KALININGRADSKAYA_OBLAST,
            self::KALUZSKAYA_OBLAST,
            self::KAMCHATSKY_KRAI,
            self::KEMEROVSKAYA_OBLAST,
            self::KIROVSKAYA_OBLAST,
            self::KOSTROMSKAYA_OBLAST,
            self::KYRGANSKAYA_OBLAST,
            self::KYRSKAYA_OBLAST,
            self::LENINGRADSKAYA_OBLAST,
            self::LIPETSKAYA_OBLAST,
            self::MAGADANSKAYA_OBLAST,
            self::MOSCOWSKAYA_OBLAST,
            self::MYRMANSKAYA_OBLAST,
            self::NIZEGORODSKAYA_OBLAST,
            self::NOVGORODSKAYA_OBLAST,
            self::NOVOSIBIRSKAYA_OBLAST,
            self::OMSKAYA_OBLAST,
            self::ORENBURZSKAYA_OBLAST,
            self::ORLOVSKAYA_OBLAST,
            self::PENZENSKAYA_OBLAST,
            self::PERMSKY_KRAI,
            self::PSCOWSKAYA_OBLAST,
            self::ROSTOWSKAYA_OBLAST,
            self::RYAZANSKAYA_OBLAST,
            self::SAMARSKAYA_OBLAST,
            self::SARATOVSKAYA_OBLAST,
            self::SAHALINSKAYA_OBLAST,
            self::SVERDLOVSKAYA_OBLAST,
            self::SMOLENSKAYA_OBLAST,
            self::TAMBOVSKAYA_OBLAST,
            self::TVERSKAYA_OBLAST,
            self::TOMSKAYA_OBLAST,
            self::TYLSKAYA_OBLAST,
            self::TUMENSKAYA_OBLAST,
            self::ULYANOVSKAYA_OBLAST,
            self::CHELYABINSKAYA_OBLAST,
            self::ZABAYKALSKY_KRAI,
            self::YAROSLAVSKAYA_OBLAST,
            self::MOSCOW,
            self::SAINT_PETERSBURG,
            self::EVREYASKAYA_OBLAST,
            self::NENETSKII_OKRUG,
            self::HANTY_MANSIISKII_OKRUG,
            self::CHYKOTSKY_OKRUG,
            self::YAMALO_NENETSKII_OKRUG,
            self::CRIMEA_REPUBLIC,
            self::SEVASTOPOL,
            self::BAYKONUR,
        ];
    }

    /**
     * @inheritDoc
     */
    public static function getAssocList(): array
    {
        return [
            self::ADYGEA_REPUBLIC => 'Республика Адыгея',
            self::BASHKORTOSTAN_REPUBLIC => 'Республика Башкортостан',
            self::BURYATIA_REPUBLIC => 'Республика Бурятия',
            self::ALTAY_REPUBLIC => 'Республика Алтай',
            self::DAGESTAN_REPUBLIC => 'Республика Дагестан',
            self::INGUSHETIA_REPUBLIC => 'Республика Ингушетия',
            self::KABARDINO_BALKARIAN_REPUBLIC => 'Кабардино-Балкарская Республика',
            self::KALMYKIA_REPUBLIC => 'Республика Калмыкия',
            self::KARACHAY_CHERKESSKAYA_REPUBLIC => 'Карачаево-Черкесская Республика',
            self::KARELIA_REPUBLIC => 'Республика Карелия',
            self::KOMI_REPUBLIC => 'Республика Коми',
            self::MARI_EL_REPUBLIC => 'Республика Марий Эл',
            self::MORDOVIA_REPUBLIC => 'Республика Мордовия',
            self::SAHA_REPUBLIC => 'Республика Саха (Якутия)',
            self::NORTH_OSSETIA_REPUBLIC => 'Республика Северная Осетия — Алания',
            self::TATARSTAN_REPUBLIC => 'Республика Татарстан',
            self::TYVA_REPUBLIC => 'Республика Тыва',
            self::UDMURT_REPUBLIC => 'Удмуртская Республика',
            self::KHAKASSIA_REPUBLIC => 'Республика Хакасия',
            self::CHECHEN_REPUBLIC => 'Чеченская Республика',
            self::CHUVASH_REPUBLIC => 'Чувашская Республика',
            self::ALTAISKY_KRAI => 'Алтайский край',
            self::KRASNODARSKY_KRAI => 'Краснодарский край',
            self::KRASNOYARSKY_KRAI => 'Красноярский край',
            self::PRIMORSKY_KRAI => 'Приморский край',
            self::STAVROPOLSKY_KRAI => 'Ставропольский край',
            self::KHABAROVSKY_KRAI => 'Хабаровский край',
            self::AMYRSKAYA_OBLAST => 'Амурская область',
            self::ARHANGELSKAYA_OBLAST => 'Архангельская область',
            self::ASTRAKHANSKAYA_OBLAST => 'Астраханская область',
            self::BELGORODSKAYA_OBLAST => 'Белгородская область',
            self::BRYANSKAYA_OBLAST => 'Брянская область',
            self::VLADIMIRSKAYA_OBLAST => 'Владимирская область',
            self::VOLGOGRADSKAYA_OBLAST => 'Волгоградская область',
            self::VOLOGODSKAYA_OBLAST => 'Вологодская область',
            self::VORONEJSKAYA_OBLAST => 'Воронежская область',
            self::IVANOVSKAYA_OBLAST => 'Ивановская область',
            self::IRKYTSKAYA_OBLAST => 'Иркутская область',
            self::KALININGRADSKAYA_OBLAST => 'Калининградская область',
            self::KALUZSKAYA_OBLAST => 'Калужская область',
            self::KAMCHATSKY_KRAI => 'Камчатский край',
            self::KEMEROVSKAYA_OBLAST => 'Кемеровская область',
            self::KIROVSKAYA_OBLAST => 'Кировская область',
            self::KOSTROMSKAYA_OBLAST => 'Костромская область',
            self::KYRGANSKAYA_OBLAST => 'Курганская область',
            self::KYRSKAYA_OBLAST => 'Курская область',
            self::LENINGRADSKAYA_OBLAST => 'Ленинградская область',
            self::LIPETSKAYA_OBLAST => 'Липецкая область',
            self::MAGADANSKAYA_OBLAST => 'Магаданская область',
            self::MOSCOWSKAYA_OBLAST => 'Московская область',
            self::MYRMANSKAYA_OBLAST => 'Мурманская область',
            self::NIZEGORODSKAYA_OBLAST => 'Нижегородская область',
            self::NOVGORODSKAYA_OBLAST => 'Новгородская область',
            self::NOVOSIBIRSKAYA_OBLAST => 'Новосибирская область',
            self::OMSKAYA_OBLAST => 'Омская область',
            self::ORENBURZSKAYA_OBLAST => 'Оренбургская область',
            self::ORLOVSKAYA_OBLAST => 'Орловская область',
            self::PENZENSKAYA_OBLAST => 'Пензенская область',
            self::PERMSKY_KRAI => 'Пермский край',
            self::PSCOWSKAYA_OBLAST => 'Псковская область',
            self::ROSTOWSKAYA_OBLAST => 'Ростовская область',
            self::RYAZANSKAYA_OBLAST => 'Рязанская область',
            self::SAMARSKAYA_OBLAST => 'Самарская область',
            self::SARATOVSKAYA_OBLAST => 'Саратовская область',
            self::SAHALINSKAYA_OBLAST => 'Сахалинская область',
            self::SVERDLOVSKAYA_OBLAST => 'Свердловская область',
            self::SMOLENSKAYA_OBLAST => 'Смоленская область',
            self::TAMBOVSKAYA_OBLAST => 'Тамбовская область',
            self::TVERSKAYA_OBLAST => 'Тверская область',
            self::TOMSKAYA_OBLAST => 'Томская область',
            self::TYLSKAYA_OBLAST => 'Тульская область',
            self::TUMENSKAYA_OBLAST => 'Тюменская область',
            self::ULYANOVSKAYA_OBLAST => 'Ульяновская область',
            self::CHELYABINSKAYA_OBLAST => 'Челябинская область',
            self::ZABAYKALSKY_KRAI => 'Забайкальский край',
            self::YAROSLAVSKAYA_OBLAST => 'Ярославская область',
            self::MOSCOW => 'Москва',
            self::SAINT_PETERSBURG => 'Санкт-Петербург',
            self::EVREYASKAYA_OBLAST => 'Еврейская автономная область',
            self::NENETSKII_OKRUG => 'Ненецкий автономный округ',
            self::HANTY_MANSIISKII_OKRUG => 'Ханты-Мансийский автономный округ — Югра',
            self::CHYKOTSKY_OKRUG => 'Чукотский автономный округ',
            self::YAMALO_NENETSKII_OKRUG => 'Ямало-Ненецкий автономный округ',
            self::CRIMEA_REPUBLIC => 'Республика Крым',
            self::SEVASTOPOL => 'Севастополь',
            self::BAYKONUR => 'Байконур',
        ];
    }

    /**
     * @inheritDoc
     */
    public static function getList(): array
    {
        return [
            new self(self::ADYGEA_REPUBLIC),
            new self(self::BASHKORTOSTAN_REPUBLIC),
            new self(self::BURYATIA_REPUBLIC),
            new self(self::ALTAY_REPUBLIC),
            new self(self::DAGESTAN_REPUBLIC),
            new self(self::INGUSHETIA_REPUBLIC),
            new self(self::KABARDINO_BALKARIAN_REPUBLIC),
            new self(self::KALMYKIA_REPUBLIC),
            new self(self::KARACHAY_CHERKESSKAYA_REPUBLIC),
            new self(self::KARELIA_REPUBLIC),
            new self(self::KOMI_REPUBLIC),
            new self(self::MARI_EL_REPUBLIC),
            new self(self::MORDOVIA_REPUBLIC),
            new self(self::SAHA_REPUBLIC),
            new self(self::NORTH_OSSETIA_REPUBLIC),
            new self(self::TATARSTAN_REPUBLIC),
            new self(self::TYVA_REPUBLIC),
            new self(self::UDMURT_REPUBLIC),
            new self(self::KHAKASSIA_REPUBLIC),
            new self(self::CHECHEN_REPUBLIC),
            new self(self::CHUVASH_REPUBLIC),
            new self(self::ALTAISKY_KRAI),
            new self(self::KRASNODARSKY_KRAI),
            new self(self::KRASNOYARSKY_KRAI),
            new self(self::PRIMORSKY_KRAI),
            new self(self::STAVROPOLSKY_KRAI),
            new self(self::KHABAROVSKY_KRAI),
            new self(self::AMYRSKAYA_OBLAST),
            new self(self::ARHANGELSKAYA_OBLAST),
            new self(self::ASTRAKHANSKAYA_OBLAST),
            new self(self::BELGORODSKAYA_OBLAST),
            new self(self::BRYANSKAYA_OBLAST),
            new self(self::VLADIMIRSKAYA_OBLAST),
            new self(self::VOLGOGRADSKAYA_OBLAST),
            new self(self::VOLOGODSKAYA_OBLAST),
            new self(self::VORONEJSKAYA_OBLAST),
            new self(self::IVANOVSKAYA_OBLAST),
            new self(self::IRKYTSKAYA_OBLAST),
            new self(self::KALININGRADSKAYA_OBLAST),
            new self(self::KALUZSKAYA_OBLAST),
            new self(self::KAMCHATSKY_KRAI),
            new self(self::KEMEROVSKAYA_OBLAST),
            new self(self::KIROVSKAYA_OBLAST),
            new self(self::KOSTROMSKAYA_OBLAST),
            new self(self::KYRGANSKAYA_OBLAST),
            new self(self::KYRSKAYA_OBLAST),
            new self(self::LENINGRADSKAYA_OBLAST),
            new self(self::LIPETSKAYA_OBLAST),
            new self(self::MAGADANSKAYA_OBLAST),
            new self(self::MOSCOWSKAYA_OBLAST),
            new self(self::MYRMANSKAYA_OBLAST),
            new self(self::NIZEGORODSKAYA_OBLAST),
            new self(self::NOVGORODSKAYA_OBLAST),
            new self(self::NOVOSIBIRSKAYA_OBLAST),
            new self(self::OMSKAYA_OBLAST),
            new self(self::ORENBURZSKAYA_OBLAST),
            new self(self::ORLOVSKAYA_OBLAST),
            new self(self::PENZENSKAYA_OBLAST),
            new self(self::PERMSKY_KRAI),
            new self(self::PSCOWSKAYA_OBLAST),
            new self(self::ROSTOWSKAYA_OBLAST),
            new self(self::RYAZANSKAYA_OBLAST),
            new self(self::SAMARSKAYA_OBLAST),
            new self(self::SARATOVSKAYA_OBLAST),
            new self(self::SAHALINSKAYA_OBLAST),
            new self(self::SVERDLOVSKAYA_OBLAST),
            new self(self::SMOLENSKAYA_OBLAST),
            new self(self::TAMBOVSKAYA_OBLAST),
            new self(self::TVERSKAYA_OBLAST),
            new self(self::TOMSKAYA_OBLAST),
            new self(self::TYLSKAYA_OBLAST),
            new self(self::TUMENSKAYA_OBLAST),
            new self(self::ULYANOVSKAYA_OBLAST),
            new self(self::CHELYABINSKAYA_OBLAST),
            new self(self::ZABAYKALSKY_KRAI),
            new self(self::YAROSLAVSKAYA_OBLAST),
            new self(self::MOSCOW),
            new self(self::SAINT_PETERSBURG),
            new self(self::EVREYASKAYA_OBLAST),
            new self(self::NENETSKII_OKRUG),
            new self(self::HANTY_MANSIISKII_OKRUG),
            new self(self::CHYKOTSKY_OKRUG),
            new self(self::YAMALO_NENETSKII_OKRUG),
            new self(self::CRIMEA_REPUBLIC),
            new self(self::SEVASTOPOL),
            new self(self::BAYKONUR),
        ];
    }

    /**
     * Сравнение объектов кода субъекта региона
     * @param CodeOfSubject $codeOfSubject
     * @return bool
     */
    public function isEqual(CodeOfSubject $codeOfSubject): bool
    {
        return $this->getCode() === $codeOfSubject->getCode();
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->code;
    }

    /**
     * @inheritDoc
     */
    public function rawValue(): string
    {
        return $this->__toString();
    }

    /**
     * @inheritDoc
     */
    public function rawType(): int
    {
        return PDO::PARAM_STR;
    }
}
 src/Core/Passport/CodeOfSubject.php  0 → 100644
+
619
-
0

Viewed
<?php

namespace Glavfinans\Core\Passport;

use Glavfinans\Core\ValueObject\ValueObjectInterface;
use PDO;

/**
 * ValueObject кода субъекта региона.
 */
class CodeOfSubject implements ValueObjectInterface
{
    /** @var string Республика Адыгея */
    protected const ADYGEA_REPUBLIC = '01';

    /** @var string Республика Башкортостан */
    protected const BASHKORTOSTAN_REPUBLIC = '02';

    /** @var string Республика Бурятия */
    protected const BURYATIA_REPUBLIC = '03';

    /** @var string Республика Алтай */
    protected const ALTAY_REPUBLIC = '04';

    /** @var string Республика Дагестан */
    protected const DAGESTAN_REPUBLIC = '05';

    /** @var string Республика Ингушетия */
    protected const INGUSHETIA_REPUBLIC = '06';

    /** @var string Кабардино-Балкарская Республика */
    protected const KABARDINO_BALKARIAN_REPUBLIC = '07';

    /** @var string Республика Калмыкия */
    protected const KALMYKIA_REPUBLIC = '08';

    /** @var string Карачаево-Черкесская Республика */
    protected const KARACHAY_CHERKESSKAYA_REPUBLIC = '09';

    /** @var string Республика Карелия */
    protected const KARELIA_REPUBLIC = '10';

    /** @var string Республика Коми */
    protected const KOMI_REPUBLIC = '11';

    /** @var string Республика Марий Эл */
    protected const MARI_EL_REPUBLIC = '12';

    /** @var string Республика Мордовия */
    protected const MORDOVIA_REPUBLIC = '13';

    /** @var string Республика Саха (Якутия) */
    protected const SAHA_REPUBLIC = '14';

    /** @var string Республика Северная Осетия - Алания */
    protected const NORTH_OSSETIA_REPUBLIC = '15';

    /** @var string Республика Татарстан */
    protected const TATARSTAN_REPUBLIC = '16';

    /** @var string Республика Тыва */
    protected const TYVA_REPUBLIC = '17';

    /** @var string Удмуртская Республика */
    protected const UDMURT_REPUBLIC = '18';

    /** @var string Республика Хакасия */
    protected const KHAKASSIA_REPUBLIC = '19';

    /** @var string Чеченская Республика */
    protected const CHECHEN_REPUBLIC = '20';

    /** @var string Чувашская Республика */
    protected const CHUVASH_REPUBLIC = '21';

    /** @var string Алтайский край */
    protected const ALTAISKY_KRAI = '22';

    /** @var string Краснодарский край */
    protected const KRASNODARSKY_KRAI = '23';

    /** @var string Красноярский край */
    protected const KRASNOYARSKY_KRAI = '24';

    /** @var string Приморский край */
    protected const PRIMORSKY_KRAI = '25';

    /** @var string Ставропольский край */
    protected const STAVROPOLSKY_KRAI = '26';

    /** @var string Хабаровский край */
    protected const KHABAROVSKY_KRAI = '27';

    /** @var string Амурская область */
    protected const AMYRSKAYA_OBLAST = '28';

    /** @var string Архангельская область */
    protected const ARHANGELSKAYA_OBLAST = '29';

    /** @var string Астраханская область */
    protected const ASTRAKHANSKAYA_OBLAST = '30';

    /** @var string Белгородская область */
    protected const BELGORODSKAYA_OBLAST = '31';

    /** @var string Брянская область */
    protected const BRYANSKAYA_OBLAST = '32';

    /** @var string Владимирская область */
    protected const VLADIMIRSKAYA_OBLAST = '33';

    /** @var string Волгоградская область */
    protected const VOLGOGRADSKAYA_OBLAST = '34';

    /** @var string Вологодская область */
    protected const VOLOGODSKAYA_OBLAST = '35';

    /** @var string Воронежская область */
    protected const VORONEJSKAYA_OBLAST = '36';

    /** @var string Ивановская область */
    protected const IVANOVSKAYA_OBLAST = '37';

    /** @var string Иркутская область */
    protected const IRKYTSKAYA_OBLAST = '38';

    /** @var string Калининградская область */
    protected const KALININGRADSKAYA_OBLAST = '39';

    /** @var string Калужская область */
    protected const KALUZSKAYA_OBLAST = '40';

    /** @var string Камчатский край */
    protected const KAMCHATSKY_KRAI = '41';

    /** @var string Кемеровская область */
    protected const KEMEROVSKAYA_OBLAST = '42';

    /** @var string Кировская область */
    protected const KIROVSKAYA_OBLAST = '43';

    /** @var string Костромская область */
    protected const KOSTROMSKAYA_OBLAST = '44';

    /** @var string Курганская область */
    protected const KYRGANSKAYA_OBLAST = '45';

    /** @var string Курская область */
    protected const KYRSKAYA_OBLAST = '46';

    /** @var string Ленинградская область */
    protected const LENINGRADSKAYA_OBLAST = '47';

    /** @var string Липецкая область */
    protected const LIPETSKAYA_OBLAST = '48';

    /** @var string Магаданская область */
    protected const MAGADANSKAYA_OBLAST = '49';

    /** @var string Московская область */
    protected const MOSCOWSKAYA_OBLAST = '50';

    /** @var string Мурманская область */
    protected const MYRMANSKAYA_OBLAST = '51';

    /** @var string Нижегородская область */
    protected const NIZEGORODSKAYA_OBLAST = '52';

    /** @var string Новгородская область */
    protected const NOVGORODSKAYA_OBLAST = '53';

    /** @var string Новосибирская область */
    protected const NOVOSIBIRSKAYA_OBLAST = '54';

    /** @var string Омская область */
    protected const OMSKAYA_OBLAST = '55';

    /** @var string Оренбургская область */
    protected const ORENBURZSKAYA_OBLAST = '56';

    /** @var string Орловская область */
    protected const ORLOVSKAYA_OBLAST = '57';

    /** @var string Пензенская область */
    protected const PENZENSKAYA_OBLAST = '58';

    /** @var string Пермский край */
    protected const PERMSKY_KRAI = '59';

    /** @var string Псковская область */
    protected const PSCOWSKAYA_OBLAST = '60';

    /** @var string Ростовская область */
    protected const ROSTOWSKAYA_OBLAST = '61';

    /** @var string Рязанская область */
    protected const RYAZANSKAYA_OBLAST = '62';

    /** @var string Самарская область */
    protected const SAMARSKAYA_OBLAST = '63';

    /** @var string Саратовская область */
    protected const SARATOVSKAYA_OBLAST = '64';

    /** @var string Сахалинская область */
    protected const SAHALINSKAYA_OBLAST = '65';

    /** @var string Свердловская область */
    protected const SVERDLOVSKAYA_OBLAST = '66';

    /** @var string Смоленская область */
    protected const SMOLENSKAYA_OBLAST = '67';

    /** @var string Тамбовская область */
    protected const TAMBOVSKAYA_OBLAST = '68';

    /** @var string Тверская область */
    protected const TVERSKAYA_OBLAST = '69';

    /** @var string Томская область */
    protected const TOMSKAYA_OBLAST = '70';

    /** @var string Тульская область */
    protected const TYLSKAYA_OBLAST = '71';

    /** @var string Тюменская область */
    protected const TUMENSKAYA_OBLAST = '72';

    /** @var string Ульяновская область */
    protected const ULYANOVSKAYA_OBLAST = '73';

    /** @var string Челябинская область */
    protected const CHELYABINSKAYA_OBLAST = '74';

    /** @var string Забайкальский край */
    protected const ZABAYKALSKY_KRAI = '75';

    /** @var string Ярославская область */
    protected const YAROSLAVSKAYA_OBLAST = '76';

    /** @var string Москва */
    protected const MOSCOW = '77';

    /** @var string Санкт-Петербург */
    protected const SAINT_PETERSBURG = '78';

    /** @var string Еврейская автономная область */
    protected const EVREYASKAYA_OBLAST = '79';

    /** @var string Ненецкий автономный округ */
    protected const NENETSKII_OKRUG = '83';

    /** @var string Ханты-Мансийский автономный округ — Югра */
    protected const HANTY_MANSIISKII_OKRUG = '86';

    /** @var string Чукотский автономный округ */
    protected const CHYKOTSKY_OKRUG = '87';

    /** @var string Ямало-Ненецкий автономный округ */
    protected const YAMALO_NENETSKII_OKRUG = '89';

    /** @var string Республика Крым */
    protected const CRIMEA_REPUBLIC = '91';

    /** @var string Севастополь */
    protected const SEVASTOPOL = '92';

    /** @var string Байконур */
    protected const BAYKONUR = '99';


    /** @var string $code - значение текущего кода субъекта региона */
    protected string $code;


    /**
     * Записываем в свойство код субъекта региона
     * @param string $codeOfSubject - код субъекта региона
     */
    public function __construct(string $codeOfSubject)
    {
        $this->code = $codeOfSubject;
    }

    /**
     * @inheritDoc
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @inheritDoc
     */
    public function getTitle(): string
    {
        return self::getAssocList()[$this->getCode()];
    }

    /**
     * @inheritDoc
     */
    public static function getCodeList(): array
    {
        return [
            self::ADYGEA_REPUBLIC,
            self::BASHKORTOSTAN_REPUBLIC,
            self::BURYATIA_REPUBLIC,
            self::ALTAY_REPUBLIC,
            self::DAGESTAN_REPUBLIC,
            self::INGUSHETIA_REPUBLIC,
            self::KABARDINO_BALKARIAN_REPUBLIC,
            self::KALMYKIA_REPUBLIC,
            self::KARACHAY_CHERKESSKAYA_REPUBLIC,
            self::KARELIA_REPUBLIC,
            self::KOMI_REPUBLIC,
            self::MARI_EL_REPUBLIC,
            self::MORDOVIA_REPUBLIC,
            self::SAHA_REPUBLIC,
            self::NORTH_OSSETIA_REPUBLIC,
            self::TATARSTAN_REPUBLIC,
            self::TYVA_REPUBLIC,
            self::UDMURT_REPUBLIC,
            self::KHAKASSIA_REPUBLIC,
            self::CHECHEN_REPUBLIC,
            self::CHUVASH_REPUBLIC,
            self::ALTAISKY_KRAI,
            self::KRASNODARSKY_KRAI,
            self::KRASNOYARSKY_KRAI,
            self::PRIMORSKY_KRAI,
            self::STAVROPOLSKY_KRAI,
            self::KHABAROVSKY_KRAI,
            self::AMYRSKAYA_OBLAST,
            self::ARHANGELSKAYA_OBLAST,
            self::ASTRAKHANSKAYA_OBLAST,
            self::BELGORODSKAYA_OBLAST,
            self::BRYANSKAYA_OBLAST,
            self::VLADIMIRSKAYA_OBLAST,
            self::VOLGOGRADSKAYA_OBLAST,
            self::VOLOGODSKAYA_OBLAST,
            self::VORONEJSKAYA_OBLAST,
            self::IVANOVSKAYA_OBLAST,
            self::IRKYTSKAYA_OBLAST,
            self::KALININGRADSKAYA_OBLAST,
            self::KALUZSKAYA_OBLAST,
            self::KAMCHATSKY_KRAI,
            self::KEMEROVSKAYA_OBLAST,
            self::KIROVSKAYA_OBLAST,
            self::KOSTROMSKAYA_OBLAST,
            self::KYRGANSKAYA_OBLAST,
            self::KYRSKAYA_OBLAST,
            self::LENINGRADSKAYA_OBLAST,
            self::LIPETSKAYA_OBLAST,
            self::MAGADANSKAYA_OBLAST,
            self::MOSCOWSKAYA_OBLAST,
            self::MYRMANSKAYA_OBLAST,
            self::NIZEGORODSKAYA_OBLAST,
            self::NOVGORODSKAYA_OBLAST,
            self::NOVOSIBIRSKAYA_OBLAST,
            self::OMSKAYA_OBLAST,
            self::ORENBURZSKAYA_OBLAST,
            self::ORLOVSKAYA_OBLAST,
            self::PENZENSKAYA_OBLAST,
            self::PERMSKY_KRAI,
            self::PSCOWSKAYA_OBLAST,
            self::ROSTOWSKAYA_OBLAST,
            self::RYAZANSKAYA_OBLAST,
            self::SAMARSKAYA_OBLAST,
            self::SARATOVSKAYA_OBLAST,
            self::SAHALINSKAYA_OBLAST,
            self::SVERDLOVSKAYA_OBLAST,
            self::SMOLENSKAYA_OBLAST,
            self::TAMBOVSKAYA_OBLAST,
            self::TVERSKAYA_OBLAST,
            self::TOMSKAYA_OBLAST,
            self::TYLSKAYA_OBLAST,
            self::TUMENSKAYA_OBLAST,
            self::ULYANOVSKAYA_OBLAST,
            self::CHELYABINSKAYA_OBLAST,
            self::ZABAYKALSKY_KRAI,
            self::YAROSLAVSKAYA_OBLAST,
            self::MOSCOW,
            self::SAINT_PETERSBURG,
            self::EVREYASKAYA_OBLAST,
            self::NENETSKII_OKRUG,
            self::HANTY_MANSIISKII_OKRUG,
            self::CHYKOTSKY_OKRUG,
            self::YAMALO_NENETSKII_OKRUG,
            self::CRIMEA_REPUBLIC,
            self::SEVASTOPOL,
            self::BAYKONUR,
        ];
    }

    /**
     * @inheritDoc
     */
    public static function getAssocList(): array
    {
        return [
            self::ADYGEA_REPUBLIC => 'Республика Адыгея',
            self::BASHKORTOSTAN_REPUBLIC => 'Республика Башкортостан',
            self::BURYATIA_REPUBLIC => 'Республика Бурятия',
            self::ALTAY_REPUBLIC => 'Республика Алтай',
            self::DAGESTAN_REPUBLIC => 'Республика Дагестан',
            self::INGUSHETIA_REPUBLIC => 'Республика Ингушетия',
            self::KABARDINO_BALKARIAN_REPUBLIC => 'Кабардино-Балкарская Республика',
            self::KALMYKIA_REPUBLIC => 'Республика Калмыкия',
            self::KARACHAY_CHERKESSKAYA_REPUBLIC => 'Карачаево-Черкесская Республика',
            self::KARELIA_REPUBLIC => 'Республика Карелия',
            self::KOMI_REPUBLIC => 'Республика Коми',
            self::MARI_EL_REPUBLIC => 'Республика Марий Эл',
            self::MORDOVIA_REPUBLIC => 'Республика Мордовия',
            self::SAHA_REPUBLIC => 'Республика Саха (Якутия)',
            self::NORTH_OSSETIA_REPUBLIC => 'Республика Северная Осетия — Алания',
            self::TATARSTAN_REPUBLIC => 'Республика Татарстан',
            self::TYVA_REPUBLIC => 'Республика Тыва',
            self::UDMURT_REPUBLIC => 'Удмуртская Республика',
            self::KHAKASSIA_REPUBLIC => 'Республика Хакасия',
            self::CHECHEN_REPUBLIC => 'Чеченская Республика',
            self::CHUVASH_REPUBLIC => 'Чувашская Республика',
            self::ALTAISKY_KRAI => 'Алтайский край',
            self::KRASNODARSKY_KRAI => 'Краснодарский край',
            self::KRASNOYARSKY_KRAI => 'Красноярский край',
            self::PRIMORSKY_KRAI => 'Приморский край',
            self::STAVROPOLSKY_KRAI => 'Ставропольский край',
            self::KHABAROVSKY_KRAI => 'Хабаровский край',
            self::AMYRSKAYA_OBLAST => 'Амурская область',
            self::ARHANGELSKAYA_OBLAST => 'Архангельская область',
            self::ASTRAKHANSKAYA_OBLAST => 'Астраханская область',
            self::BELGORODSKAYA_OBLAST => 'Белгородская область',
            self::BRYANSKAYA_OBLAST => 'Брянская область',
            self::VLADIMIRSKAYA_OBLAST => 'Владимирская область',
            self::VOLGOGRADSKAYA_OBLAST => 'Волгоградская область',
            self::VOLOGODSKAYA_OBLAST => 'Вологодская область',
            self::VORONEJSKAYA_OBLAST => 'Воронежская область',
            self::IVANOVSKAYA_OBLAST => 'Ивановская область',
            self::IRKYTSKAYA_OBLAST => 'Иркутская область',
            self::KALININGRADSKAYA_OBLAST => 'Калининградская область',
            self::KALUZSKAYA_OBLAST => 'Калужская область',
            self::KAMCHATSKY_KRAI => 'Камчатский край',
            self::KEMEROVSKAYA_OBLAST => 'Кемеровская область',
            self::KIROVSKAYA_OBLAST => 'Кировская область',
            self::KOSTROMSKAYA_OBLAST => 'Костромская область',
            self::KYRGANSKAYA_OBLAST => 'Курганская область',
            self::KYRSKAYA_OBLAST => 'Курская область',
            self::LENINGRADSKAYA_OBLAST => 'Ленинградская область',
            self::LIPETSKAYA_OBLAST => 'Липецкая область',
            self::MAGADANSKAYA_OBLAST => 'Магаданская область',
            self::MOSCOWSKAYA_OBLAST => 'Московская область',
            self::MYRMANSKAYA_OBLAST => 'Мурманская область',
            self::NIZEGORODSKAYA_OBLAST => 'Нижегородская область',
            self::NOVGORODSKAYA_OBLAST => 'Новгородская область',
            self::NOVOSIBIRSKAYA_OBLAST => 'Новосибирская область',
            self::OMSKAYA_OBLAST => 'Омская область',
            self::ORENBURZSKAYA_OBLAST => 'Оренбургская область',
            self::ORLOVSKAYA_OBLAST => 'Орловская область',
            self::PENZENSKAYA_OBLAST => 'Пензенская область',
            self::PERMSKY_KRAI => 'Пермский край',
            self::PSCOWSKAYA_OBLAST => 'Псковская область',
            self::ROSTOWSKAYA_OBLAST => 'Ростовская область',
            self::RYAZANSKAYA_OBLAST => 'Рязанская область',
            self::SAMARSKAYA_OBLAST => 'Самарская область',
            self::SARATOVSKAYA_OBLAST => 'Саратовская область',
            self::SAHALINSKAYA_OBLAST => 'Сахалинская область',
            self::SVERDLOVSKAYA_OBLAST => 'Свердловская область',
            self::SMOLENSKAYA_OBLAST => 'Смоленская область',
            self::TAMBOVSKAYA_OBLAST => 'Тамбовская область',
            self::TVERSKAYA_OBLAST => 'Тверская область',
            self::TOMSKAYA_OBLAST => 'Томская область',
            self::TYLSKAYA_OBLAST => 'Тульская область',
            self::TUMENSKAYA_OBLAST => 'Тюменская область',
            self::ULYANOVSKAYA_OBLAST => 'Ульяновская область',
            self::CHELYABINSKAYA_OBLAST => 'Челябинская область',
            self::ZABAYKALSKY_KRAI => 'Забайкальский край',
            self::YAROSLAVSKAYA_OBLAST => 'Ярославская область',
            self::MOSCOW => 'Москва',
            self::SAINT_PETERSBURG => 'Санкт-Петербург',
            self::EVREYASKAYA_OBLAST => 'Еврейская автономная область',
            self::NENETSKII_OKRUG => 'Ненецкий автономный округ',
            self::HANTY_MANSIISKII_OKRUG => 'Ханты-Мансийский автономный округ — Югра',
            self::CHYKOTSKY_OKRUG => 'Чукотский автономный округ',
            self::YAMALO_NENETSKII_OKRUG => 'Ямало-Ненецкий автономный округ',
            self::CRIMEA_REPUBLIC => 'Республика Крым',
            self::SEVASTOPOL => 'Севастополь',
            self::BAYKONUR => 'Байконур',
        ];
    }

    /**
     * @inheritDoc
     */
    public static function getList(): array
    {
        return [
            new self(self::ADYGEA_REPUBLIC),
            new self(self::BASHKORTOSTAN_REPUBLIC),
            new self(self::BURYATIA_REPUBLIC),
            new self(self::ALTAY_REPUBLIC),
            new self(self::DAGESTAN_REPUBLIC),
            new self(self::INGUSHETIA_REPUBLIC),
            new self(self::KABARDINO_BALKARIAN_REPUBLIC),
            new self(self::KALMYKIA_REPUBLIC),
            new self(self::KARACHAY_CHERKESSKAYA_REPUBLIC),
            new self(self::KARELIA_REPUBLIC),
            new self(self::KOMI_REPUBLIC),
            new self(self::MARI_EL_REPUBLIC),
            new self(self::MORDOVIA_REPUBLIC),
            new self(self::SAHA_REPUBLIC),
            new self(self::NORTH_OSSETIA_REPUBLIC),
            new self(self::TATARSTAN_REPUBLIC),
            new self(self::TYVA_REPUBLIC),
            new self(self::UDMURT_REPUBLIC),
            new self(self::KHAKASSIA_REPUBLIC),
            new self(self::CHECHEN_REPUBLIC),
            new self(self::CHUVASH_REPUBLIC),
            new self(self::ALTAISKY_KRAI),
            new self(self::KRASNODARSKY_KRAI),
            new self(self::KRASNOYARSKY_KRAI),
            new self(self::PRIMORSKY_KRAI),
            new self(self::STAVROPOLSKY_KRAI),
            new self(self::KHABAROVSKY_KRAI),
            new self(self::AMYRSKAYA_OBLAST),
            new self(self::ARHANGELSKAYA_OBLAST),
            new self(self::ASTRAKHANSKAYA_OBLAST),
            new self(self::BELGORODSKAYA_OBLAST),
            new self(self::BRYANSKAYA_OBLAST),
            new self(self::VLADIMIRSKAYA_OBLAST),
            new self(self::VOLGOGRADSKAYA_OBLAST),
            new self(self::VOLOGODSKAYA_OBLAST),
            new self(self::VORONEJSKAYA_OBLAST),
            new self(self::IVANOVSKAYA_OBLAST),
            new self(self::IRKYTSKAYA_OBLAST),
            new self(self::KALININGRADSKAYA_OBLAST),
            new self(self::KALUZSKAYA_OBLAST),
            new self(self::KAMCHATSKY_KRAI),
            new self(self::KEMEROVSKAYA_OBLAST),
            new self(self::KIROVSKAYA_OBLAST),
            new self(self::KOSTROMSKAYA_OBLAST),
            new self(self::KYRGANSKAYA_OBLAST),
            new self(self::KYRSKAYA_OBLAST),
            new self(self::LENINGRADSKAYA_OBLAST),
            new self(self::LIPETSKAYA_OBLAST),
            new self(self::MAGADANSKAYA_OBLAST),
            new self(self::MOSCOWSKAYA_OBLAST),
            new self(self::MYRMANSKAYA_OBLAST),
            new self(self::NIZEGORODSKAYA_OBLAST),
            new self(self::NOVGORODSKAYA_OBLAST),
            new self(self::NOVOSIBIRSKAYA_OBLAST),
            new self(self::OMSKAYA_OBLAST),
            new self(self::ORENBURZSKAYA_OBLAST),
            new self(self::ORLOVSKAYA_OBLAST),
            new self(self::PENZENSKAYA_OBLAST),
            new self(self::PERMSKY_KRAI),
            new self(self::PSCOWSKAYA_OBLAST),
            new self(self::ROSTOWSKAYA_OBLAST),
            new self(self::RYAZANSKAYA_OBLAST),
            new self(self::SAMARSKAYA_OBLAST),
            new self(self::SARATOVSKAYA_OBLAST),
            new self(self::SAHALINSKAYA_OBLAST),
            new self(self::SVERDLOVSKAYA_OBLAST),
            new self(self::SMOLENSKAYA_OBLAST),
            new self(self::TAMBOVSKAYA_OBLAST),
            new self(self::TVERSKAYA_OBLAST),
            new self(self::TOMSKAYA_OBLAST),
            new self(self::TYLSKAYA_OBLAST),
            new self(self::TUMENSKAYA_OBLAST),
            new self(self::ULYANOVSKAYA_OBLAST),
            new self(self::CHELYABINSKAYA_OBLAST),
            new self(self::ZABAYKALSKY_KRAI),
            new self(self::YAROSLAVSKAYA_OBLAST),
            new self(self::MOSCOW),
            new self(self::SAINT_PETERSBURG),
            new self(self::EVREYASKAYA_OBLAST),
            new self(self::NENETSKII_OKRUG),
            new self(self::HANTY_MANSIISKII_OKRUG),
            new self(self::CHYKOTSKY_OKRUG),
            new self(self::YAMALO_NENETSKII_OKRUG),
            new self(self::CRIMEA_REPUBLIC),
            new self(self::SEVASTOPOL),
            new self(self::BAYKONUR),
        ];
    }

    /**
     * Сравнение объектов кода субъекта региона
     * @param CodeOfSubject $codeOfSubject
     * @return bool
     */
    public function isEqual(CodeOfSubject $codeOfSubject): bool
    {
        return $this->getCode() === $codeOfSubject->getCode();
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->code;
    }

    /**
     * @inheritDoc
     */
    public function rawValue(): string
    {
        return $this->__toString();
    }

    /**
     * @inheritDoc
     */
    public function rawType(): int
    {
        return PDO::PARAM_STR;
    }
}
