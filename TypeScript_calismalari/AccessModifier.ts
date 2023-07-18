interface Point {
    x: number,
    y: number
}

interface Vehicle {
    traverTo(point: Point): void;
}

class Taxi implements Vehicle {

    constructor(private location: Point, private color?:string){    }

    traverTo(point: Point): void {
        console.log(`Taksi x: ${this.location.x} y:${this.location.y} konumundan x:${point.x} y:${point.y} konumuna gidiyor`);
    }
}

let taxi_1 = new Taxi({x:2, y:5},'Red');
taxi_1.traverTo({x:1, y:2});
