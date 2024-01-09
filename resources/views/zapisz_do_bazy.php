<?php
// Połączenie z bazą danych (ustaw odpowiednie dane)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "laravel_chatify";

$conn = new mysqli($servername, $username, $password, $dbname);

// Sprawdzenie połączenia
if ($conn->connect_error) {
    die("Błąd połączenia z bazą danych: " . $conn->connect_error);
}
$_SESSION['id']=1;
$SESSION['wstaw']=1;
if($SESSION['wstaw']==1){
$_POST["tresc"]="jestem Filip";
$user=$_SESSION['id'];
// Obsługa zapisu do bazy danych po wciśnięciu przycisku

    $tresc = $_POST["tresc"];
    $tresc="jestem Filip";
    // Zapis do bazy danych
    $sql = "INSERT INTO opisy (tresc, id_user) VALUES ('$tresc', '$user')";
    $conn->query($sql);
    #if ($conn->query($sql) === TRUE) {
       # echo "Pomyślnie zapisano do bazy danych.";
  #  } else {
       # echo "Błąd podczas zapisu do bazy danych: " . $conn->error;
  #  }
}

// Zamknij połączenie
$conn->close();
?>
<x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Zapisz do bazy danych') }}
                    </x-nav-link>
                    <?php
?>
