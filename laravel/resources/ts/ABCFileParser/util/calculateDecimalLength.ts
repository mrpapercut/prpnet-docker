import * as ABCFormats from '../@types/ABCFormats';

const calculateDecimalLength = (type: ABCFormats.ABCFormatTypes, { k = 0, b = 0, n = 0 }: Record<string, number>) => {
    switch (type) {
        case ABCFormats.ABCFormatTypes.CULLEN:
        case ABCFormats.ABCFormatTypes.WOODALL:
            return Math.floor(Math.log10(b) * n + Math.log10(n) + 1);

        case ABCFormats.ABCFormatTypes.GFN:
            if (b < n) {
                return Math.floor(Math.log10(b) * n + 1);
            } else {
                return Math.floor(Math.log10(n) * b + 1);
            }

        case ABCFormats.ABCFormatTypes.XYYX:
            return Math.floor(Math.log10(b) * n + 1);

        case ABCFormats.ABCFormatTypes.CYCLOTOMIC:
            return Math.floor(Math.log10(Math.abs(b)) * n + 1);

        case ABCFormats.ABCFormatTypes.CAROLKYNEA:
            return Math.floor(Math.log10(b) * (n * 2) + 1);

        case ABCFormats.ABCFormatTypes.WAGSTAFF:
            // Incorrect
            return Math.floor(Math.log10(2) * n + 1);

        case ABCFormats.ABCFormatTypes.SIERPINSKYRIESEL:
        case ABCFormats.ABCFormatTypes.FIXEDBKC:
        case ABCFormats.ABCFormatTypes.FIXEDBNC:
        case ABCFormats.ABCFormatTypes.FIXED_K:
        case ABCFormats.ABCFormatTypes.FIXED_B:
        case ABCFormats.ABCFormatTypes.FIXED_N:
        case ABCFormats.ABCFormatTypes.FIXED_KB:
        case ABCFormats.ABCFormatTypes.TWIN:
        case ABCFormats.ABCFormatTypes.SOPHIEGERMAIN:
            return Math.floor(Math.log10(b) * n + Math.log10(k) + 1);

        case ABCFormats.ABCFormatTypes.FACTORIAL:
            return Math.ceil(n * Math.log10(n / Math.E) + Math.log10(2 * Math.PI * n) / 2);

        case ABCFormats.ABCFormatTypes.PRIMORIAL:
            return Math.ceil(n / Math.log(10));

        case ABCFormats.ABCFormatTypes.GENERIC:
        case ABCFormats.ABCFormatTypes.MULTIFACTORIAL:
        default:
            return 0;
    }
}

export default calculateDecimalLength;
