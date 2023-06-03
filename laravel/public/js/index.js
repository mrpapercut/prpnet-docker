/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/ts/ABCFileParser/@types/ABCFormats.ts":
/*!*********************************************************!*\
  !*** ./resources/ts/ABCFileParser/@types/ABCFormats.ts ***!
  \*********************************************************/
/***/ ((__unused_webpack_module, exports) => {



Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports.kbncForms = exports.HeaderFormats = exports.ABCFormatTypes = void 0;
var ABCFormatTypes;
(function (ABCFormatTypes) {
  ABCFormatTypes["CULLEN"] = "cullen";
  ABCFormatTypes["WOODALL"] = "woodall";
  ABCFormatTypes["GFN"] = "gfn";
  ABCFormatTypes["XYYX"] = "xyyx";
  ABCFormatTypes["CYCLOTOMIC"] = "cyclotomic";
  ABCFormatTypes["CAROLKYNEA"] = "carolkynea";
  ABCFormatTypes["WAGSTAFF"] = "wagstaff";
  ABCFormatTypes["SIERPINSKYRIESEL"] = "sierpinskyriesel";
  ABCFormatTypes["FIXEDBKC"] = "fixedbkc";
  ABCFormatTypes["FIXEDBNC"] = "fixedbnc";
  ABCFormatTypes["FIXED_K"] = "fixed_k";
  ABCFormatTypes["FIXED_B"] = "fixed_b";
  ABCFormatTypes["FIXED_N"] = "fixed_n";
  ABCFormatTypes["FIXED_KB"] = "fixed_kb";
  ABCFormatTypes["TWIN"] = "twin";
  ABCFormatTypes["SOPHIEGERMAIN"] = "sophiegermain";
  ABCFormatTypes["GENERIC"] = "generic";
  ABCFormatTypes["FACTORIAL"] = "factorial";
  ABCFormatTypes["MULTIFACTORIAL"] = "multifactorial";
  ABCFormatTypes["PRIMORIAL"] = "primorial";
})(ABCFormatTypes = exports.ABCFormatTypes || (exports.ABCFormatTypes = {}));
exports.HeaderFormats = {
  CULLEN: [/\$a\*\d+\^\$a([\+\-])\d+/, /\$a\*\d+\^\$a\$[a-z]/, /\$a\*\$b\^\$a([\+\-])\d+/, /\$a\*\$b\^\$a\$c/],
  WOODALL: [/\$a\*\d+\^\$a([\+\-])\d+/, /\$a\*\d+\^\$a\$[a-z]/, /\$a\*\$b\^\$a([\+\-])\d/, /\$a\*\$b\^\$a\$c/],
  GFN: [/^\$a\^\$b\+1/],
  XYYX: [/\$a\^\$b\+\$b\^\$a/, /\$a\^\$b\-\$b\^\$a/],
  CYCLOTOMIC: [/Phi\(\$a,\$b\)/, /Phi\(\$a,\$b\^\$c\)/],
  CAROLKYNEA: [/\(\d+\^\$a\$b\)\^2-2/],
  WAGSTAFF: [/\(2\^\$a\+1\)\/3/],
  FIXED_K: [/\d+\*\$a\^\$b([\+\-])\d+/, /\d+\*\$a\^\$b\$[a-z]/],
  FIXED_B: [/\$a\*\d+\^\$b([\+\-])\d+/, /\$a\*\d+\^\$b\$[a-z]/],
  FIXED_N: [/\$a\*\$b\^\d+([\+\-])\d+/, /\$a\*\$b\^\d+\$[a-z]/],
  FIXED_KB: [/\d+\*\d+\^\$a([\+\-])\d+/, /\d+\*\d+\^\$a\$[a-z]/],
  GENERIC: [/\$a\*\$b\^\$c([\+\-])\d+/, /\$a\*\$b\^\$c\$d/],
  FACTORIAL: [/\$a!([\+\-])\d+/, /\$a!\$b/],
  MULTIFACTORIAL: [/\$a!\d+\$b$/],
  PRIMORIAL: [/\$a#([\+\-])\d+/, /\$a#\$b/]
};
exports.kbncForms = {
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
};

/***/ }),

/***/ "./resources/ts/ABCFileParser/ABCFileParser.ts":
/*!*****************************************************!*\
  !*** ./resources/ts/ABCFileParser/ABCFileParser.ts ***!
  \*****************************************************/
/***/ (function(__unused_webpack_module, exports, __webpack_require__) {



function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }
function _toConsumableArray(arr) { return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _unsupportedIterableToArray(arr) || _nonIterableSpread(); }
function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }
function _iterableToArray(iter) { if (typeof Symbol !== "undefined" && iter[Symbol.iterator] != null || iter["@@iterator"] != null) return Array.from(iter); }
function _arrayWithoutHoles(arr) { if (Array.isArray(arr)) return _arrayLikeToArray(arr); }
function _slicedToArray(arr, i) { return _arrayWithHoles(arr) || _iterableToArrayLimit(arr, i) || _unsupportedIterableToArray(arr, i) || _nonIterableRest(); }
function _nonIterableRest() { throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }
function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }
function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) arr2[i] = arr[i]; return arr2; }
function _iterableToArrayLimit(arr, i) { var _i = null == arr ? null : "undefined" != typeof Symbol && arr[Symbol.iterator] || arr["@@iterator"]; if (null != _i) { var _s, _e, _x, _r, _arr = [], _n = !0, _d = !1; try { if (_x = (_i = _i.call(arr)).next, 0 === i) { if (Object(_i) !== _i) return; _n = !1; } else for (; !(_n = (_s = _x.call(_i)).done) && (_arr.push(_s.value), _arr.length !== i); _n = !0); } catch (err) { _d = !0, _e = err; } finally { try { if (!_n && null != _i["return"] && (_r = _i["return"](), Object(_r) !== _r)) return; } finally { if (_d) throw _e; } } return _arr; } }
function _arrayWithHoles(arr) { if (Array.isArray(arr)) return arr; }
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }
function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, _toPropertyKey(descriptor.key), descriptor); } }
function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, "prototype", { writable: false }); return Constructor; }
function _toPropertyKey(arg) { var key = _toPrimitive(arg, "string"); return _typeof(key) === "symbol" ? key : String(key); }
function _toPrimitive(input, hint) { if (_typeof(input) !== "object" || input === null) return input; var prim = input[Symbol.toPrimitive]; if (prim !== undefined) { var res = prim.call(input, hint || "default"); if (_typeof(res) !== "object") return res; throw new TypeError("@@toPrimitive must return a primitive value."); } return (hint === "string" ? String : Number)(input); }
var __createBinding = this && this.__createBinding || (Object.create ? function (o, m, k, k2) {
  if (k2 === undefined) k2 = k;
  var desc = Object.getOwnPropertyDescriptor(m, k);
  if (!desc || ("get" in desc ? !m.__esModule : desc.writable || desc.configurable)) {
    desc = {
      enumerable: true,
      get: function get() {
        return m[k];
      }
    };
  }
  Object.defineProperty(o, k2, desc);
} : function (o, m, k, k2) {
  if (k2 === undefined) k2 = k;
  o[k2] = m[k];
});
var __setModuleDefault = this && this.__setModuleDefault || (Object.create ? function (o, v) {
  Object.defineProperty(o, "default", {
    enumerable: true,
    value: v
  });
} : function (o, v) {
  o["default"] = v;
});
var __importStar = this && this.__importStar || function (mod) {
  if (mod && mod.__esModule) return mod;
  var result = {};
  if (mod != null) for (var k in mod) if (k !== "default" && Object.prototype.hasOwnProperty.call(mod, k)) __createBinding(result, mod, k);
  __setModuleDefault(result, mod);
  return result;
};
var __importDefault = this && this.__importDefault || function (mod) {
  return mod && mod.__esModule ? mod : {
    "default": mod
  };
};
Object.defineProperty(exports, "__esModule", ({
  value: true
}));
var ABCFormats = __importStar(__webpack_require__(/*! ./@types/ABCFormats */ "./resources/ts/ABCFileParser/@types/ABCFormats.ts"));
var calculateDecimalLength_1 = __importDefault(__webpack_require__(/*! ./util/calculateDecimalLength */ "./resources/ts/ABCFileParser/util/calculateDecimalLength.ts"));
var ABCFileParser = /*#__PURE__*/function () {
  function ABCFileParser() {
    _classCallCheck(this, ABCFileParser);
    this._isValidHeader = false;
    this._isValidFile = false;
    this._headerVars = [];
    this._candidates = [];
    this.headerRegex = /^(\d+|\$[a-z])([\!#\+\^\*])(\d+|\$[a-z]|[\+\-]{1,2}\d+|[\+\-]\$[a-z])(\^|[\+\-]{1,2}\d+)?(\d+|\$[a-z])?(\$[a-z]|[\+\-]{1,2}\d+|[\+\-]\$[a-z])?/;
    this.headerRegexCK = /^\((\d+)(\^)(\$[a-z])(\$[a-z])\)(\^2-2)/;
  }
  _createClass(ABCFileParser, [{
    key: "processFile",
    value: function processFile(fileContents, filename) {
      // Reset potentially previous file
      this._isValidFile = false;
      this._filename = filename;
      var lines = fileContents.split(/\r\n|\n/);
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
  }, {
    key: "validateHeader",
    value: function validateHeader(header) {
      // Reset potentially previous header
      this._isValidHeader = false;
      var fileType = '';
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
      for (var i in ABCFormats.HeaderFormats) {
        for (var j in ABCFormats.HeaderFormats[i]) {
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
  }, {
    key: "parseHeaderVars",
    value: function parseHeaderVars() {
      var _this = this;
      var regexToUse = this.headerRegex;
      switch (this._headerFormat) {
        case 'CAROLKYNEA':
          regexToUse = this.headerRegexCK;
          break;
      }
      var matches = this._header.match(regexToUse);
      this._headerVars = [];
      var _loop = function _loop(i) {
        if (matches[i] === undefined) return "continue";
        if (matches[i].startsWith('$')) {
          if (!_this._headerVars.find(function (v) {
            return v.value === matches[i];
          })) {
            _this._headerVars.push({
              idx: i,
              value: matches[i],
              type: 'variable'
            });
          }
        } else if (['^', '*', '+', '-', '!', '#'].includes(matches[i])) {
          _this._headerVars.push({
            idx: i,
            value: matches[i],
            type: 'operator'
          });
        } else if (!isNaN(parseInt(matches[i], 10))) {
          _this._headerVars.push({
            idx: i,
            value: matches[i],
            type: 'constant'
          });
        }
      };
      for (var i = 1; i < matches.length; i++) {
        var _ret = _loop(i);
        if (_ret === "continue") continue;
      }
    }
  }, {
    key: "parseCandidates",
    value: function parseCandidates(lines) {
      for (var i = 0; i < lines.length; i++) {
        if (lines[i].length > 0) {
          this._candidates.push(this.parseCandidate(lines[i], i));
        }
      }
      this._isValidFile = true;
    }
  }, {
    key: "parseCandidate",
    value: function parseCandidate(line, lineNum) {
      var varCount = this._headerVars.filter(function (v) {
        return v.type === 'variable';
      });
      var vars = line.split(' ');
      var candidate = this._header;
      if (varCount.length !== vars.length) {
        console.error("Line ".concat(lineNum + 1, " contains invalid number of variables"));
        return;
      }
      for (var i = 0; i < varCount.length; i++) {
        var variable = varCount[i].value;
        candidate = candidate.replaceAll(variable, vars[i]);
      }
      var _ = null;
      var k = 0;
      var b = 0;
      var n = 0;
      var c = 0;
      switch (this._headerFormat) {
        case 'CULLEN':
        case 'WOODALL':
          var _candidate$match = candidate.match(ABCFormats.kbncForms[this._headerFormat]);
          var _candidate$match2 = _slicedToArray(_candidate$match, 4);
          _ = _candidate$match2[0];
          n = _candidate$match2[1];
          b = _candidate$match2[2];
          c = _candidate$match2[3];
          var _map = [n, b, c].map(function (v) {
            return parseInt(v, 10);
          });
          var _map2 = _slicedToArray(_map, 3);
          n = _map2[0];
          b = _map2[1];
          c = _map2[2];
          break;
        case 'FIXED_K':
        case 'FIXED_B':
        case 'FIXED_N':
        case 'FIXED_KB':
        case 'GENERIC':
          var _candidate$match3 = candidate.match(ABCFormats.kbncForms[this._headerFormat]);
          var _candidate$match4 = _slicedToArray(_candidate$match3, 5);
          _ = _candidate$match4[0];
          k = _candidate$match4[1];
          b = _candidate$match4[2];
          n = _candidate$match4[3];
          c = _candidate$match4[4];
          var _map3 = [k, b, n, c].map(function (v) {
            return parseInt(v, 10);
          });
          var _map4 = _slicedToArray(_map3, 4);
          k = _map4[0];
          b = _map4[1];
          n = _map4[2];
          c = _map4[3];
          break;
        case 'FACTORIAL':
        case 'PRIMORIAL':
          var _candidate$match5 = candidate.match(ABCFormats.kbncForms[this._headerFormat]);
          var _candidate$match6 = _slicedToArray(_candidate$match5, 3);
          _ = _candidate$match6[0];
          n = _candidate$match6[1];
          c = _candidate$match6[2];
          var _map5 = [n, c].map(function (v) {
            return parseInt(v, 10);
          });
          var _map6 = _slicedToArray(_map5, 2);
          n = _map6[0];
          c = _map6[1];
          break;
        case 'MULTIFACTORIAL':
          var _candidate$match7 = candidate.match(ABCFormats.kbncForms[this._headerFormat]);
          var _candidate$match8 = _slicedToArray(_candidate$match7, 4);
          _ = _candidate$match8[0];
          n = _candidate$match8[1];
          b = _candidate$match8[2];
          c = _candidate$match8[3];
          var _map7 = [n, b, c].map(function (v) {
            return parseInt(v, 10);
          });
          var _map8 = _slicedToArray(_map7, 3);
          n = _map8[0];
          b = _map8[1];
          c = _map8[2];
          break;
        case 'GFN':
          var _candidate$match9 = candidate.match(ABCFormats.kbncForms[this._headerFormat]);
          var _candidate$match10 = _slicedToArray(_candidate$match9, 4);
          _ = _candidate$match10[0];
          b = _candidate$match10[1];
          n = _candidate$match10[2];
          c = _candidate$match10[3];
          var _map9 = [b, n, c].map(function (v) {
            return parseInt(v, 10);
          });
          var _map10 = _slicedToArray(_map9, 3);
          b = _map10[0];
          n = _map10[1];
          c = _map10[2];
          break;
        case 'CAROLKYNEA':
          var _candidate$match11 = candidate.match(ABCFormats.kbncForms[this._headerFormat]);
          var _candidate$match12 = _slicedToArray(_candidate$match11, 4);
          _ = _candidate$match12[0];
          b = _candidate$match12[1];
          n = _candidate$match12[2];
          c = _candidate$match12[3];
          var _map11 = [b, n, c].map(function (v) {
            return parseInt(v, 10);
          });
          var _map12 = _slicedToArray(_map11, 3);
          b = _map12[0];
          n = _map12[1];
          c = _map12[2];
          break;
        default:
          k = 0;
          b = 0;
          n = 0;
          c = 0;
          break;
      }
      return {
        candidateName: candidate,
        decimalLength: (0, calculateDecimalLength_1["default"])(ABCFormats.ABCFormatTypes[this._headerFormat], {
          k: k,
          b: b,
          n: n
        }),
        k: k,
        b: b,
        n: n,
        c: c
      };
    }
  }, {
    key: "isValidHeader",
    value: function isValidHeader() {
      return this._isValidHeader;
    }
  }, {
    key: "isValidFile",
    value: function isValidFile() {
      return true; // this._isValidFile;
    }
  }, {
    key: "returnParsedInfo",
    value: function returnParsedInfo() {
      var allN = this._candidates.map(function (c) {
        return c.n;
      });
      return {
        isValidHeader: this._isValidHeader,
        isValidFile: this._isValidFile,
        headerFormat: this._headerFormat,
        candidates: this._candidates,
        minN: Math.min.apply(Math, _toConsumableArray(allN)),
        maxN: Math.max.apply(Math, _toConsumableArray(allN))
      };
    }
  }]);
  return ABCFileParser;
}();
exports["default"] = ABCFileParser;

/***/ }),

/***/ "./resources/ts/ABCFileParser/util/calculateDecimalLength.ts":
/*!*******************************************************************!*\
  !*** ./resources/ts/ABCFileParser/util/calculateDecimalLength.ts ***!
  \*******************************************************************/
/***/ (function(__unused_webpack_module, exports, __webpack_require__) {



var __createBinding = this && this.__createBinding || (Object.create ? function (o, m, k, k2) {
  if (k2 === undefined) k2 = k;
  var desc = Object.getOwnPropertyDescriptor(m, k);
  if (!desc || ("get" in desc ? !m.__esModule : desc.writable || desc.configurable)) {
    desc = {
      enumerable: true,
      get: function get() {
        return m[k];
      }
    };
  }
  Object.defineProperty(o, k2, desc);
} : function (o, m, k, k2) {
  if (k2 === undefined) k2 = k;
  o[k2] = m[k];
});
var __setModuleDefault = this && this.__setModuleDefault || (Object.create ? function (o, v) {
  Object.defineProperty(o, "default", {
    enumerable: true,
    value: v
  });
} : function (o, v) {
  o["default"] = v;
});
var __importStar = this && this.__importStar || function (mod) {
  if (mod && mod.__esModule) return mod;
  var result = {};
  if (mod != null) for (var k in mod) if (k !== "default" && Object.prototype.hasOwnProperty.call(mod, k)) __createBinding(result, mod, k);
  __setModuleDefault(result, mod);
  return result;
};
Object.defineProperty(exports, "__esModule", ({
  value: true
}));
var ABCFormats = __importStar(__webpack_require__(/*! ../@types/ABCFormats */ "./resources/ts/ABCFileParser/@types/ABCFormats.ts"));
var calculateDecimalLength = function calculateDecimalLength(type, _ref) {
  var _ref$k = _ref.k,
    k = _ref$k === void 0 ? 0 : _ref$k,
    _ref$b = _ref.b,
    b = _ref$b === void 0 ? 0 : _ref$b,
    _ref$n = _ref.n,
    n = _ref$n === void 0 ? 0 : _ref$n;
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
};
exports["default"] = calculateDecimalLength;

/***/ }),

/***/ "./resources/ts/index.ts":
/*!*******************************!*\
  !*** ./resources/ts/index.ts ***!
  \*******************************/
/***/ (function(__unused_webpack_module, exports, __webpack_require__) {



var __importDefault = this && this.__importDefault || function (mod) {
  return mod && mod.__esModule ? mod : {
    "default": mod
  };
};
Object.defineProperty(exports, "__esModule", ({
  value: true
}));
var ABCFileParser_1 = __importDefault(__webpack_require__(/*! ./ABCFileParser/ABCFileParser */ "./resources/ts/ABCFileParser/ABCFileParser.ts"));
window.ABCFileParser = ABCFileParser_1["default"];

/***/ }),

/***/ "./resources/scss/app.scss":
/*!*********************************!*\
  !*** ./resources/scss/app.scss ***!
  \*********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/js/index": 0,
/******/ 			"css/app": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunk"] = self["webpackChunk"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["css/app"], () => (__webpack_require__("./resources/ts/index.ts")))
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["css/app"], () => (__webpack_require__("./resources/scss/app.scss")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;