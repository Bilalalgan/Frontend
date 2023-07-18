let a: number = 5;
let b: string = 'a';
let c: boolean = true;
let d: any;
let e: number[] = [1,2,3];
let f: Array<number> = [1,2,3];
let g: any[] = [1,'a',true];
let h: [string, number, boolean] = ['a',5,false]; //tuple

const krediBilal = 0;
const havaleBilal = 1;
const eftBilal = 2;

enum Bilal {kredi=0,havale=1,kapidaodeme=2, eft=3};

let kredi = Bilal.kredi;
let havale = Bilal.havale;
let eft = Bilal.eft;

console.log(eft);



