# XestorGal
Proxecto DAW

Para o despliegue do proxecto é necesario copiar o contido do repositorio na raíz web (public_html) do servidor.
É necesario que o servidor dispoña de base de datos MySQL e PHP.
Para o funcionamento da web e necesario crear a BD co script "xestorgal.sql".

Encontrase dispoñible unha versión de proba publicada en "https://xestorgal.000webhostapp.com/".
</br>
Usuario: diego
</br>
Pass: cileno

Existe dispoñible unha implementación con webservice SOAP, para facer funcionar a aplicación co servizo é necesario
renomear o nome do arquivo <strong>"PHP/BDManager_SOAP.php"</strong> polo nome <strong>"PHP/BDManager.php"</strong> e habilitar SOAP no servidor no arquivo "php.ini".

Na conta gratuita do servidor 000webhostapp non permite habilitar SOAP polo que a versión funcional tratase da version sen servizo web.


