//1.bölüm
// function getAverage (a:number, b:number, c:number): string {
//     const result = (a+b+c)/3
//     return 'result : ' + result ;
// }
// console.log(getAverage(10,20,30));
//2.bölüm
// function getAverage (a:number, b:number, c?:number): string {
//     let total = a+b;
//     let count = 2;
//     if (typeof c !== 'undefined'){
//         total += c;
//         count++;
//     }
//     const result = total / count;
//     return 'result : ' + result ;
// }
// console.log(getAverage(10,20));
// console.log(getAverage(10,20,30));
//3.bölüm
function getAverage() {
    var a = [];
    for (var _i = 0; _i < arguments.length; _i++) {
        a[_i] = arguments[_i];
    }
    var total = 0;
    var count = 0;
    for (var i = 0; i < a.length; i++) {
        total += a[i];
        count++;
    }
    var result = total / count;
    return 'result : ' + result;
}
console.log(getAverage(10, 20));
console.log(getAverage(10, 20, 30, 50, 70));
