<?php

namespace App\Classes;

class Util {

    public function CalculateDecimalLength(int $k, int $b, int $n) {
        /*
        case ST_CULLENWOODALL:
            doubleB = (double) intB;
            doubleN = (double) intN;
            return floor(log10(doubleB) * doubleN + log10(doubleN) + 1.0);

        case ST_GFN:
            if (intB < intN)
            {
            doubleB = (double) intB;
            doubleN = (double) intN;
            }
            else
            {
            doubleN = (double) intB;
            doubleB = (double) intN;
            }
            return floor(log10(doubleB) * doubleN + 1.0);

        case ST_XYYX:
            doubleB = (double) intB;
            doubleN = (double) intN;
            return floor(log10(doubleB) * doubleN + 1.0);

        case ST_CYCLOTOMIC:
            doubleB = (double) abs(intB);
            doubleN = (double) intN;
            return floor(log10(doubleB) * doubleN + 1.0);

        case ST_CAROLKYNEA:
            doubleB = (double) (intB);
            doubleN = (double) (intN * 2);
            return floor((log10(doubleB) * doubleN) / 3.0 + 1.0);

        case ST_WAGSTAFF:
            doubleB = 2.0;
            doubleN = (double) intN;
            return floor(log10(doubleB) * doubleN + 1.0);

        case ST_SIERPINSKIRIESEL:
        case ST_FIXEDBKC:
        case ST_FIXEDBNC:
        case ST_TWIN:
        case ST_SOPHIEGERMAIN:
            doubleK = (double) intK;
            doubleB = (double) intB;
            doubleN = (double) intN;
            return floor(log10(doubleB) * doubleN + log10(doubleK) + 1.0);
        */

        return floor(log10($b) * $n + log10($k) + 1);
    }
}
