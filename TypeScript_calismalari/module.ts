import { Taxi } from './Taxi';

let taxi_1 = new Taxi({x:2, y:5},'Red');
taxi_1.traverTo({x:1, y:2});

let currentLocation = taxi_1.Location;
taxi_1.Location = {x:6, y:2};



