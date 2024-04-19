<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320;

enum FreightClass: string
{
    case None = 'NONE';
    case FC50 = 'FC_50';
    case FC55 = 'FC_55';
    case FC60 = 'FC_60';
    case FC65 = 'FC_65';
    case FC70 = 'FC_70';
    case FC77_5 = 'FC_77_5';
    case FC85 = 'FC_85';
    case FC92_5 = 'FC_92_5';
    case FC100 = 'FC_100';
    case FC110 = 'FC_110';
    case FC125 = 'FC_125';
    case FC150 = 'FC_150';
    case FC175 = 'FC_175';
    case FC200 = 'FC_200';
    case FC250 = 'FC_250';
    case FC300 = 'FC_300';
    case FC400 = 'FC_400';
    case FC500 = 'FC_500';
}
