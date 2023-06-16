<?php

namespace App\Http\Controllers\Informe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;

use App\Models\InformePlanInspeccion;

class InformeController extends Controller
{
    public function getInspeccionesPreview($id) {
        $m = new InformePlanInspeccion;

        $datos = $m->getInspecciones($id);

        $fecha_inicio_inspec = $datos[0]->fecha_inicio_inspec;
        $nombre_inspeccion = $datos[0]->nombre_inspeccion;
        $dependencia = $datos[0]->dependencia;
        $aspecto = $datos[0]->aspecto;
        $responsable = $datos[0]->responsable;
        $cargo_resp = $datos[0]->cargo_resp;
        $inspector_general = $datos[0]->inspector_general;
        $objetivo = $datos[0]->objetivo;
        $alcance = $datos[0]->alcance;
        $tipo_inspeccion_id = $datos[0]->tipo_inspeccion_id;
        $inspector_lider = $datos[0]->inspector_lider;
        $fecha_inicio = $datos[0]->fecha_inicio;
        $hora_inicio = $datos[0]->hora_inicio;
        $fecha_termino = $datos[0]->fecha_termino;
        $hora_termino = $datos[0]->hora_termino;
        $observaciones = $datos[0]->observaciones;

        $criterios_general = $m->getInspeccionCriteriosGeneral($id);
        $criterios_particular = $m->getInspeccionCriteriosParticular($id);
        $equipo_inspector = $m->getInspeccionEquipoInspector($id);
        $experto_tecnico = $m->getInspeccionExpertoTecnico($id);
        $observadores = $m->getInspeccionObservadores($id);
        $actividades = $m->getActividadesPlanInspeccion($id);

        $pdf = Pdf::loadView('informes.planinspeccion.informe',
                             compact('fecha_inicio_inspec',
                                     'nombre_inspeccion',
                                     'dependencia',
                                     'aspecto',
                                     'responsable',
                                     'cargo_resp',
                                     'inspector_general',
                                     'objetivo',
                                     'alcance',
                                     'tipo_inspeccion_id',
                                     'inspector_lider',
                                     'observadores',
                                     'fecha_inicio',
                                     'hora_inicio',
                                     'fecha_termino',
                                     'hora_termino',
                                     'criterios_general',
                                     'criterios_particular',
                                     'equipo_inspector',
                                     'experto_tecnico',
                                     'observaciones',
                                     'actividades'));

        return $pdf->stream();
    }

    public function getInspecciones($id) {
        $m = new InformePlanInspeccion;
        $uuid = Str::uuid();

        $datos = $m->getInspecciones($id);

        $fecha_inicio_inspec = $datos[0]->fecha_inicio_inspec;
        $nombre_inspeccion = $datos[0]->nombre_inspeccion;
        $dependencia = $datos[0]->dependencia;
        $aspecto = $datos[0]->aspecto;
        $responsable = $datos[0]->responsable;
        $cargo_resp = $datos[0]->cargo_resp;
        $inspector_general = $datos[0]->inspector_general;
        $objetivo = $datos[0]->objetivo;
        $alcance = $datos[0]->alcance;
        $tipo_inspeccion_id = $datos[0]->tipo_inspeccion_id;
        $inspector_lider = $datos[0]->inspector_lider;
        $fecha_inicio = $datos[0]->fecha_inicio;
        $hora_inicio = $datos[0]->hora_inicio;
        $fecha_termino = $datos[0]->fecha_termino;
        $hora_termino = $datos[0]->hora_termino;
        $observaciones = $datos[0]->observaciones;

        $criterios_general = $m->getInspeccionCriteriosGeneral($id);
        $criterios_particular = $m->getInspeccionCriteriosParticular($id);
        $equipo_inspector = $m->getInspeccionEquipoInspector($id);
        $experto_tecnico = $m->getInspeccionExpertoTecnico($id);
        $observadores = $m->getInspeccionObservadores($id);
        $actividades = $m->getActividadesPlanInspeccion($id);

        $pdf = Pdf::loadView('informes.planinspeccion.informe',
                             compact('fecha_inicio_inspec',
                                     'nombre_inspeccion',
                                     'dependencia',
                                     'aspecto',
                                     'responsable',
                                     'cargo_resp',
                                     'inspector_general',
                                     'objetivo',
                                     'alcance',
                                     'tipo_inspeccion_id',
                                     'inspector_lider',
                                     'observadores',
                                     'fecha_inicio',
                                     'hora_inicio',
                                     'fecha_termino',
                                     'hora_termino',
                                     'criterios_general',
                                     'criterios_particular',
                                     'equipo_inspector',
                                     'experto_tecnico',
                                     'observaciones',
                                     'actividades'));
                                     
        return $pdf->download($uuid . '.pdf');
    }
}
