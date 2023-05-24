function Soru(sorumetni,cevapsecenekleri,dogrucevap){
    this.sorumetni = sorumetni;
    this.cevapsecenekleri = cevapsecenekleri;
    this.dogrucevap = dogrucevap;

}

Soru.prototype.cevapkontrol= function(cevap){
    return cevap === this.dogrucevap 
}

let sorular = [
    new Soru("1-) Hangisi Javascript paket yönetim uygulamasıdır ?", { A: "Node.js",B: "TypeScript",C: "Npm", D: "Nugget"},"B" ),
    new Soru("2-) Hangisi Javascript paket yönetim uygulamasıdır ?", { A: "Node.js",B: "TypeScript",C: "Npm", D: "Nugget"},"B" ),
    new Soru("3-) Hangisi Javascript paket yönetim uygulamasıdır ?", { A: "Node.js",B: "TypeScript",C: "Npm", D: "Nugget"},"B" ),
    new Soru("4-) Hangisi Javascript paket yönetim uygulamasıdır ?", { A: "Node.js",B: "TypeScript",C: "Npm", D: "Nugget"},"B" )
]


