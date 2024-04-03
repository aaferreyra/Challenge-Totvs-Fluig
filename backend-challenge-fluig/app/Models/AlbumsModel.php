<?php

namespace App\Models;

use CodeIgniter\Model;

class AlbumsModel extends Model
{
    protected $table = 'albums';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_usuario', 'd_nombre', 'd_artista', 'd_color', 'd_estado', 'f_alta'];
}
