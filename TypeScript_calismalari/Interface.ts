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
    getDistance(PointA: Point, pointB:Point): number;
    addpasseger(passager: Passager): void;
    removepassager(passager: Passager): void;
}



let traverTo = (point: {x:number, y:number}) => {
    //...
}

let getDistance =(pointA: {x:number, y:number}, pointB: {x:number, y:number}) => {
    //..
}

traverTo({
    x:1, y:2
})


