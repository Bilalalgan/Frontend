interface Point {
    x: number,
    y: number
}


interface Vehicle {
    currentLocation: Point;
    traverTo(point: Point): void;
}

class Taxi implements Vehicle {

    color: string;

    constructor(location: Point, color?:string){
        this.currentLocation = location;
        this.color = color;
    }

    currentLocation: Point;
    traverTo(point: Point): void {
        console.log(`Taksi x: ${point.x} konumundan ${point.y} konumuna gidiyor`)
    }
}


let taxi_1 = new Taxi({x:2, y:5},'Red');
taxi_1.traverTo({x:1, y:2});
console.log(taxi_1.currentLocation)

let taxi_2 = new Taxi({x:2, y:6});
console.log(taxi_2.currentLocation)