<?php

namespace App\Listeners;

use Aacotroneo\Saml2\Events\Saml2LoginEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use App\Models\Personal;
use App\Models\Usuario;
use App\Models\Utils;

class Saml2LoginListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Saml2LoginEvent $event): void
    {
        $saml2User = $event->getSaml2User();
        $samlAttributes = $saml2User->getAttributes();
        $userData = array(
            'username' => $saml2User->getUserId(),
            'fullname' => $samlAttributes['FullName'][0],
            'email' => $samlAttributes['Email'][0],
            'assertion' => $saml2User->getRawSamlAssertion(),
            'sessionIndex' => $saml2User->getSessionIndex(),
            'nameId' => $saml2User->getNameId()
        );

        // Verificar si el usuario ya existe y obtener el usuario
        $user = Usuario::where('usuario', $userData['username'])->first();

        // Si el usuario no existe, crea nuevo usuario
        if ($user == null) {
            $u = new Utils;
            $t = $u->getFullName($userData['fullname']);
            if (count($t) == 3) {
                $nombres = $t[0];
                $apellidos = $t[1] . ' ' . $t[2];
            }
            else if (count($t) == 4) {
                $nombres = $t[0] . ' ' . $t[1];
                $apellidos = $t[2] . ' ' . $t[3];
            }
            $persona = new Personal;
            $persona->nombres = $nombres;
            $persona->apellidos = $apellidos;            
            $persona->email = $userData['email'] == null ? null : strtolower($userData['email']);
            $persona->activo = 1;
            $persona->usuario_creador = 'UserDB_SECAD';
            $persona->fecha_creacion = \DB::raw('GETDATE()');
            $persona->save();

            if ($persona->personal_id != 0) {
                $user = new Usuario;
                $user->usuario = $userData['username'];
                $user->personal_id = $persona->personal_id;
                $user->nombre_completo = $u->getFullNameWithGrade($userData['fullname']);
                $user->email = $userData['email'] == null ? null : strtolower($userData['email']);
                $user->usuario_creador = 'UserDB_SECAD';
                $user->fecha_creacion = \DB::raw('GETDATE()');
                $user->save();
            }
        }

        session(['nameId' => $userData['nameId']]);
        session(['sessionIndex' => $userData['sessionIndex']]);        

        // login usuario
        \Auth::login($user);
    }    
}
