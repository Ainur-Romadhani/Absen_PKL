<?php

namespace App;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Siswa extends Authenticatable implements JWTSubject
{
    use Notifiable, HasApiTokens;
    
    protected $table = 'siswa';

    protected $primaryKey = "id_siswa";

    protected $fillable = [
        'nis',
        'nama',
        'alamat',
        'tempat_pkl',
        'foto',
        'pembimbing_sekolah',
        'pembimbing_magang',
        'kelas',
        'jurusan',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
