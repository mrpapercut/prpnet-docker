export enum ABCFormatTypes {
    CULLEN = 'cullen',
    WOODALL = 'woodall',
    GFN = 'gfn',
    XYYX = 'xyyx',
    CYCLOTOMIC = 'cyclotomic',
    CAROLKYNEA = 'carolkynea',
    WAGSTAFF = 'wagstaff',
    SIERPINSKYRIESEL = 'sierpinskyriesel',
    FIXEDBKC = 'fixedbkc',
    FIXEDBNC = 'fixedbnc',
    FIXED_K = 'fixed_k',
    FIXED_B = 'fixed_b',
    FIXED_N = 'fixed_n',
    FIXED_KB = 'fixed_kb',
    TWIN = 'twin',
    SOPHIEGERMAIN = 'sophiegermain',
    GENERIC = 'generic',
    FACTORIAL = 'factorial',
    MULTIFACTORIAL = 'multifactorial',
    PRIMORIAL = 'primorial',
}

export const HeaderFormats = {
    CULLEN: [
        /\$a\*\d+\^\$a([\+\-])\d+/,
        /\$a\*\d+\^\$a\$[a-z]/,
        /\$a\*\$b\^\$a([\+\-])\d+/,
        /\$a\*\$b\^\$a\$c/
    ],
    WOODALL: [
        /\$a\*\d+\^\$a([\+\-])\d+/,
        /\$a\*\d+\^\$a\$[a-z]/,
        /\$a\*\$b\^\$a([\+\-])\d/,
        /\$a\*\$b\^\$a\$c/
    ],
    GFN: [/^\$a\^\$b\+1/],
    XYYX: [
        /\$a\^\$b\+\$b\^\$a/,
        /\$a\^\$b\-\$b\^\$a/
    ],
    CYCLOTOMIC: [
        /Phi\(\$a,\$b\)/,
        /Phi\(\$a,\$b\^\$c\)/
    ],
    CAROLKYNEA: [/\(\d+\^\$a\$b\)\^2-2/],
    WAGSTAFF: [/\(2\^\$a\+1\)\/3/],
    FIXED_K: [
        /\d+\*\$a\^\$b([\+\-])\d+/,
        /\d+\*\$a\^\$b\$[a-z]/
    ],
    FIXED_B: [
        /\$a\*\d+\^\$b([\+\-])\d+/,
        /\$a\*\d+\^\$b\$[a-z]/
    ],
    FIXED_N: [
        /\$a\*\$b\^\d+([\+\-])\d+/,
        /\$a\*\$b\^\d+\$[a-z]/
    ],
    FIXED_KB: [
        /\d+\*\d+\^\$a([\+\-])\d+/,
        /\d+\*\d+\^\$a\$[a-z]/
    ],
    GENERIC: [
        /\$a\*\$b\^\$c([\+\-])\d+/,
        /\$a\*\$b\^\$c\$d/
    ],
    FACTORIAL: [
        /\$a!([\+\-])\d+/,
        /\$a!\$b/
    ],
    MULTIFACTORIAL: [
        /\$a!\d+\$b$/
    ],
    PRIMORIAL: [
        /\$a#([\+\-])\d+/,
        /\$a#\$b/
    ],
}

export const kbncForms = {
    CULLEN: /^(\d+)\*(\d+)\^\d+([\+\-]\d+)$/,
    FIXED_K: /^(\d+)\*(\d+)\^(\d+)([\+\-]\d+)$/,
    FIXED_B: /^(\d+)\*(\d+)\^(\d+)([\+\-]\d+)$/,
    FIXED_N: /^(\d+)\*(\d+)\^(\d+)([\+\-]\d+)$/,
    FIXED_KB: /^(\d+)\*(\d+)\^(\d+)([\+\-]\d+)$/,
    GENERIC: /^(\d+)\*(\d+)\^(\d+)([\+\-]\d+)$/,
    FACTORIAL: /^(\d+)\!([\+\-]\d+)$/,
    PRIMORIAL: /^(\d+)\#([\+\-]\d+)$/,
    MULTIFACTORIAL: /^(\d+)\!(\d+)([\+\-]\d+)$/,
    GFN: /^(\d+)\^(\d+)([\+\-]\d+)$/,
    CAROLKYNEA: /^\((\d+)\^(\d+)([\-\+]\d+)\)\^2-2$/
}
