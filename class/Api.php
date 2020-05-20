<?php 

// Indonesia = BNPB (Badan Nasional Penanggulangan Bencana)
// Global    = JHU (Jhon Hopkins University)

class Api {

    public function nasional()
    {
        $data = [
            "provinsi" => json_decode(file_get_contents('https://services5.arcgis.com/VS6HdKS0VfIhv8Ct/arcgis/rest/services/COVID19_Indonesia_per_Provinsi/FeatureServer/0/query?where=1%3D1&outFields=Provinsi,Kasus_Posi,Kasus_Semb,Kasus_Meni&outSR=4326&f=json'), true),

            "chart" => json_decode(file_get_contents('https://services5.arcgis.com/VS6HdKS0VfIhv8Ct/arcgis/rest/services/Statistik_Perkembangan_COVID19_Indonesia/FeatureServer/0/query?where=1%3D1&outFields=Tanggal,Jumlah_Kasus_Kumulatif,Jumlah_Pasien_Sembuh&outSR=4326&f=json'), true),
        ];
        
        return $data; 
    }

    public function global()
    {
        $data = [
            "mathdro" => json_decode(file_get_contents('https://covid19.mathdro.id/api'), true),
            "global" => json_decode(file_get_contents('https://covid19.mathdro.id/api/deaths'), true),
        ];
        
        return $data;
    }

    public function peta_global()
    {
        $data = [
            "global" => json_decode(file_get_contents('https://api.kawalcorona.com/'), true),
        ];
        
        return $data;
    }

}

?>