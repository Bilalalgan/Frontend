interface Point {
    x: number,
    y: number
}

interface Passager {
    name: string;
    phone: string;
}

interface Vehicle {
    currentLocation: Point;
    traverTo(point: Point): void;
}

class Taxi implements Vehicle {
    currentLocation: Point;
    traverTo(point: Point): void {
        console.log(`Taksi x: ${point.x} konumundan ${point.y} konumuna gidiyor`)
    }
}

class Bus implements Vehicle {
    currentLocation: Point;
    traverTo(point: Point): void {
        console.log(`Otobus x: ${point.x} konumundan ${point.y} konumuna gidiyor`)
    }
}

let taxi_1 = new Taxi();
taxi_1.traverTo({x:1, y:2});
taxi_1.currentLocation = {x:2, y:5};

let taxi_2 = new Taxi();
taxi_1.traverTo({x:2, y:3});
taxi_1.currentLocation = {x:1, y:3};

let otobus = new Bus();
otobus.traverTo({x:2, y:3});
otobus.currentLocation = {x:1, y:3};

console.log(taxi_1.currentLocation.x);