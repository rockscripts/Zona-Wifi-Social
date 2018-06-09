
<h1>Zona Wifi Social</h1>
<p>
Crea Hot spots con portales cautivos para ofrecer Internet con conexión a través de redes sociales. Incluye panel de administración tanto para cliente y administrador.
</p>
<p><h4>Portal Cautivo</h4>
<img src='admin/public/screenshots/app2.png'>
</p>
<p>
<h4>Administrador</h4>
<img src='admin/public/screenshots/app1.png'>
</p>
<h1>INSTALANDO APPLICACIÓN</h1>
<p>
    Esta aplicación está basada en la web con laravel framework y debe tener un servidor web instalado en su sistema operativo como XAMPP o Lampp o un servidor en vivo contratado con alguna empresa de alojamiento web. No requiere ninguna configuración especial en el servidor.
</p>
<p>
    <ol>
        <li>
         Use un dominio para esta aplicación. Si es un servidor local, cree un dominio virtual <b> zws.com </b>. Tambien lo puede hacer con localhost:8080 localhost en donde se ejecuta el servicio.
        </li>
        <li>
          En PHPMYADMIN, crear una base de datos con su nombre e importe database.sql ubicado en el proyecto raíz.
        </li>
        <li>
          Descargue y suba los archivos de proyecto en su servidor web. Si está trabajando en local y tiene GIT instalado, solo use el comando siguiente de git: <br>
          <b>git clone https://github.com/rockscripts/Articulos-Rentables-En-MercadoLibre.git</b>
        </li>
        <li>
           Configurar la conexión de la base de datos, establecer el nombre de la base de datos, el usuario, la contraseña y el host <b>/admin/config/database.php</b> - <b>.env</b> y en <b>/portal/config/config.php</b>
        </li>
    </ol>
</p>
<p>
<b>¡Felicitaciones!</b> ya tienes la app instalada.<br>
<b>Portal Cativo:</b> para abrir el portal de prueba usa http://midominio.com/portal/login/?gw_id=F4F26DF4ADA6&gw_address=localhost&gw_port=80 <br>
<b>Administración:</b> http://midominio.com/admin/public
</p>
<b>Usuario administrador:</b> admin@gmail.com - Rock123<br>
<b>Usuario cliente:</b> client@gmail.com - Rock123<br>
</p>
<h1>PROYECTO CONTRIBUIDOR</h1>
<p>
Gracias a este proyecto se completa el portal cautivo y conecta con la app de administración.<br>
<a href='https://github.com/mhaas/fbwlan' target='_blank'>fbwlan</a><br>
<br>
Licencia: AGPL 
</p>
<h1>LICENSE</h1>
<p>
 Please read LICENSE
</p>