import { Vehicle } from "./Vehicle";
import { Point } from "./Point";

export class Taxi implements Vehicle {

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

