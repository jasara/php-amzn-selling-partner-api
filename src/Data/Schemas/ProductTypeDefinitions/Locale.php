<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductTypeDefinitions;

enum Locale: string
{
    case DEFAULT = 'DEFAULT';
    case Arabic = 'ar';
    case ArabicUAE = 'ar_AE';
    case German = 'de';
    case GermanGermany = 'de_DE';
    case English = 'en';
    case EnglishUAE = 'en_AE';
    case EnglishAustralia = 'en_AU';
    case EnglishCanada = 'en_CA';
    case EnglishUnitedKingdom = 'en_GB';
    case EnglishIndia = 'en_IN';
    case EnglishSingapore = 'en_SG';
    case EnglishUnitedStates = 'en_US';
    case Spanish = 'es';
    case SpanishSpain = 'es_ES';
    case SpanishMexico = 'es_MX';
    case SpanishUnitedStates = 'es_US';
    case French = 'fr';
    case FrenchCanada = 'fr_CA';
    case FrenchFrance = 'fr_FR';
    case Italian = 'it';
    case ItalianItaly = 'it_IT';
    case Japanese = 'ja';
    case JapaneseJapan = 'ja_JP';
    case Dutch = 'nl';
    case DutchNetherlands = 'nl_NL';
    case Polish = 'pl';
    case PolishPoland = 'pl_PL';
    case Portuguese = 'pt';
    case PortugueseBrazil = 'pt_BR';
    case PortuguesePortugal = 'pt_PT';
    case Swedish = 'sv';
    case SwedishSweden = 'sv_SE';
    case Turkish = 'tr';
    case TurkishTurkey = 'tr_TR';
    case Chinese = 'zh';
    case ChineseSimplified = 'zh_CN';
    case ChineseTraditional = 'zh_TW';
}
