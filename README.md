jira-cakephp-plugin
===================

Jira Cakephp Plugin, nace de la necesidad de conectar nuestras aplicaciones con el servicio de Jira contratado, con este plugin sencillo basado en http://www.danradigan.com/2014/04/php-jiras-rest-api/ y ajustado a un Plugin de Cakephp.

How to
============

1. Descomprima el archivo en /app/Lib/
2. En su contralador use: App::uses('Jira','Jira');
3. Para usar la clase debe: 


<pre>
public function index(){
        $conn = new Jira("usuario", "p4ssw0rd", "https://mycompany.atlassian.net");
        $data = array('jql'=>'created > -1');
        $res = $conn->___get("search", $data);
        debug($res);
}
</pre>

4. Y listo tenemos la conexion a nuestro Jira, recuperando las ultimas incidencias creadas y con el alcance de nuestro usuario.

Para más informacion acerca del API de Jira referirse a : https://developer.atlassian.com/display/JIRADEV/JIRA+REST+API+Example+-+Query+issues

