interface Point {
    x: number,
    y: number
}

interface Vehicle {
    traverTo(point: Point): void;
}

class Taxi implements Vehicle {

    constructor(private _location: Point, private color?:string){    }

    traverTo(point: Point): void {
        console.log(`Taksi x: ${this._location.x} y:${this._location.y} konumundan x:${point.x} y:${point.y} konumuna gidiyor`);
    }

    get Location(){
        return this._location;
    }

    set Location(value:Point){
        if(value.x<0 || value.y<0){
            throw new Error('Kordinat Bilgileri Negarif Girilemez.');
        }
        this._location = value;
    }
}

let taxi_1 = new Taxi({x:2, y:5},'Red');
taxi_1.traverTo({x:1, y:2});

let currentLocation = taxi_1.Location;
taxi_1.Location = {x:6, y:2};



