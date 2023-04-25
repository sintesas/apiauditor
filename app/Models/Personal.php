<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Carbon\Carbon;

class Personal extends Model
{
    use HasFactory;

    protected $table = 'AU_Reg_Personal';

    protected $primaryKey = 'IdPersonal';

    protected $fillable = [
        'Categoria,Nombres,Apellidos,IdTipoDoc,Cedula,Lugarexpedicion,LugarNacim,FechaNacim,Edad,Email,EmailPersonal,Firma,IdEmpresa,DependeciaFacultad,IdCarreraProfesion,Escolaridad,IdCargo,Experiencia,IdNivelCompetencia,Fechaingreso,IdAreaExperiencia,IdSupervisor,FechaTermino,EstadoCivil,Celular,Fijo,Oficina,DireccionResi,Barrio,PaisResidencia,IdGrado,CodMilitar,NoFolioVida,IdFuerza,IdCuerpo,IdEspecialidad1,IdEspecialidad2,IdEspecialidadCertificacion,FechaIncorporacion,FechaAsense,IdUnidad,IdGrupo,IdTaller,IdEscuadron,Foto,Active,IdProceso'
    ];

	public $timestamps = false;

    public static function getPersonas() {
        $folderPath = public_path() . '\\secad\\Personal\\Fotos\\';

        $p = Personal::orderBy('Nombres', 'asc')
       ->leftjoin('AU_Mst_Grado', 'AU_Mst_Grado.IdGrado', '=', 'AU_Reg_Personal.IdGrado')
       ->join('users', 'users.IdPersonal', '=', 'AU_Reg_Personal.IdPersonal')
       ->select("AU_Reg_Personal.*","users.id","users.name", "users.email", "AU_Mst_Grado.Abreviatura as Grado")->get();

       $data = array();
       foreach ($p as $item) {
            $tmp = array();
            $tmp['IdPersonal'] = $item->IdPersonal;
            $tmp['Categoria'] = $item->Categoria;
            $tmp['Nombres'] = $item->Nombres;
            $tmp['Apellidos'] = $item->Apellidos;
            $tmp['IdTipoDoc'] = $item->IdTipoDoc;
            $tmp['Cedula'] = $item->Cedula;
            $tmp['Lugarexpedicion'] = $item->Lugarexpedicion;
            $tmp['LugarNacim'] = $item->LugarNacim;
            $tmp['FechaNacim'] = $item->FechaNacim;
            $tmp['Edad'] = $item->Edad;
            $tmp['Email'] = $item->Email;
            $tmp['EmailPersonal'] = $item->EmailPersonal;
            $tmp['Firma'] = $item->Firma;
            $tmp['IdEmpresa'] = $item->IdEmpresa;
            $tmp['DependeciaFacultad'] = $item->DependenciaFacultad;
            $tmp['IdCarreraProfesion'] = $item->IdCarreraProfesion;
            $tmp['Escolaridad'] = $item->Escolaridad;
            $tmp['IdCargo'] = $item->IdCargo;
            $tmp['Experiencia'] = $item->Experiencia;
            $tmp['IdNivelCompetencia'] = $item->IdNivelCompetencia;
            $tmp['Fechaingreso'] = $item->Fechaingreso;
            $tmp['IdAreaExperiencia'] = $item->IdAreaExperiencia;
            $tmp['IdSupervisor'] = $item->IdSupervisor;
            $tmp['FechaTermino'] = $item->FechaTermino;
            $tmp['EstadoCivil'] = $item->EstadoCivil;
            $tmp['Celular'] = $item->Celular;
            $tmp['Fijo'] = $item->Fijo;
            $tmp['Oficina'] = $item->Oficina;
            $tmp['DireccionResi'] = $item->DireccionResi;
            $tmp['Barrio'] = $item->Barrio;
            $tmp['PaisResidencia'] = $item->PaisResidencia;
            $tmp['IdGrado'] = $item->IdGrado;
            $tmp['CodMilitar'] = $item->CodMilitar;
            $tmp['NoFolioVida'] = $item->NoFolioVida;
            $tmp['IdFuerza'] = $item->IdFuerza;
            $tmp['IdCuerpo'] = $item->IdCuerpo;
            $tmp['IdEspecialidad1'] = $item->IdEspecialidad1;
            $tmp['IdEspecialidad2'] = $item->IdEspecialidad2;
            $tmp['IdEspecialidadCertificacion'] = $item->IdEspecialidadCertificacion;
            $tmp['FechaIncorporacion'] = $item->FechaIncorporacion;
            $tmp['FechaAsense'] = $item->FechaAsense;
            $tmp['IdUnidad'] = $item->IdUnidad;
            $tmp['IdGrupo'] = $item->IdGrupo;
            $tmp['IdTaller'] = $item->IdTaller;
            $tmp['IdEscuadron'] = $item->IdEscuadron;
            $tmp['Foto'] = $item->Foto;
            $tmp['Active'] = 1;
            $tmp['IdProceso'] = $item->IdProceso;
            $tmp['id'] = $item->id;
            $tmp['name'] = $item->name;
            $tmp['email'] = $item->email;
            $tmp['Grado'] = $item->Grado;
            $tmp['existe_img'] = file_exists($folderPath . $item->Foto) ? 1 : 0;
            array_push($data, $tmp);
       }

       return $data;
   }

    public function getPersonalWithRango() {
        return Personal::orderBy('Nombres', 'asc')
        ->leftjoin('AU_Mst_Grado', 'AU_Mst_Grado.IdGrado', '=', 'AU_Reg_Personal.IdGrado')
        ->select("AU_Reg_Personal.IdPersonal", \DB::raw("CONCAT (AU_Mst_Grado.Abreviatura, ' | ', AU_Reg_Personal.Nombres, ' ',AU_Reg_Personal.Apellidos) as Nombres"))->get();
    }

    public function crud_personales(Request $request, $evento) {
        if ($evento == 'C') {
            $persona = new Personal;
            $persona->Categoria = $request->get('categoria');
            $persona->Nombres = $request->get('nombres');
            $persona->Apellidos = $request->get('apellidos');
            $persona->IdTipoDoc = $request->get('idtipodoc');
            $persona->Cedula = $request->get('cedula');
            $persona->LugarExpedicion = $request->get('lugarexpedicion');
            $persona->LugarNacim = $request->get('lugarnacim');
            $persona->FechaNacim = $request->get('fechanacim');
            $persona->Edad = $request->get('edad');
            $persona->Email = $request->get('email');
            $persona->EmailPersonal = $request->get('emailpersonal');
            $persona->IdProceso = $request->get('idproceso');
            $persona->IdEmpresa = $request->get('idempresa');
            $persona->DependeciaFacultad = $request->get('dependeciafacultad');
            $persona->IdCarreraProfesion = $request->get('idcarreraprofesion');
            $persona->Escolaridad = $request->get('escolaridad');
            $persona->IdCargo = $request->get('idcargo');
            $persona->IdNivelCompetencia = $request->get('idnivelcompetencia');
            $persona->Experiencia = $request->get('experiencia');
            $persona->Fechaingreso = $request->get('fechaingreso');
            $persona->IdAreaExperiencia = $request->get('idareaexperiencia');
            $persona->IdSupervisor = $request->get('idsupervisor');
            $persona->Celular = $request->get('celular');
            $persona->Fijo = $request->get('fijo');
            $persona->Oficina = $request->get('oficina');
            $persona->PaisResidencia = $request->get('paisresidencia');
            $persona->FechaTermino = $request->get('fechatermino');
            $persona->EstadoCivil = $request->get('estadocivil');
            $persona->DireccionResi = $request->get('direccionresi');
            $persona->Barrio = $request->get('barrio');
            $persona->IdGrado = $request->get('idgrado');
            $persona->CodMilitar = $request->get('codigomilitar');
            $persona->NoFolioVida = $request->get('nfolio');
            $persona->IdFuerza = $request->get('idfuerza');
            $persona->IdCuerpo = $request->get('idcuerpo');
            $persona->IdEspecialidad1 = $request->get('idespecialidad1');
            $persona->IdEspecialidad2 = $request->get('idespecialidad2');
            $persona->FechaIncorporacion = $request->get('fechaincorpacion');
            $persona->FechaAsense = $request->get('fechasense');
            $persona->IdUnidad = $request->get('idunidad');
            $persona->IdGrupo = $request->get('idgrupo');
            $persona->IdTaller = $request->get('idtaller');
            $persona->IdEspecialidadCertificacion = $request->get('idespecialidadcertificacion');
            $persona->IdEscuadron = $request->get('idescuadron');
            $persona->Active = 1;

            if ($request->get('foto')) {
                $folderPath = public_path() . '/secad/Personal/Fotos';
                if (!\File::exists($folderPath)) {
                    \File::makeDirectory($folderPath, 0755, true);
                }

                $foto = $folderPath . '/' . $persona->Cedula . $request->get('tipo_imagen');
                
                if (file_exists($foto)) {
                    \File::delete($foto);
                }
        
                $image_base64 = base64_decode($request->get('foto'));
                file_put_contents($foto, $image_base64);

                $persona->Foto = $persona->Cedula . $request->get('tipo_imagen');
            }

            $persona->save();

            return $persona;
        }
        else if ($evento == 'U') {
            $persona = Personal::find($request->get('idpersonal'));
            $persona->IdPersonal = $request->get('idpersonal');
            $persona->Categoria = $request->get('categoria');
            $persona->Nombres = $request->get('nombres');
            $persona->Apellidos = $request->get('apellidos');
            $persona->IdTipoDoc = $request->get('idtipodoc');
            $persona->Cedula = $request->get('cedula');
            $persona->LugarExpedicion = $request->get('lugarexpedicion');
            $persona->LugarNacim = $request->get('lugarnacim');
            $persona->FechaNacim = $request->get('fechanacim');
            $persona->Edad = $request->get('edad');
            $persona->Email = $request->get('email');
            $persona->EmailPersonal = $request->get('emailpersonal');
            $persona->IdProceso = $request->get('idproceso');
            $persona->IdEmpresa = $request->get('idempresa');
            $persona->DependeciaFacultad = $request->get('dependeciafacultad');
            $persona->IdCarreraProfesion = $request->get('idcarreraprofesion');
            $persona->Escolaridad = $request->get('escolaridad');
            $persona->IdCargo = $request->get('idcargo');
            $persona->IdNivelCompetencia = $request->get('idnivelcompetencia');
            $persona->Experiencia = $request->get('experiencia');
            $persona->Fechaingreso = $request->get('fechaingreso');
            $persona->IdAreaExperiencia = $request->get('idareaexperiencia');
            $persona->IdSupervisor = $request->get('idsupervisor');
            $persona->Celular = $request->get('celular');
            $persona->Fijo = $request->get('fijo');
            $persona->Oficina = $request->get('oficina');
            $persona->PaisResidencia = $request->get('paisresidencia');
            $persona->FechaTermino = $request->get('fechatermino');
            $persona->EstadoCivil = $request->get('estadocivil');
            $persona->DireccionResi = $request->get('direccionresi');
            $persona->Barrio = $request->get('barrio');
            $persona->IdGrado = $request->get('idgrado');
            $persona->CodMilitar = $request->get('codigomilitar');
            $persona->NoFolioVida = $request->get('nfolio');
            $persona->IdFuerza = $request->get('idfuerza');
            $persona->IdCuerpo = $request->get('idcuerpo');
            $persona->IdEspecialidad1 = $request->get('idespecialidad1');
            $persona->IdEspecialidad2 = $request->get('idespecialidad2');
            $persona->FechaIncorporacion = $request->get('fechaincorpacion');
            $persona->FechaAsense = $request->get('fechasense');
            $persona->IdUnidad = $request->get('idunidad');
            $persona->IdGrupo = $request->get('idgrupo');
            $persona->IdTaller = $request->get('idtaller');
            $persona->IdEspecialidadCertificacion = $request->get('idespecialidadcertificacion');
            $persona->IdEscuadron = $request->get('idescuadron');
            $persona->Active = 1;

            if ($request->get('foto') != null) {
                $folderPath = public_path() . '/secad/Personal/Fotos';
                if (!\File::exists($folderPath)) {
                    \File::makeDirectory($folderPath, 0755, true);
                }

                $foto = $folderPath . '/' . $persona->Cedula . $request->get('tipo_imagen');
                
                if (file_exists($foto)) {
                    \File::delete($foto);
                }
        
                $image_base64 = base64_decode($request->get('foto'));
                file_put_contents($foto, $image_base64);

                $persona->Foto = $persona->Cedula . $request->get('tipo_imagen');
            }

            $persona->save();

            return $persona;
        }
    }
}