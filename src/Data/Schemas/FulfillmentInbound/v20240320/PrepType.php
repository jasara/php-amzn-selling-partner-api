<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320;

enum PrepType: string
{
    case ItemLabeling = 'ITEM_LABELING';
    case ItemBubblewrap = 'ITEM_BUBBLEWRAP';
    case ItemPolybagging = 'ITEM_POLYBAGGING';
    case ItemTaping = 'ITEM_TAPING';
    case ItemBlackShrinkwrap = 'ITEM_BLACK_SHRINKWRAP';
    case ItemHangGarment = 'ITEM_HANG_GARMENT';
    case ItemBoxing = 'ITEM_BOXING';
    case ItemSetcreat = 'ITEM_SETCREAT';
    case ItemRmovhang = 'ITEM_RMOVHANG';
    case ItemSuffostk = 'ITEM_SUFFOSTK';
    case ItemCapSealing = 'ITEM_CAP_SEALING';
    case ItemDebundle = 'ITEM_DEBUNDLE';
    case ItemSetstk = 'ITEM_SETSTK';
    case ItemSioc = 'ITEM_SIOC';
    case ItemNoPrep = 'ITEM_NO_PREP';
    case Adult = 'ADULT';
    case Baby = 'BABY';
    case Textile = 'TEXTILE';
    case Hanger = 'HANGER';
    case Fragile = 'FRAGILE';
    case Liquid = 'LIQUID';
    case Sharp = 'SHARP';
    case Small = 'SMALL';
    case Perforated = 'PERFORATED';
    case Granular = 'GRANULAR';
    case Set = 'SET';
    case FcProvided = 'FC_PROVIDED';
    case Unknown = 'UNKNOWN';
    case None = 'NONE';
}
