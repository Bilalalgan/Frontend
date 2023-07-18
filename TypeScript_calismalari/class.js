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
