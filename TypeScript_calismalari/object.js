var Taxi = /** @class */ (function () {
    function Taxi() {
    }
    Taxi.prototype.traverTo = function (point) {
        console.log("Taksi x: ".concat(point.x, " konumundan ").concat(point.y, " konumuna gidiyor"));
    };
    return Taxi;
}());
var Bus = /** @class */ (function () {
    function Bus() {
    }
    Bus.prototype.traverTo = function (point) {
        console.log("Otobus x: ".concat(point.x, " konumundan ").concat(point.y, " konumuna gidiyor"));
    };
    return Bus;
}());
var taxi_1 = new Taxi();
taxi_1.traverTo({ x: 1, y: 2 });
taxi_1.currentLocation = { x: 2, y: 5 };
var taxi_2 = new Taxi();
taxi_1.traverTo({ x: 2, y: 3 });
taxi_1.currentLocation = { x: 1, y: 3 };
var otobus = new Bus();
otobus.traverTo({ x: 2, y: 3 });
otobus.currentLocation = { x: 1, y: 3 };
console.log(taxi_1.currentLocation.x);
