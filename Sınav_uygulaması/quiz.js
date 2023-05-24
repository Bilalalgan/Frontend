function Quiz(soru){
    this.soru = soru;
    this.soruindex = 0;
    this.dogrucevap = 0;
}

Quiz.prototype.sorugetir = function(){
    return this.soru[this.soruindex];
}

