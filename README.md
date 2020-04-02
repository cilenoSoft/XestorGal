# XestorGal
Proxecto DAW:
</br>
</br>
Para o despliegue do proxecto é necesario copiar o contido do repositorio na raíz web (public_html) do servidor.
</br>
É necesario que o servidor dispoña de base de datos MySQL e PHP.
</br>
Para o funcionamento da web e necesario crear a BD co script "BD_xestorgal.sql".
</br>
</br>
Encontrase dispoñible unha versión de proba publicada en "https://xestorgal.000webhostapp.com/".
</br>
Usuario: diego
</br>
Pass: cileno
</br>
</br>
Existe dispoñible unha implementación con webservice SOAP, para facer funcionar a aplicación co servizo é necesario
renomear o nome do arquivo <strong>"PHP/BDManager_SOAP.php"</strong> polo nome <strong>"PHP/BDManager.php"</strong> e habilitar SOAP no servidor no arquivo "php.ini".
</br>
</br>
Na conta gratuita do servidor 000webhostapp non permite habilitar SOAP polo que a versión funcional tratase da version sen servizo web.
</br>
</br>
Utilizase a librería de terceiros PHPMailer (https://github.com/PHPMailer/PHPMailer.git) para realizar o envío de correos.
O arquivo para a xeración do WSDL "generadorWSDL.php" é reutilizado dunha darefa do módulo  "Desarrollo Web en Contorno Servidor"

