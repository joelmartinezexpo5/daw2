<?php
class ServicioCorreo {
    

    public function __construct(private InterfazProveedorCorreo $proveedor) {}

    public function enviarCorreo(string $paraQuien, string $asunto, string $cuerpoMensaje): bool {
        return $this->proveedor->enviarCorreo($paraQuien, $asunto, $cuerpoMensaje);
    }
}
