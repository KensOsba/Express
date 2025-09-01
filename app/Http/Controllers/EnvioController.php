<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Envio;
use Barryvdh\DomPDF\Facade\Pdf;

class EnvioController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
        // Crear/editar solo admin|cajero
        $this->middleware('role:admin|cajero')->except(['index','show']);
    }

    public function index()
    {
        $q = Envio::query()->latest();

        // Si el usuario es cliente, solo muestra sus envíos
        if (auth()->user()->hasRole('cliente')) {
            $q->where('user_id', auth()->id());
        }

        $envios = $q->paginate(15);
        return view('envios.index', compact('envios')); // ← plural
    }

    public function create()
    {
        return view('envios.create'); // ← plural
    }

    public function store(Request $r)
    {
        $data = $r->validate([
            'fecha' => ['nullable','date'],
            'nombre_remitente' => ['required','string','max:120'],
            'ine_remitente' => ['nullable','string','max:20'],
            'telefono_remitente' => ['required','string','max:20'],
            'direccion_remitente' => ['nullable','string','max:200'],
            'nombre_destinatario' => ['required','string','max:120'],
            'telefono_destinatario' => ['required','string','max:20'],
            'origen' => ['required','string','max:80'],
            'destino' => ['required','string','max:80'],
            'unidad' => ['nullable','string','max:20'],
            'hora' => ['nullable'],
            'servicio' => ['required','in:DIR,RAP,ORD'],
            'descripcion' => ['nullable','string','max:500'],
            'costo' => ['required','numeric','min:0'],
        ]);

        $data['codigo'] = strtoupper(Str::random(6));
        $data['user_id'] = auth()->id();

        $envio = Envio::create($data);

        return redirect()->route('envios.show', $envio)->with('ok','Envío registrado');
    }

    public function show(Envio $envio)
    {
        $this->authorizeView($envio);
        return view('envios.show', compact('envio')); // ← plural
    }

    protected function authorizeView(Envio $envio): void
    {
        if (auth()->user()->hasRole('cliente') && $envio->user_id !== auth()->id()) {
            abort(403);
        }
    }

    public function print(Envio $envio)
    {
        $this->authorizeView($envio);
        $pdf = Pdf::loadView('envios.comprobante', compact('envio'))->setPaper('A5'); // ← plural
        return $pdf->download("envio-{$envio->codigo}.pdf");
    }
}
