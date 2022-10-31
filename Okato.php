<?php

namespace Glavfinans\Core\Passport;

use Glavfinans\Core\ValueObject\ValueObjectInterface;
use PDO;

/**
 * ValueObject ОКАТО-код региона.
 */
class Okato implements ValueObjectInterface
{
    /** @var string Республика Адыгея */
    protected const ADYGEA_REPUBLIC = '79';

    /** @var string Республика Алтай */
    protected const ALTAY_REPUBLIC = '84';

    /** @var string Республика Башкортостан */
    protected const BASHKORTOSTAN_REPUBLIC = '80';

    /** @var string Республика Бурятия */
    protected const BURYATIA_REPUBLIC = '81';

    /** @var string Республика Дагестан */
    protected const DAGESTAN_REPUBLIC = '82';

    /** @var string Республика Ингушетия */
    protected const INGUSHETIA_REPUBLIC = '26';

    /** @var string Кабардино-Балкарская Республика */
    protected const KABARDINO_BALKARIAN_REPUBLIC = '83';

    /** @var string Республика Калмыкия */
    protected const KALMYKIA_REPUBLIC = '85';

    /** @var string Карачаево-Черкесская Республика */
    protected const KARACHAY_CHERKESSKAYA_REPUBLIC = '91';

    /** @var string Республика Карелия */
    protected const KARELIA_REPUBLIC = '86';

    /** @var string Республика Коми */
    protected const KOMI_REPUBLIC = '87';

    /** @var string Республика Крым */
    protected const CRIMEA_REPUBLIC = '35';

    /** @var string Республика Марий Эл */
    protected const MARI_EL_REPUBLIC = '88';

    /** @var string Республика Мордовия */
    protected const MORDOVIA_REPUBLIC = '89';

    /** @var string Республика Саха (Якутия) */
    protected const SAHA_REPUBLIC = '98';

    /** @var string Республика Северная Осетия — Алания */
    protected const NORTH_OSSETIA_REPUBLIC = '90';

    /** @var string Республика Татарстан */
    protected const TATARSTAN_REPUBLIC = '92';

    /** @var string Республика Тыва */
    protected const TYVA_REPUBLIC = '93';

    /** @var string Удмуртская Республика */
    protected const UDMURT_REPUBLIC = '94';

    /** @var string Республика Хакасия */
    protected const KHAKASSIA_REPUBLIC = '95';

    /** @var string Чеченская Республика */
    protected const CHECHEN_REPUBLIC = '96';

    /** @var string Чувашская Республика */
    protected const CHUVASH_REPUBLIC = '97';

    /** @var string Алтайский край */
    protected const ALTAISKY_KRAI = '01';

    /** @var string Забайкальский край */
    protected const ZABAYKALSKY_KRAI = '76';

    /** @var string Камчатский край */
    protected const KAMCHATSKY_KRAI = '30';

    /** @var string Краснодарский край */
    protected const KRASNODARSKY_KRAI = '03';

    /** @var string Красноярский край */
    protected const KRASNOYARSKY_KRAI = '04';

    /** @var string Пермский край */
    protected const PERMSKY_KRAI = '57';

    /** @var string Приморский край */
    protected const PRIMORSKY_KRAI = '05';

    /** @var string Ставропольский край */
    protected const STAVROPOLSKY_KRAI = '07';

    /** @var string Хабаровский край */
    protected const KHABAROVSKY_KRAI = '08';

    /** @var string Амурская область */
    protected const AMYRSKAYA_OBLAST = '10';

    /** @var string Архангельская область */
    protected const ARHANGELSKAYA_OBLAST = '11';

    /** @var string Астраханская область */
    protected const ASTRAKHANSKAYA_OBLAST = '12';

    /** @var string Белгородская область */
    protected const BELGORODSKAYA_OBLAST = '14';

    /** @var string Брянская область */
    protected const BRYANSKAYA_OBLAST = '15';

    /** @var string Владимирская область */
    protected const VLADIMIRSKAYA_OBLAST = '17';

    /** @var string Волгоградская область */
    protected const VOLGOGRADSKAYA_OBLAST = '18';

    /** @var string Вологодская область */
    protected const VOLOGODSKAYA_OBLAST = '19';

    /** @var string Воронежская область */
    protected const VORONEJSKAYA_OBLAST = '20';

    /** @var string Ивановская область */
    protected const IVANOVSKAYA_OBLAST = '24';

    /** @var string Иркутская область */
    protected const IRKYTSKAYA_OBLAST = '25';

    /** @var string Калининградская область */
    protected const KALININGRADSKAYA_OBLAST = '27';

    /** @var string Калужская область */
    protected const KALUZSKAYA_OBLAST = '29';

    /** @var string Кемеровская область */
    protected const KEMEROVSKAYA_OBLAST = '32';

    /** @var string Кировская область */
    protected const KIROVSKAYA_OBLAST = '33';

    /** @var string Костромская область */
    protected const KOSTROMSKAYA_OBLAST = '34';

    /** @var string Курганская область */
    protected const KYRGANSKAYA_OBLAST = '37';

    /** @var string Курская область */
    protected const KYRSKAYA_OBLAST = '38';

    /** @var string Ленинградская область */
    protected const LENINGRADSKAYA_OBLAST = '41';

    /** @var string Липецкая область */
    protected const LIPETSKAYA_OBLAST = '42';

    /** @var string Магаданская область */
    protected const MAGADANSKAYA_OBLAST = '44';

    /** @var string Московская область */
    protected const MOSCOWSKAYA_OBLAST = '46';

    /** @var string Мурманская область */
    protected const MYRMANSKAYA_OBLAST = '47';

    /** @var string Нижегородская область */
    protected const NIZEGORODSKAYA_OBLAST = '22';

    /** @var string Новгородская область */
    protected const NOVGORODSKAYA_OBLAST = '49';

    /** @var string Новосибирская область */
    protected const NOVOSIBIRSKAYA_OBLAST = '50';

    /** @var string Омская область */
    protected const OMSKAYA_OBLAST = '52';

    /** @var string Оренбургская область */
    protected const ORENBURZSKAYA_OBLAST = '53';

    /** @var string Орловская область */
    protected const ORLOVSKAYA_OBLAST = '54';

    /** @var string Пензенская область */
    protected const PENZENSKAYA_OBLAST = '56';

    /** @var string Псковская область */
    protected const PSCOWSKAYA_OBLAST = '58';

    /** @var string Ростовская область */
    protected const ROSTOWSKAYA_OBLAST = '60';

    /** @var string Рязанская область */
    protected const RYAZANSKAYA_OBLAST = '61';

    /** @var string Самарская область */
    protected const SAMARSKAYA_OBLAST = '36';

    /** @var string Саратовская область */
    protected const SARATOVSKAYA_OBLAST = '63';

    /** @var string Сахалинская область */
    protected const SAHALINSKAYA_OBLAST = '64';

    /** @var string Свердловская область */
    protected const SVERDLOVSKAYA_OBLAST = '65';

    /** @var string Смоленская область */
    protected const SMOLENSKAYA_OBLAST = '66';

    /** @var string Тамбовская область */
    protected const TAMBOVSKAYA_OBLAST = '68';

    /** @var string Тверская область */
    protected const TVERSKAYA_OBLAST = '28';

    /** @var string Томская область */
    protected const TOMSKAYA_OBLAST = '69';

    /** @var string Тульская область */
    protected const TYLSKAYA_OBLAST = '70';

    /** @var string Тюменская область */
    protected const TUMENSKAYA_OBLAST = '71';

    /** @var string Ульяновская область */
    protected const ULYANOVSKAYA_OBLAST = '73';

    /** @var string Челябинская область */
    protected const CHELYABINSKAYA_OBLAST = '75';

    /** @var string Ярославская область */
    protected const YAROSLAVSKAYA_OBLAST = '78';

    /** @var string Москва */
    protected const MOSCOW = '45';

    /** @var string Санкт-Петербург */
    protected const SAINT_PETERSBURG = '40';

    /** @var string Севастополь */
    protected const SEVASTOPOL = '67';

    /** @var string Еврейская автономная область */
    protected const EVREYASKAYA_OBLAST = '99';

    /** @var string Ненецкий автономный округ - 1 */
    protected const NENETSKII_OKRUG_1 = '111';

    /** @var string Ненецкий автономный округ - 2 */
    protected const NENETSKII_OKRUG_2 = '118';

    /** @var string Ханты-Мансийский автономный округ — Югра - 1 */
    protected const HANTY_MANSIISKII_OKRUG_1 = '71100';

    /** @var string Ханты-Мансийский автономный округ — Югра - 2 */
    protected const HANTY_MANSIISKII_OKRUG_2 = '718';

    /** @var string Чукотский автономный округ */
    protected const CHYKOTSKY_OKRUG = '77';

    /** @var string Ямало-Ненецкий автономный округ - 1 */
    protected const YAMALO_NENETSKII_OKRUG_1 = '71140';

    /** @var string Ямало-Ненецкий автономный округ - 2 */
    protected const YAMALO_NENETSKII_OKRUG_2 = '719';

    /** @var string Байконур */
    protected const BAYKONUR = '55';


    /** @var string $code - значение текущего Кода ОКАТО */
    protected string $code;


    /**
     * Запись в свойство code
     * @param string $okatoCode - ОКАТО кода региона
     */
    public function __construct(string $okatoCode)
    {
        $this->code = $okatoCode;
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
            self::ALTAY_REPUBLIC,
            self::BASHKORTOSTAN_REPUBLIC,
            self::BURYATIA_REPUBLIC,
            self::DAGESTAN_REPUBLIC,
            self::INGUSHETIA_REPUBLIC,
            self::KABARDINO_BALKARIAN_REPUBLIC,
            self::KALMYKIA_REPUBLIC,
            self::KARACHAY_CHERKESSKAYA_REPUBLIC,
            self::KARELIA_REPUBLIC,
            self::KOMI_REPUBLIC,
            self::CRIMEA_REPUBLIC,
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
            self::ZABAYKALSKY_KRAI,
            self::KAMCHATSKY_KRAI,
            self::KRASNODARSKY_KRAI,
            self::KRASNOYARSKY_KRAI,
            self::PERMSKY_KRAI,
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
            self::YAROSLAVSKAYA_OBLAST,
            self::MOSCOW,
            self::SAINT_PETERSBURG,
            self::SEVASTOPOL,
            self::EVREYASKAYA_OBLAST,
            self::NENETSKII_OKRUG_1,
            self::NENETSKII_OKRUG_2,
            self::HANTY_MANSIISKII_OKRUG_1,
            self::HANTY_MANSIISKII_OKRUG_2,
            self::CHYKOTSKY_OKRUG,
            self::YAMALO_NENETSKII_OKRUG_1,
            self::YAMALO_NENETSKII_OKRUG_2,
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
            self::ALTAY_REPUBLIC => 'Республика Алтай',
            self::BASHKORTOSTAN_REPUBLIC => 'Республика Башкортостан',
            self::BURYATIA_REPUBLIC => 'Республика Бурятия',
            self::DAGESTAN_REPUBLIC => 'Республика Дагестан',
            self::INGUSHETIA_REPUBLIC => 'Республика Ингушетия',
            self::KABARDINO_BALKARIAN_REPUBLIC => 'Кабардино-Балкарская Республика',
            self::KALMYKIA_REPUBLIC => 'Республика Калмыкия',
            self::KARACHAY_CHERKESSKAYA_REPUBLIC => 'Карачаево-Черкесская Республика',
            self::KARELIA_REPUBLIC => 'Республика Карелия',
            self::KOMI_REPUBLIC => 'Республика Коми',
            self::CRIMEA_REPUBLIC => 'Республика Крым',
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
            self::ZABAYKALSKY_KRAI => 'Забайкальский край',
            self::KAMCHATSKY_KRAI => 'Камчатский край',
            self::KRASNODARSKY_KRAI => 'Краснодарский край',
            self::KRASNOYARSKY_KRAI => 'Красноярский край',
            self::PERMSKY_KRAI => 'Пермский край',
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
            self::YAROSLAVSKAYA_OBLAST => 'Ярославская область',
            self::MOSCOW => 'Москва',
            self::SAINT_PETERSBURG => 'Санкт-Петербург',
            self::SEVASTOPOL => 'Севастополь',
            self::EVREYASKAYA_OBLAST => 'Еврейская автономная область',
            self::NENETSKII_OKRUG_1 => 'Ненецкий автономный округ',
            self::NENETSKII_OKRUG_2 => 'Ненецкий автономный округ',
            self::HANTY_MANSIISKII_OKRUG_1 => 'Ханты-Мансийский автономный округ — Югра',
            self::HANTY_MANSIISKII_OKRUG_2 => 'Ханты-Мансийский автономный округ — Югра',
            self::CHYKOTSKY_OKRUG => 'Чукотский автономный округ',
            self::YAMALO_NENETSKII_OKRUG_1 => 'Ямало-Ненецкий автономный округ',
            self::YAMALO_NENETSKII_OKRUG_2 => 'Ямало-Ненецкий автономный округ',
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
            new self(self::ALTAY_REPUBLIC),
            new self(self::BASHKORTOSTAN_REPUBLIC),
            new self(self::BURYATIA_REPUBLIC),
            new self(self::DAGESTAN_REPUBLIC),
            new self(self::INGUSHETIA_REPUBLIC),
            new self(self::KABARDINO_BALKARIAN_REPUBLIC),
            new self(self::KALMYKIA_REPUBLIC),
            new self(self::KARACHAY_CHERKESSKAYA_REPUBLIC),
            new self(self::KARELIA_REPUBLIC),
            new self(self::KOMI_REPUBLIC),
            new self(self::CRIMEA_REPUBLIC),
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
            new self(self::ZABAYKALSKY_KRAI),
            new self(self::KAMCHATSKY_KRAI),
            new self(self::KRASNODARSKY_KRAI),
            new self(self::KRASNOYARSKY_KRAI),
            new self(self::PERMSKY_KRAI),
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
            new self(self::YAROSLAVSKAYA_OBLAST),
            new self(self::MOSCOW),
            new self(self::SAINT_PETERSBURG),
            new self(self::SEVASTOPOL),
            new self(self::EVREYASKAYA_OBLAST),
            new self(self::NENETSKII_OKRUG_1),
            new self(self::NENETSKII_OKRUG_2),
            new self(self::HANTY_MANSIISKII_OKRUG_1),
            new self(self::HANTY_MANSIISKII_OKRUG_2),
            new self(self::CHYKOTSKY_OKRUG),
            new self(self::YAMALO_NENETSKII_OKRUG_1),
            new self(self::YAMALO_NENETSKII_OKRUG_2),
            new self(self::BAYKONUR),
        ];
    }

    /**
     * Сравнение объектов Окато кода региона
     * @param Okato $okato
     * @return bool
     */
    public function isEqual(Okato $okato): bool
    {
        return $this->getCode() === $okato->getCode();
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

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->code;
    }
}
