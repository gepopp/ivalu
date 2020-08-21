<?php
require_once get_stylesheet_directory() . '/vendor/autoload.php';

use JMS\Serializer\Serializer;

/*
 * Template Name: WebDav
 */
?>
<html>
<head></head>
<body>
<?php

exec("find " . get_stylesheet_directory() . '/cue/' . " -type d -exec chmod 777 {} +");
delete_directory(get_stylesheet_directory() . '/cue');
mkdir(get_stylesheet_directory() . '/cue', 0777);
exec("find " . get_stylesheet_directory() . '/cue/' . " -type d -exec chmod 777 {} +");
echo '<br>';
echo '<br>';
echo '<br>';

$host = '68.183.213.58';
$user = 'sammy';
$password = '1234';
$ftpConn = ftp_connect($host);
$login = ftp_login($ftpConn, $user, $password);
// check connection
if ((!$ftpConn) || (!$login)) {
    echo 'FTP connection has failed! Attempted to connect to ' . $host . ' for user ' . $user . '.';
} else {
    echo "successfully connected to the ftp server!";

    // Logging in to established connection
    // with ftp username password
    $login = ftp_login($ftpConn, $user, $password);
    $mode = ftp_pasv($ftpConn, TRUE);

    if ($login) {

        // Checking whether logged in successfully or not
        echo "<br>logged in successfully!<br><br>";

        ftp_chdir($ftpConn, 'files');

        // Get file & directory list of current directory
        $file_list = ftp_nlist($ftpConn, ".");

        //output the array stored in $file_list using foreach loop
        foreach ($file_list as $key => $dat) {
            echo $key . "=>" . $dat . "<br>";
        }
        echo '<br>';

        echo var_dump(ftp_get($ftpConn, get_stylesheet_directory() . '/cue/' . $file_list[0], $file_list[0]));
        echo '<br>';
        echo var_dump(error_get_last());
        echo '<br>';
    }

    foreach (glob(get_stylesheet_directory() . '/cue/*') as $file) {
        $fileinfo = pathinfo($file);
        mkdir(get_stylesheet_directory() . '/cue/' . $fileinfo['filename']);
        $zip = new ZipArchive;
        $res = $zip->open($file);
        if ($res === TRUE) {
            $zip->extractTo(get_stylesheet_directory() . '/cue/' . $fileinfo['filename']);
            $zip->close();
            echo '<br>';
            echo 'woot!';
            echo '<br>';
        } else {
            echo '<br>';
            echo 'doh!';
            echo '<br>';
        }

        foreach (glob(get_stylesheet_directory() . '/cue/' . $fileinfo['filename'] . '/*') as $item) {
            $fileinfo = pathinfo($item);

            if ($fileinfo['extension'] == 'xml') {

                $xml = simplexml_load_file($item);
                $json = json_encode($xml);
                $arr = json_decode($json);


//                echo print_r($json);

//                echo '<div style="max-width:500px;">';
//                echo '<pre>';
//                echo '<code>';
//                echo print_r(get_object_vars ($arr->anbieter->immobilie->objektkategorie->nutzungsart)['@attributes']->WOHNEN);
//                echo '</code>';
//                echo '</pre>';
//                echo '</div>';

//
                $xmlString = file_get_contents($item);
                /* @var $openImmo \Ujamii\OpenImmo\API\Openimmo */
                $serializer = \JMS\Serializer\SerializerBuilder::create()->build();


                $openImmo = $serializer->deserialize($xmlString, \Ujamii\OpenImmo\API\Openimmo::class, 'xml');

                /* @var $anbieter \Ujamii\OpenImmo\API\Anbieter */
                foreach ($openImmo->getAnbieter() as $anbieter) {
                    /* @var $immobilie \Ujamii\OpenImmo\API\Immobilie */
                    foreach ($anbieter->getImmobilie() as $immobilie) {
                        echo PHP_EOL . vsprintf('%s %s - %s, %s %s <br> %s <br> %s <br> <h1>%s</h1><p>%s</p>', [
                                $immobilie->getGeo()->getStrasse(),
                                $immobilie->getGeo()->getHausnummer(),
                                $immobilie->getGeo()->getWohnungsnr(),

                                $immobilie->getGeo()->getPlz(),
                                $immobilie->getGeo()->getOrt(),

                                $immobilie->getObjektkategorie()->getNutzungsart()->getWohnen(),
                                $immobilie->getPreise()->getKaufpreis()->getValue(),

                                $immobilie->getFreitexte()->getObjekttitel(),
                                $immobilie->getFreitexte()->getObjektbeschreibung(),

                            ]);



                        foreach ($immobilie->getUserDefinedAnyfield() as $item) {
                             foreach ( $item->getPlaintext() as $pt ){
                                    echo $pt->getFieldname() . ' : ' . $pt->getFieldvalue() . '<br>';
                            }
                            echo '<hr>';
                            foreach ( $item->getFlag() as $flag ){
                                echo $flag->getFieldname() . ' : ' . $flag->getFieldvalue() . '<br>';
                            }
                            echo '<hr>';
                        }

                       foreach($immobilie->getAnhaenge()->getAnhang() as $item){
                           echo var_dump( $item->getDaten()->getPfad());

                           echo '<br>';
                       }

                    }
                }

            }
        }

    }


}
ftp_close($ftpConn);


function delete_directory($dirname)
{
    if (is_dir($dirname))
        $dir_handle = opendir($dirname);
    if (!$dir_handle)
        return false;
    while ($file = readdir($dir_handle)) {
        if ($file != "." && $file != "..") {
            if (!is_dir($dirname . "/" . $file))
                unlink($dirname . "/" . $file);
            else
                delete_directory($dirname . '/' . $file);
        }
    }
    closedir($dir_handle);
    rmdir($dirname);
    return true;
}


?>
</body>
</html>


