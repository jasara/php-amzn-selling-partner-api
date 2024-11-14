<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320;

enum PrepCategory: string
{
    case Adult = 'ADULT';
    case Baby = 'BABY';
    case FcProvided = 'FC_PROVIDED';
    case Fragile = 'FRAGILE';
    case Granular = 'GRANULAR';
    case Hanger = 'HANGER';
    case Liquid = 'LIQUID';
    case Perforated = 'PERFORATED';
    case Set = 'SET';
    case Sharp = 'SHARP';
    case Small = 'SMALL';
    case Textile = 'TEXTILE';
    case Unknown = 'UNKNOWN';
    case None = 'NONE';
}
