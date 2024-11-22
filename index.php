<?php

const API_URL = 'https://whenisthenextmcufilm.com/api';

# Inicializar una nueva sesion de curl;
$ch = curl_init(API_URL);

// indicar que queremos recibir el resultado de la petición  y no mostrarla en pantalla

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

/*
   Ejecutar la peteción
   y guardamos el resultado
 */
$result = curl_exec($ch);
$data = json_decode($result, true);
curl_close($ch);



?>

<head>
    <title>La Proxima pelicula de Marvel</title>
    
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css">
</head>

<main>
    <hgroup>
        <h1>Pelis Marvel</h1>
    </hgroup>

     <section>
        <img src="<?= $data["poster_url"]?>" alt="Poster de <?=$data["title"]?>">
     </section>

     <hgroup>
           <h3><?=$data["title"]?> se estrena en <?=$data["days_until"]?> días</h3>
           <p>Fecha de estreno: <?=$data["release_date"]?></p>
           <p>La siguiente pelicula es: <?=$data["following_production"]["title"]?> </p>
     </hgroup>
</main>

<style>
    section{
        display: flex;
        justify-content: center;
    }

    hgroup{
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
    }
</style>