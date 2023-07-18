var Taxi = /** @class */ (function () {
    function Taxi(location, color) {
        this.currentLocation = location;
        this.color = color;
    }
    Taxi.prototype.traverTo = function (point) {
        console.log("Taksi x: ".concat(point.x, " konumundan ").concat(point.y, " konumuna gidiyor"));
    };
    return Taxi;
}());
var taxi_1 = new Taxi({ x: 2, y: 5 }, 'Red');
taxi_1.traverTo({ x: 1, y: 2 });
console.log(taxi_1.currentLocation);
var taxi_2 = new Taxi({ x: 2, y: 6 });
console.log(taxi_2.currentLocation);
