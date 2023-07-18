var Taxi = /** @class */ (function () {
    function Taxi(location, color) {
        this.location = location;
        this.color = color;
    }
    Taxi.prototype.traverTo = function (point) {
        console.log("Taksi x: ".concat(this.location.x, " y:").concat(this.location.y, " konumundan x:").concat(point.x, " y:").concat(point.y, " konumuna gidiyor"));
    };
    return Taxi;
}());
var taxi_1 = new Taxi({ x: 2, y: 5 }, 'Red');
taxi_1.traverTo({ x: 1, y: 2 });
