<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Penyakit;

class CertaintyFactorProvider extends ServiceProvider
{


    /**
     * Melakukan diagnosa penyakit berdasarkan Certainty Factor (CF) dari input user.
     *
     * @param array $ceraintyFactorUser Array berisi pasangan id gejala dan nilai CF dari user.
     * @return array Hasil diagnosa penyakit dengan nilai CF tertinggi.
     *
     * Proses:
     * - Mengambil semua data penyakit beserta gejalanya.
     * - Untuk setiap penyakit dan gejalanya, cek apakah gejala tersebut diinputkan oleh user.
     * - Jika ya, ambil nilai MB dan MD dari relasi pivot.
     * - Hitung CF pakar menggunakan MB dan MD.
     * - Kalikan CF pakar dengan CF user untuk mendapatkan CF akhir gejala.
     * - Gabungkan CF gejala-gejala yang sama pada penyakit yang sama.
     * - Kembalikan penyakit dengan nilai CF tertinggi.
     */
    public static function diagnosis(array $ceraintyFactorUser): array {

        $penyakitAll = Penyakit::with('gejala')->get();

        $cfPenyakit = [];

        foreach ($penyakitAll as $penyakit) {
            foreach ($penyakit->gejala as $gejala) {
                // cek apakah gejala ada pada ceraintyFactorUser
                if (isset($ceraintyFactorUser[$gejala->id])) {
                    // jika ada, ambil mb dan md dari pivot
                    $mb = $gejala->pivot->mb;
                    $md = $gejala->pivot->md;

                    // hitung cf pakar
                    $cfPakar = self::cfPakar($mb, $md);

                    // kalikan dengan cf user
                    $cf = self::cfPakarMultiplyCfUser($cfPakar, $ceraintyFactorUser[$gejala->id]);

                    // simpan hasil cf untuk penyakit
                    if (isset($cfPenyakit[$penyakit->id])) {
                        $cfPenyakit[$penyakit->id] = self::combine($cfPenyakit[$penyakit->id], $cf);
                    } else {
                        $cfPenyakit[$penyakit->id] = $cf;
                    }
                }
            }
        }

        return self::getMaxCfPenyakit($cfPenyakit);

    }

    /**
     * Dapatkan penyakit dengan nilai Certainty Factory tertinggi
     *
     * @param array $cfPenyakit
     * @return array
     */
    public static function getMaxCfPenyakit(array $cfPenyakit): array
    {
        $maxCf = max($cfPenyakit);
        $penyakitId = array_search($maxCf, $cfPenyakit);
        return [
            'id_penyakit' => $penyakitId,
            'cf' => $maxCf
        ];
    }


    /**
     * Hitung Certainty Factor Pakar
     *
     * @param float $mb
     * @param float $md
     * @return float
     */
    public static function cfPakar(float $mb, float $md): float
    {
        $cf = $mb - $md;
        return $cf;
    }

    /**
     * Kalikan Certainty Factor Pakar dengan Certainty Factor User
     *
     * @param float $cfPakar
     * @param float $cfUser
     * @return float
     */
    public static function cfPakarMultiplyCfUser(float $cfPakar, float $cfUser): float
    {
        $cf = $cfPakar * $cfUser;
        return $cf;
    }

    /**
     * Kombinasikan dua Certainty Factor
     *
     * @param float $cf1
     * @param float $cf2
     * @return float
    */
    public static function combine(float $cf1, float $cf2): float
    {
        $cf = $cf1 + $cf2 * (1 - abs($cf1));
        return $cf;
    }

}
