<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';
    protected $guarded = ['id'];

    public function details()
    {
        return $this->hasMany(DetailTransaksi::class, 'transaksi_id', 'id');
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }

    public function status()
    {
        if ($this->status == 0) {
            return '<span class="badge badge-warning">Menunggu Proses</span>';
        } elseif ($this->status == 1) {
            return '<span class="badge badge-info">Diproses</span>';
        } elseif ($this->status == 2) {
            return '<span class="badge badge-success">Selesai</span>';
        } else {
            return '<span class="badge badge-danger">Batal</span>';
        }
    }

    public static function getKodeBaru()
    {
        $latestKode = self::latest('id')->value('kode');
        if (!$latestKode) {
            return 'INV001';
        }
        $lastNumber = intval(substr($latestKode, 3));
        $newNumber = $lastNumber + 1;
        $newKode = 'INV' . str_pad($newNumber, 3, '0', STR_PAD_LEFT);

        return $newKode;
    }
}
