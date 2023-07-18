var a = 5;
var b = 'a';
var c = true;
var d;
var e = [1, 2, 3];
var f = [1, 2, 3];
var g = [1, 'a', true];
var h = ['a', 5, false]; //tuple
var krediBilal = 0;
var havaleBilal = 1;
var eftBilal = 2;
var Bilal;
(function (Bilal) {
    Bilal[Bilal["kredi"] = 0] = "kredi";
    Bilal[Bilal["havale"] = 1] = "havale";
    Bilal[Bilal["kapidaodeme"] = 2] = "kapidaodeme";
    Bilal[Bilal["eft"] = 3] = "eft";
})(Bilal || (Bilal = {}));
;
var kredi = Bilal.kredi;
var havale = Bilal.havale;
var eft = Bilal.eft;
console.log(eft);
