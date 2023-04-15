import * as ABCFormats from './@types/ABCFormats';
import calculateDecimalLength from './util/calculateDecimalLength';

class ABCFileParser {
    private _filename: string;

    private _isValidHeader = false;
    private _isValidFile = false;

    private _header: string;
    private _headerFormat: string;
    private _headerVars: Record<string, string|number>[] = [];

    private _candidates: Record<string, any> = [];

    private headerRegex = /^(\d+|\$[a-z])([\!#\+\^\*])(\d+|\$[a-z]|[\+\-]{1,2}\d+|[\+\-]\$[a-z])(\^|[\+\-]{1,2}\d+)?(\d+|\$[a-z])?(\$[a-z]|[\+\-]{1,2}\d+|[\+\-]\$[a-z])?/;
    private headerRegexCK = /^\((\d+)(\^)(\$[a-z])(\$[a-z])\)(\^2-2)/;

    public processFile(fileContents: string, filename: string) {
        // Reset potentially previous file
        this._isValidFile = false;
        this._filename = filename;

        const lines = fileContents.split(/\r\n|\n/);

        if (lines.length === 0) {
            throw new Error('Error: empty file');
        } else if (lines.length === 1) {
            throw new Error('Error: missing candidates');
        }

        this._candidates = [];

        this.validateHeader(lines[0]);
        this.parseCandidates(lines.slice(1));

        if (this.isValidHeader() && this.isValidFile()) {
            return this.returnParsedInfo();
        }
    }

    private validateHeader(header: string): void {
        // Reset potentially previous header
        this._isValidHeader = false;

        let fileType = '';
        if (header.startsWith('ABCD ')) {
            fileType = 'ABCD';

            header = header.slice(4);
        } else if (header.startsWith('ABC ')) {
            fileType = 'ABC';

            header = header.slice(4);
        }

        // Strip '// Sieved to ...'
        if (/\s\/\/\s[sS]ieved/.test(header)) {
            header = header.split(' ')[0];
        }

        for (let i in ABCFormats.HeaderFormats) {
            for (let j in ABCFormats.HeaderFormats[i]) {
                if (ABCFormats.HeaderFormats[i][j].test(header)) {
                    this._isValidHeader = true;
                    this._headerFormat = i;
                    this._header = header;

                    break;
                }
            }

            if (this._isValidHeader) {
                this.parseHeaderVars();
                break;
            }
        }
    }

    private parseHeaderVars() {
        let regexToUse = this.headerRegex;
        switch (this._headerFormat) {
            case 'CAROLKYNEA':
                regexToUse = this.headerRegexCK;
                break;
        }

        const matches = this._header.match(regexToUse);

        this._headerVars = [];

        for (let i = 1; i < matches.length; i++) {
            if (matches[i] === undefined) continue;

            if (matches[i].startsWith('$')) {
                if (!this._headerVars.find(v => v.value === matches[i])) {
                    this._headerVars.push({
                        idx: i,
                        value: matches[i],
                        type: 'variable'
                    });
                }
            } else if (['^','*','+','-','!','#'].includes(matches[i])) {
                this._headerVars.push({
                    idx: i,
                    value: matches[i],
                    type: 'operator'
                });
            } else if (!isNaN(parseInt(matches[i], 10))) {
                this._headerVars.push({
                    idx: i,
                    value: matches[i],
                    type: 'constant'
                });
            }
        }
    }

    private parseCandidates(lines: string[]) {
        for (let i = 0; i < lines.length; i++) {
            if (lines[i].length > 0) {
                this._candidates.push(this.parseCandidate(lines[i], i));
            }
        }

        this._isValidFile = true;
    }

    private parseCandidate(line: string, lineNum: number) {
        const varCount = this._headerVars.filter(v => v.type === 'variable');
        const vars = line.split(' ');

        let candidate = this._header;

        if (varCount.length !== vars.length) {
            console.error(`Line ${lineNum + 1} contains invalid number of variables`);
            return;
        }

        for (let i = 0; i < varCount.length; i++) {
            const variable = varCount[i].value;

            candidate = candidate.replaceAll(<string> variable, vars[i])
        }

        let _ = null;
        let k: string|number = 0;
        let b: string|number = 0;
        let n: string|number = 0;
        let c: string|number = 0;

        switch (this._headerFormat) {
            case 'CULLEN':
            case 'WOODALL':
                [_, n, b, c] = candidate.match(ABCFormats.kbncForms[this._headerFormat]);
                [n, b, c] = [n, b, c].map(v => parseInt(v, 10));
                break;

            case 'FIXED_K':
            case 'FIXED_B':
            case 'FIXED_N':
            case 'FIXED_KB':
            case 'GENERIC':
                [_, k, b, n, c] = candidate.match(ABCFormats.kbncForms[this._headerFormat]);
                [k, b, n, c] = [k, b, n, c].map(v => parseInt(v, 10));
                break;

            case 'FACTORIAL':
            case 'PRIMORIAL':
                [_, n, c] = candidate.match(ABCFormats.kbncForms[this._headerFormat]);
                [n, c] = [n, c].map(v => parseInt(v, 10));
                break;

            case 'MULTIFACTORIAL':
                [_, n, b, c] = candidate.match(ABCFormats.kbncForms[this._headerFormat]);
                [n, b, c] = [n, b, c].map(v => parseInt(v, 10));
                break;

            case 'GFN':
                [_, b, n, c] = candidate.match(ABCFormats.kbncForms[this._headerFormat]);
                [b, n, c] = [b, n, c].map(v => parseInt(v, 10));
                break;

            case 'CAROLKYNEA':
                [_, b, n, c] = candidate.match(ABCFormats.kbncForms[this._headerFormat]);
                [b, n, c] = [b, n, c].map(v => parseInt(v, 10));
                break;

            default:
                [k, b, n, c] = [0, 0, 0, 0];
                break;
        }

        return {
            candidateName: candidate,
            decimalLength: calculateDecimalLength(ABCFormats.ABCFormatTypes[this._headerFormat], {k, b, n}),
            k,
            b,
            n,
            c
        }
    }

    public isValidHeader(): boolean {
        return this._isValidHeader;
    }

    public isValidFile(): boolean {
        return true; // this._isValidFile;
    }

    public returnParsedInfo() {
        const allN = this._candidates.map(c => c.n);

        return {
            isValidHeader: this._isValidHeader,
            isValidFile: this._isValidFile,
            headerFormat: this._headerFormat,
            candidates: this._candidates,
            minN: Math.min(...allN),
            maxN: Math.max(...allN)
        }
    }
}

export default ABCFileParser;
