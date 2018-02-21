<?php
$xml=simplexml_load_file("https://nebido.com/sitemap.xml") or die("Error: Cannot create object");
function check_url($urlo) {
   $headers = @get_headers($urlo);
   $headers = (is_array($headers)) ? implode( "\n ", $headers) : $headers;
   return (bool)preg_match('#^HTTP/.*\s+[(200|301|302)]+\s#i', $headers);
}

foreach($xml->children() as $urls) {
        echo $urls->loc . "<br>";
        if (check_url($urls->loc))
           echo "Link Works" . "<br>";
        else
           echo "Broken Link" . "<br>";
      }
  //      $urls = new array[];
?>


<!-- foreach($xml->children() as $urls) {
        echo $urls->loc . "<br>";
