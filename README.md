# XestorGal
Proxecto DAW

Para o despliegue do proxecto é necesario copiar o contido do repositorio na raíz web (public_html) do servidor.
É necesario que o servidor dispoña de base de datos MySQL e PHP.
Para o funcionamento da web e necesario crear a BD co script "xestorgal.sql".

Encontrase dispoñible unha versión de proba publicada en "https://xestorgal.000webhostapp.com/".
Usuario de proba:
Usuario: diego
Pass: cileno

Existe dispoñible unha implementación con webservice SOAP, para facer funcionar a aplicación co servizo é necesario
modificar o a primeira liña do arquivo PHP/BDManager.php para que apunte o servizo ( require_once '../servicio/servicio.php';).


