function UI(){
    this.btn_start = document.querySelector(".btn-start"),
    this.btn_next = document.querySelector(".siradakisoru"),
    this.btn_replay = document.querySelector(".btn_replay"),
    this.btn_quit = document.querySelector(".btn_quit"),
    this.quiz_box = document.querySelector(".quiz_box"),
    this.score_box = document.querySelector(".score_box"),
    this.options_list = document.querySelector(".option_list"),
    this.dogruicon = '<div class="icon"><i class="fas fa-check"></i></div>',
    this.yanlısicon = '<div class="icon"><i class="fas fa-times"></i></div>',
    this.time_text = document.querySelector(".time_text"),
    this.time_second = document.querySelector(".time_second");
    this.time_line = document.querySelector(".time_line");
}

UI.prototype.sorugoster = function(sorudegisken){
    let question = `<span>${sorudegisken.sorumetni}</span> `;
    let option = ``;
    
    for (let cevap in sorudegisken.cevapsecenekleri){
        option += `
            <div class="option">
                <span><b>${cevap}</b> ${sorudegisken.cevapsecenekleri[cevap]}</span>
            </div>
        `; 
    }

    
    document.querySelector(".question_text").innerHTML = question;
    this.options_list.innerHTML = option;
    const options = this.options_list.querySelectorAll(".option") ;
    for(let opt of options){
        opt.setAttribute("onclick", "optionseçildi(this)");
    }
    
}

UI.prototype.sorusayısınıgoster = function(sorusırası,toplamsoru){
    let tag =  `
        <span class="badge bg-warning">${sorusırası} / ${toplamsoru}</span>
    `;
    document.querySelector(".quiz_box .soruindex").innerHTML = tag;
}

UI.prototype.skorgoster = function(toplamsoru,dogrucevap){
    let tag =  `Toplam ${toplamsoru} sorudan ${dogrucevap} doğru cevap verdiniz.`;
    document.querySelector(".score_box .score_text").innerHTML = tag;

};



