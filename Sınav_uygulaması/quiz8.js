const quiz = new Quiz(sorular);
const ui = new UI();

ui.btn_start.addEventListener("click", function(){
    ui.quiz_box.classList.add("active");
    startTimer(10);
    startTimeLine();
    ui.sorugoster(quiz.sorugetir());
    ui.btn_next.classList.remove("show");
    ui.sorusayısınıgoster(quiz.soruindex + 1 , quiz.soru.length);
});

ui.btn_next.addEventListener("click", function(){
    if (quiz.soru.length !== quiz.soruindex + 1){
        quiz.soruindex += 1;
        clearInterval(counter);
        clearInterval(counterLine);
        startTimer(10);
        startTimeLine();
        ui.sorugoster(quiz.sorugetir());
        ui.sorusayısınıgoster(quiz.soruindex + 1,quiz.soru.length);
        ui.btn_next.classList.remove("show");

    } else {
        clearInterval(counter);
        clearInterval(counterLine);
        ui.quiz_box.classList.remove("active");
        ui.score_box.classList.add("active");
        ui.skorgoster(quiz.soru.length,quiz.dogrucevap);
    }
});

ui.btn_quit.addEventListener("click", function() {
    window.location.reload();
});

ui.btn_replay.addEventListener("click", function() {
    quiz.soruindex = 0;
    quiz.dogrucevap = 0;
    ui.btn_start.click();
    ui.score_box.classList.remove("active")
});




function optionseçildi(option){
    clearInterval(counter);
    clearInterval(counterLine);
    let cevap = option.querySelector("span b").textContent;
    let soru = quiz.sorugetir();

    if (soru.cevapkontrol(cevap)){
        quiz.dogrucevap += 1
        option.classList.add("correct");
        option.insertAdjacentHTML("beforeend",ui.dogruicon);
    }else{
        option.classList.add("incorrect");
        option.insertAdjacentHTML("beforeend",ui.yanlısicon);
    }

    for (let i=0; i<ui.options_list.children.length; i++){
        ui.options_list.children[i].classList.add("disabled");
    }
    ui.btn_next.classList.add("show");
}

let counter;
function startTimer(time){
    counter = setInterval(timer,1000);

    function timer(){
        ui.time_second.textContent = time;
        time--;

        if (time < 0){
            clearInterval(counter);
            ui.time_text.textContent = "Süre Bitti";
            let cevap = quiz.sorugetir().dogrucevap;
            for (let option of ui.options_list.children){
                if (option.querySelector("span b").textContent == cevap){
                    option.classList.add("correct");
                    option.insertAdjacentHTML("beforeend", ui.dogruicon);
                }
                option.classList.add("disabled");
            }
            ui.btn_next.classList.add("show");
        }
    }
}

let counterLine;
function startTimeLine(){
    let line_width = 0;

    counterLine = setInterval(timer, 100);

    function timer(){
        line_width += 5;
        ui.time_line.style.width = line_width + "px";

        if(line_width > 546){
            clearInterval(counterLine);
        }
    }
}
