function readImage(inputElement) {
    var deferred = $.Deferred();
    
    var files = inputElement.get(0).files;
    if (files && files[0]) {
        
        if (Object.keys(files).length > 1) {
            var other_pictures = ""
            for (var i = 0; i < files.length; i++) {
                var fr= new FileReader();
                fr.onload = function(e) {
                    deferred.resolve(e.target.result);
                };
                
                fr.readAsDataURL( files[i] )
            
            }
            
        } else {
            var fr= new FileReader();
            fr.onload = function(e) {
                deferred.resolve(e.target.result);
            };
            fr.readAsDataURL( files[0] );
        }
        
    } else {
        deferred.resolve(undefined);
    }

    return deferred.promise();
}


function removeFileFromFileList(index, id) {
    const dt = new DataTransfer()
    const input = document.getElementById(id)
    const { files } = input
    
    for (let i = 0; i < files.length; i++) {
        const file = files[i]
        if (index !== i)
        dt.items.add(file) 
    }
    
    input.files = dt.files
}



async function get_products(){
    var resp;
    $.ajax({
    type: "POST",
    url: "api.php",
    dataType: "json",
    async: false,
    data: {
        islem: "fetch_products"
    },
    success: function(response){


        resp = response;
    }
    
    });
    return resp;
}
async function getAllSiparisler(){
    var resp;
    $.ajax({
    type: "POST",
    url: "api.php",
    dataType: "json",
    async: false,
    data: {
        islem: "tum_siparisleri_getir"
    },
    success: function(response){


        resp = response;
    }
    
    });
    return resp;
}
async function favorilere_ekle(id, url='api.php'){
    var resp;
    $.ajax({
        type: "POST",
        url: url,
        dataType: "json",
        async: false,
        data: {
            islem: "favorilere_ekle",
            urun_id: id
        },
        success: function(response){


            resp = response;
        },
        error: async function (xhr, ajaxOptions, thrownError){
            if (xhr.status == 404) {
                await favorilere_ekle(id, '../api.php')
            } else {
                console.log(xhr)
                console.log(ajaxOptions)
                console.log(thrownError)
            }
        }
    
    });
    return resp;
}

async function sepete_ekle(id, url='api.php'){
    var resp;
    $.ajax({
        type: "POST",
        url: url,
        dataType: "json",
        async: false,
        data: {
            islem: "sepete_ekle",
            urun_id: id
        },
        success: function(response){

            
            resp = response;
        },
        error: async function (xhr, ajaxOptions, thrownError){
            if (xhr.status == 404) {
                await sepete_ekle(id, '../api.php')
            } else {
                console.log(xhr)
                console.log(ajaxOptions)
                console.log(thrownError)
            }
        }
    
    });
    return resp;
}
async function get_products_search(query){
    
    var resarr = [];
    $.ajax({
    type: "POST",
    url: "api.php",
    dataType: "json",
    async: false,
    data: {
        islem: "fetch_products"
    },
    success: function(resp){


        
        resp.response.forEach(function (it) {
                    
        if (it.urun_isim.toLowerCase().includes(query.toLowerCase())) {
            resarr.push(it)
        }
        })
    }
    
    });
    var res = {status_code:200, response:resarr}
    return res;
}

async function get_products_by_type(type){
    
    var resarr = [];
    $.ajax({
    type: "POST",
    url: "api.php",
    dataType: "json",
    async: false,
    data: {
        islem: "fetch_products"
    },
    success: function(resp){


        
        resp.response.forEach(function (it) {
                    
        if (it.urun_tipi == type) {
            resarr.push(it)
        }
        })
    }
    
    });
    var res = {status_code:200, response:resarr}
    return res;
}

async function get_product_by_id(id){
    
    var reso;
    $.ajax({
    type: "POST",
    url: "api.php",
    dataType: "json",
    async: false,
    data: {
        islem: "fetch_product_by_id",
        urun_id: id
    },
    success: function(resp){


        
        reso = resp
    }
    
    });
    var res = {status_code:200, response:reso}
    return res;
}


async function get_reklamlar() {
            
    $.ajax({
    type: "POST",
    url: "api.php",
    dataType: "json",
    async: false,
    data: {
        islem: "reklamlar"
    },
    success: function(respons){
        $("#reklam_sayisi").append(`<button type="button" data-bs-target="#slider" data-bs-slide-to="0" class="active"></button>`)
        for (var i = 1; i < respons.response.reklam_panosu.split("DELIM").length; i++) {
            
            $("#reklam_sayisi").append(`<button type="button" data-bs-target="#slider" data-bs-slide-to="${i}"></button>`)
            
            
        }
        rks = respons.response.reklam_panosu.split("DELIM")
        $("#reklam_reklamlar").append(`
            <div class="carousel-item active">
                <img src="${rks[0]}" alt="" class="d-block w-100">
            </div>`)
        for (var i = 1; i < rks.length; i++) {
            
            $("#reklam_reklamlar").append(`
            <div class="carousel-item">
                <img src="${rks[i]}" alt="" class="d-block w-100">
            </div>`)
            
            
        }
        
        
    }
    
    });
    
    
    
}