<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\UsuariosModel;
use App\Models\AlbumsModel;

class AlbumsController extends BaseController
{
    public function index()
    {
        //
    }
    public function createAlbum()
    {
        try{
            $result = new \stdClass();
            // Recupera los datos recibidos por metodo POST
            $postData = $this->request->getPost();
            // Se agrupan los datos que se recuperaron por POST
            $DatosUsuario = [
                'id' => $postData['id_usuario'],
                'd_nombre' => $postData['d_nombre_us'],
                'f_alta' => $postData['f_alta']
            ];
            $DatosAlbum = [
                'id_usuario' => $postData['id_usuario'],
                'd_nombre' => $postData['d_nombre_al'],
                'd_artista' => $postData['d_artista'],
                'd_color' => $postData['d_color'],
                'd_estado' => $postData['d_estado'],
                'f_alta' => $postData['f_alta']
            ];
            // Crear una instancia del modelo de usuario
            $usuarioModel = new UsuariosModel();
            // Busca si ya existe por id el usuario
            $usuario = $usuarioModel->where('id', $postData['id_usuario'])->findAll();
            // Guarda el nuevo usuario solo si no existe
            if (empty($usuario)) {
                $usuarioModel->insert($DatosUsuario);
            }
            // Crear una instancia del modelo de álbum
            $albumModel = new AlbumsModel();
            // Busca si ya existe por id el usuario, artista, y nombre
            $album = $albumModel->where('id_usuario', $postData['id_usuario'])
            ->where('d_nombre', $postData['d_nombre_al'])
            ->where('d_artista', $postData['d_artista'])->findAll();
            // Guarda el nuevo album solo si no existe
            if (empty($album)) {
                $albumModel->insert($DatosAlbum);
                // Guarda el estado y mensaje
                $result->state = 'OK';
                $result->message = 'Album creado correctamente.';
            }else{
                // Guarda el estado y mensaje
                $result->state = 'NOOK';
                $result->message = 'El álbum ya existe para este usuario. Por favor, intenta cargar otro álbum.';
            }
            // Devuelve el estado y el mensaje
            return $this->response->setJSON(json_encode($result))->setStatusCode(200);
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            return $this->response->setJSON(['state' => 'NOOK', 'message' => 'Error en la base de datos, '.$e->getMessage()])->setStatusCode(500);
        } catch (\Exception $e) {
            return $this->response->setJSON(['state' => 'NOOK', 'message' => 'Ocurrió un error, '.$e->getMessage()])->setStatusCode(500);
        }
    }
    public function buscarAlbums()
    {
        try{
            $result = new \stdClass();
            // Recupera el id del usuario recibido por metodo POST
            $id_usuario = $this->request->getPost('id_usuario');
            // Crear una instancia del modelo de álbum
            $AlbumsModel = new AlbumsModel();

            // Filtra los álbumes por id_usuario
            $albums = $AlbumsModel->select('id, d_nombre, d_artista, d_color')
                                    ->where('id_usuario', $id_usuario)
                                    ->where('d_estado', 'Aprobado')
                                    ->findAll();
            // Guarda el estado y los datos
            $result->state = 'OK';
            $result->datos = array();
            $result->datos = $albums;
            // Devuelve el estado y los álbumes encontrados como datos
            return $this->response->setJSON(json_encode($result))->setStatusCode(200);
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            return $this->response->setJSON(['state' => 'NOOK', 'message' => 'Error en la base de datos, '.$e->getMessage()])->setStatusCode(500);
        } catch (\Exception $e) {
            return $this->response->setJSON(['state' => 'NOOK', 'message' => 'Ocurrió un error, '.$e->getMessage()])->setStatusCode(500);
        }
    }
}
