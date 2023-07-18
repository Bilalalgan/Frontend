interface Point {
    x: number,
    y: number
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



