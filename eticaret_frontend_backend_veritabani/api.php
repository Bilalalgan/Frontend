<?php
include "database.php";
session_start();


function return_data($status, $message)
{
    $data = array("status_code" => $status, "response" => $message);
    header("Content-Type: application/json");
    echo json_encode($data);
}

function islogged($as=NULL){
    $ret = FALSE;
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == TRUE) {
        if ($as != NULL && $as != $_SESSION['user_info']['isim']) {
            $ret = FALSE;
        } else {
            $ret = TRUE;
        }
    } 
    return $ret;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['islem'])) { return_data(400, "'islem' not set");die(); }
    $islem = $_POST["islem"];
    if ($islem == "fetch_products") {

        
        $stmt = $conn->prepare("SELECT * FROM urunler INNER JOIN urun_detay ON urunler.urun_id=urun_detay.id");
        $stmt->execute();

        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();

        return_data(200, $result);

    } else if ($islem == "fetch_product_by_id") {

        
        $stmt = $conn->prepare("SELECT * FROM urunler INNER JOIN urun_detay ON urunler.urun_id=urun_detay.id WHERE urunler.urun_id=:id");
        $stmt->execute(array(
            "id" => intval($_POST['urun_id'])
        ));

        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetch();

        return_data(200, $result);

    } else if ($islem == "add_product") {
        if (!islogged('admin')) { return_data(401, "Yetkisiz");die();}
        $product_type = $_POST["product_type"];
        $product_name = $_POST["product_name"];
        $product_data = $_POST["product_data"];
        $data = [
            'urun_isim' => $product_name,
            'urun_tip' => $product_type
        ];

        $stmt= $conn->prepare("INSERT INTO urunler (urun_isim, urun_tipi) VALUES (:urun_isim, :urun_tip)");
        $stmt->execute($data);
        $id = $conn->lastInsertId();

        $stmt= $conn->prepare("INSERT INTO urun_detay (id, urun_data) VALUES (:id, :urun_data)");
        $stmt->execute(array(
            "urun_data" => $product_data,
            "id" => intval($id)
        ));
        if ($id) {
            
            $product_data = str_replace('\\', '\\\\', $product_data);
            $dosyalar = json_decode($product_data);
            
            if ($dosyalar === null) {
                switch (json_last_error()) {
                    case JSON_ERROR_DEPTH:
                        return_data(500, "Maximum stack depth exceeded");
                        break;
                    case JSON_ERROR_STATE_MISMATCH:
                        return_data(500, "Underflow or the modes mismatch");
                        break;
                    case JSON_ERROR_CTRL_CHAR:
                        return_data(500, "Unexpected control character found");
                        break;
                    case JSON_ERROR_SYNTAX:
                        return_data(500, "Syntax error, malformed JSON");
                        break;
                    case JSON_ERROR_UTF8:
                        return_data(500, "Malformed UTF-8 characters, possibly incorrectly encoded");
                        
                        break;
                    default:
                        return_data(500, "Unknown error");
                        echo 'Unknown error';
                        break;
                }
            }
            
            
            
            return_data(200, $id);
        } else {
            return_data(500, "Something went wrong");
        }

    } else if ($islem == "update_product") {
        if (!islogged('admin')) { return_data(401, "Yetkisiz");die();}
        $product_type = $_POST["product_type"];
        $product_name = $_POST["product_name"];
        $product_data = $_POST["product_data"];
        $product_id = $_POST["product_id"];
        
        $data = [
            'urun_isim' => $product_name,
            'urun_tip' => $product_type,
            'id' => intval($product_id)
        ];

        $stmt= $conn->prepare("UPDATE urunler SET urun_isim=:urun_isim, urun_tipi=:urun_tip WHERE urun_id=:id");
        $stmt->execute($data);
        $id = $conn->lastInsertId();

        $stmt= $conn->prepare("UPDATE urun_detay SET urun_data=:urun_data WHERE id=:id");
        $stmt->execute(array(
            "urun_data" => $product_data,
            "id" => intval($product_id)
        ));
        
            
        $product_data = str_replace('\\', '\\\\', $product_data);
        $dosyalar = json_decode($product_data);
        
        if ($dosyalar === null) {
            switch (json_last_error()) {
                case JSON_ERROR_DEPTH:
                    return_data(500, "Maximum stack depth exceeded");
                    break;
                case JSON_ERROR_STATE_MISMATCH:
                    return_data(500, "Underflow or the modes mismatch");
                    break;
                case JSON_ERROR_CTRL_CHAR:
                    return_data(500, "Unexpected control character found");
                    break;
                case JSON_ERROR_SYNTAX:
                    return_data(500, "Syntax error, malformed JSON");
                    break;
                case JSON_ERROR_UTF8:
                    return_data(500, "Malformed UTF-8 characters, possibly incorrectly encoded");
                    
                    break;
                default:
                    return_data(500, "Unknown error");
                    
                    break;
            }
        }
        
        
        
        return_data(200, $product_id);
        

    } else if ($islem == "remove_product") {
        if (!islogged('admin')) { return_data(401, "Yetkisiz");die();}
        $productId = $_POST["urun_id"];
        


        $stmt= $conn->prepare("DELETE FROM urun_detay WHERE id=:id");
        $stmt->execute(array(
            "id" => intval($productId)
        ));
        $stmt= $conn->prepare("DELETE FROM urunler WHERE urun_id=:id");
        $stmt->execute(array(
            "id" => intval($productId)
        ));
        
        return_data(200, $id);
        

    } else if ($islem == "reklam_panosu") {
        if (!islogged('admin')) { return_data(403, "Yetkisiz");die();}
        $stmt = $conn->prepare("SELECT * FROM site_ayarlari where id = 1");
        $stmt->execute();

        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        if (count($result) > 0) {
            $data = [
                'reklam' => $_POST['reklam_panosu']
            ];
    
            $stmt= $conn->prepare("UPDATE site_ayarlari SET reklam_panosu = :reklam WHERE id = 1");
            $stmt->execute($data);
            return_data(200, "Update Success");
        } else {
            $data = [
                'reklam' => $_POST['reklam_panosu']
            ];
    
            $stmt= $conn->prepare("INSERT INTO site_ayarlari (id, reklam_panosu) VALUES (1, :reklam)");
            $stmt->execute($data);
            return_data(200, "Insert Success");
        }
        
    } else if ($islem == "reklam_panosu_temizle") {
        if (!islogged('admin')) { return_data(403, "Yetkisiz");die();}
        $stmt = $conn->prepare("SELECT * FROM site_ayarlari where id = 1");
        $stmt->execute();

        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        if (count($result) > 0) {
            $data = [
                'reklam' => ""
            ];
    
            $stmt= $conn->prepare("UPDATE site_ayarlari SET reklam_panosu = :reklam WHERE id = 1");
            $stmt->execute($data);
            return_data(200, "Update Success");
        }
        
    } else if ($islem == "reklamlar") {
        
        $stmt = $conn->prepare("SELECT * FROM site_ayarlari where id = 1");
        $stmt->execute();

        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        return_data(200, $result[0]);
    } else if ($islem == "login") {
        
        $mail = $_POST['login_mail'];
        $passwd = md5($_POST['login_passwd']);
        $stmt = $conn->prepare("SELECT * FROM users where email = :mail AND passwd=:passwd");
        $stmt->execute(array(
            'mail' => $mail,
            'passwd' => $passwd
        ));

        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetch();
        if ($result == false) {
            return_data(200, "Kullanıcı ve/veya şifre yanlış");
        } else {
            $_SESSION['user_info'] = $result;
            $bytes = random_bytes(20);
            setcookie("remember_token", bin2hex($bytes), time() + (86400 * 30), "/");
            $stmt = $conn->prepare("UPDATE users SET remember_token =:token WHERE id=:id");
            $stmt->execute(array(
                'id' => $result['id'],
                'token' => bin2hex($bytes)
            ));


            // favorileri çek
            $stmt = $conn->prepare("SELECT * FROM favoriler WHERE id=:id");
            $stmt->execute(array(
                'id' => $result['id']
            ));

            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetch();
            if ($result != false) {
                $basi = json_decode($result['urunler']);
                $_SESSION['favoriler'] = $basi->urun_listesi;
            }
            
            // favorileri çek

            // sepet

            $stmt = $conn->prepare("SELECT * FROM sepetler WHERE id=:id");
            $stmt->execute(array(
                'id' => $result['id']
            ));

            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetch();
            if ($result != false) {
                $basi = json_decode($result['sepet']);
                $_SESSION['sepet'] = $basi->sepet_liste;
            }

            $stmt = $conn->prepare("SELECT * FROM siparisler WHERE id=:id");
            $stmt->execute(array(
                'id' => $result['id']
            ));

            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetch();
            if ($result != false) {
                $basi = json_decode($result['siparis']);
                $_SESSION['siparisler'] = $basi->siparis_listesi;
            }

            // sepet
            $_SESSION['loggedin'] = TRUE;
           
            
            return_data(200, "Login Success");
        }
        
    } else if ($islem == "register") {
        // admin kaydı sadece manuel olarak açılabilir
        if ($_POST['register_isim'] == 'admin' || $_POST['register_soyisim'] == 'admin') {return_data(403, "Yetkisiz Kayıt Girişimi");die();}

        $data = [
            'mail' => $_POST['register_mail'],
            'passwd' => md5($_POST['register_password']),
            'isim' => $_POST['register_isim'],
            'soyisim' => $_POST['register_soyisim'],
            'adres' => $_POST['register_adres']
        ];

        $stmt= $conn->prepare("INSERT INTO users (email, passwd, isim, soyisim, adres) VALUES (:mail, :passwd, :isim, :soyisim, :adres)");
        $stmt->execute($data);
        $user_id = $conn->lastInsertId();

        $data = [
            'urunler' => "{\"urun_listesi\":[]}",
            'id' => $user_id
        ];

        $stmt= $conn->prepare("INSERT INTO favoriler (id, urunler) VALUES (:id, :urunler)");
        $stmt->execute($data);
        

        $data = [
            'siparis' => "{\"siparis_listesi\":[]}",
            'id' => $user_id
        ];

        $stmt= $conn->prepare("INSERT INTO siparisler (id, siparis) VALUES (:id, :siparis)");
        $stmt->execute($data);


        $data = [
            'sepet' => "{\"sepet_liste\":[]}",
            'id' => $user_id
        ];

        $stmt= $conn->prepare("INSERT INTO sepetler (id, sepet) VALUES (:id, :sepet)");
        $stmt->execute($data);
        
        
        return_data(200, "Insert Success");
    } else if ($islem == 'update_acc') {
        if (!islogged()) { return_data(401, "Yetkisiz");die();}
        if ($_POST['hesap_isim'] == 'admin' || $_POST['hesap_soyisim'] == 'admin') {return_data(403, "Yetkisiz Kayıt Girişimi");die();}
        $data = [
            'mail' => $_POST['hesap_mail'],
            'passwd' => md5($_POST['sifre_input']),
            'isim' => $_POST['hesap_isim'],
            'soyisim' => $_POST['hesap_soyisim'],
            'adres' => $_POST['hesap_adres'],
            'id' => $_SESSION['user_info']['id']
        ];

        $stmt= $conn->prepare("UPDATE users SET email=:mail, passwd=:passwd, isim=:isim, soyisim=:soyisim, adres=:adres WHERE id=:id");
        $stmt->execute($data);
        return_data(200, "Update Success");
    } else if ($islem == 'favorilere_ekle') {
        if (!islogged()) { return_data(401, "Yetkisiz");die();}
        
        $stmt = $conn->prepare("SELECT * FROM favoriler WHERE id=:id");
        $stmt->execute(array(
            'id' => $_SESSION['user_info']['id']
        ));

        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetch();
        $basi = json_decode($result['urunler']);
        if (in_array(intval($_POST['urun_id']), $basi->urun_listesi)) {
            // $key = array_search(intval($_POST['urun_id']), $basi->urun_listesi);
            // unset($basi->urun_listesi[$key]);
            
            $basi->urun_listesi = array_values(array_filter($basi->urun_listesi, fn ($m) => $m != intval($_POST['urun_id'])));
            
        } else {
            array_push($basi->urun_listesi, intval($_POST['urun_id']));
        }
        
        $_SESSION['favoriler'] = $basi->urun_listesi;
        $data = [
            'uruns' => json_encode($basi),
            'id' => $_SESSION['user_info']['id']
        ];

        $stmt= $conn->prepare("UPDATE favoriler SET urunler=:uruns WHERE id=:id");
        $stmt->execute($data);
        return_data(200, "Update Success");
    } else if ($islem == 'sepete_ekle') {
        if (!islogged()) { return_data(401, "Yetkisiz");die();}
        
        $stmt = $conn->prepare("SELECT * FROM sepetler WHERE id=:id");
        $stmt->execute(array(
            'id' => $_SESSION['user_info']['id']
        ));

        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetch();
        $basi = json_decode($result['sepet']);
        if (in_array(intval($_POST['urun_id']), $basi->sepet_liste)) {
            
            $basi->sepet_liste = array_values(array_filter($basi->sepet_liste, fn ($m) => $m != intval($_POST['urun_id'])));
        } else {
            array_push($basi->sepet_liste, intval($_POST['urun_id']));
        }
        
        $_SESSION['sepet'] = $basi->sepet_liste;

        $data = [
            'uruns' => json_encode($basi),
            'id' => $_SESSION['user_info']['id']
        ];

        $stmt= $conn->prepare("UPDATE sepetler SET sepet=:uruns WHERE id=:id");
        $stmt->execute($data);
        return_data(200, "Update Success");
    } else if ($islem == 'siparis_ver') {
        if (!islogged()) { return_data(401, "Yetkisiz");die();}


        $tarih = date("d/m/Y");
        
        $stmt = $conn->prepare("SELECT * FROM siparisler WHERE id=:id");
        $stmt->execute(array(
            'id' => $_SESSION['user_info']['id']
        ));

        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetch();
        $basi = json_decode($result['siparis']);
        unset($result);


        foreach($_POST['urunler'] as $key => $value) {
            $stmt = $conn->prepare("SELECT * FROM urunler WHERE urun_id=:id");
            $stmt->execute(array(
                "id" => $key
            ));

            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetch();
            $isim = $result["urun_isim"];
            unset($result);
            $stmt = $conn->prepare("SELECT * FROM urun_detay WHERE id=:id");
            $stmt->execute(array(
                "id" => $key
            ));

            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetch();
            
            $bas = json_decode($result['urun_data']);
            
            $ardanay = array(
                "id" => $key,
                "miktar" => $value,
                "tarih" => $tarih,
                "adres" => $_SESSION['user_info']['adres'],
                "urun_fiyat" => $bas->price,
                "toplam_fiyat" => ($bas->price * $value)
            );
            array_push($basi->siparis_listesi, $ardanay);
            
            
        }
        
        $_SESSION['siparisler'] = $basi->siparis_listesi;

        $data = [
            'uruns' => json_encode($basi),
            'id' => $_SESSION['user_info']['id']
        ];

        $stmt= $conn->prepare("UPDATE siparisler SET siparis=:uruns WHERE id=:id");
        $stmt->execute($data);
        return_data(200, "Update Success");
    } else if ($islem == 'tum_siparisleri_getir') {
        if (!islogged('admin')) { return_data(401, "Yetkisiz");die();}

        $donding = [];
        
        
        $stmt = $conn->prepare("SELECT * FROM siparisler");
        $stmt->execute();

        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        foreach($result as $row) {
            $user_id = $row['id'];
            $stmt = $conn->prepare("SELECT * FROM users WHERE id=:id");
            $stmt->execute(array(
                'id' => $user_id
            ));

            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetch();
            $donding[$user_id] = [];
            $donding[$user_id]['siparisler'] = [];
            $donding[$user_id]['isim'] = $result['isim'];
            $donding[$user_id]['soyisim'] = $result['soyisim'];
            $donding[$user_id]['email'] = $result['email'];
            $donding[$user_id]['adres'] = $result['adres'];
            
            $basi = json_decode($row['siparis']);
            foreach($basi->siparis_listesi as $s) {
                $it = $s->id;
                $stmt = $conn->prepare("SELECT * FROM urunler INNER JOIN urun_detay ON urunler.urun_id=urun_detay.id WHERE urunler.urun_id=:id");
                $stmt->execute(array(
                    'id' => $it
                ));

                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $result = $stmt->fetch();
               
                $donding[$user_id]['siparisler'][$it] = [
                    's' => $s,
                    'detay' => $result
                ];
            }
            
            
            
        }
        
        
        return_data(200, $donding);
    }
} else {
    return_data(405, "405 Method Not Allowed");
}

$conn = null;

?>