<?php
// Połączenie z bazą danych (ustaw odpowiednie dane)
session_start();
$_SESSION['zalogowany']=Auth::user()->email;
$_SESSION['id']=Auth::user()->id;
$_SESSION['nazwisko']=Auth::user()->name;
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "laravel_chatify";

$conn = new mysqli($servername, $username, $password, $dbname);

// Sprawdzenie połączenia
if ($conn->connect_error) {
    die("Błąd połączenia z bazą danych: " . $conn->connect_error);
}
#$_SESSION['id']=1;
$SESSION['wstaw']=0;
if (isset($_GET['content'])) {
    $content = urldecode($_GET['content']);

    // Wyświetl zawartość lub zapisz do bazy danych
    #echo "Zawartość pola edycyjnego: " . $content;
    #$_POST["tresc"]="jestem Filip";
    $user=$_SESSION['id'];
    // Obsługa zapisu do bazy danych po wciśnięciu przycisku

    $tresc = $content;
    date_default_timezone_set('Europe/Warsaw'); 

// Odczytaj aktualną datę i godzinę
    $currentDateTime = date('Y-m-d H:i:s');
    #echo "Aktualna data i godzina: $currentDateTime";
    #$tresc="jestem Filip";
    // Zapis do bazy danych
    $sql = "INSERT INTO opisy (tresc, id_user, data) VALUES ('$tresc', '$user' ,'$currentDateTime')";
    $conn->query($sql);
    #if ($conn->query($sql) === TRUE) {
       # echo "Pomyślnie zapisano do bazy danych.";
  #  } else {
       # echo "Błąd podczas zapisu do bazy danych: " . $conn->error;
  #  }
  unset($_GET['content']);
} else {
    #echo "Błąd: Brak zawartości pola edycyjnego.";
}
// Zamknij połączenie
//$conn->close();
?>


<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <?php echo e(__('Moja oś czasu')); ?>

        </h2>
    
     <?php $__env->endSlot(); ?>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <?php echo e(__("Email:")); ?>

                    <?php
                    #$_SESSION['zalogowany']=6;
                    $zalogowany=$_SESSION['zalogowany'];
                    ?>
                    <?php echo e($zalogowany); ?>

                </div>
            </div>
        </div>
    </div>

    <?php
                    #$_SESSION['id']=6;
                    $id=$_SESSION['id'];
                    #echo "tekst";
                    $sql = "SELECT * FROM opisy WHERE id_user=$id";
                    if($rezultat3 = @$conn->query($sql))
                    {
                    $ile_opisow = $rezultat3->num_rows;
                    #echo $ile_opisow;
                    for($i=1; $i<=$ile_opisow; $i++){
                        $opis = $rezultat3->fetch_assoc();
                        $pobranyopis=$opis['tresc'];
                        $pobranadata=$opis['data'];
                        ?>
                        <div class="py-12">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-6 text-gray-900 dark:text-gray-100">
                                <?php 
                                echo $pobranadata;
                                ?>
                                <br>
                                <?php 
                                echo $pobranyopis;
                                ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
                    }
                    }
                    ?>



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <?php echo e(__("Użytkownik")); ?>

                    <?php
                    #$_SESSION['nazwisko']=3;
                    $name=$_SESSION['nazwisko'];
                    ?>
                    <?php echo e($name); ?>

                    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zapisz do bazy danych</title>
</head>
<body>

<form id="myForm">
    <label for="content">Wprowadź treść:</label>
    <br>
    <textarea id="content" name="content" rows="10" cols="100" style="width: 1000px; height: 500px;"></textarea>
    <br>
    <button type="button" id="saveButton">Zapisz do bazy danych</button>
</form>

<script>
document.getElementById('saveButton').addEventListener('click', function() {
    var content = encodeURIComponent(document.getElementById('content').value);

    // Przekieruj użytkownika do odpowiedniego linku z zawartością pola edycyjnego w adresie URL
    window.location.href = '/dashboard?content=' + content;  // Zmień '/dashboard' na odpowiedni URL
});
</script>

</body>
</html>

                </div>
            </div>
        </div>
    </div>




 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>





<?php /**PATH H:\Programy\Xampp\htdocs\chatify-demo-master\resources\views/dashboard.blade.php ENDPATH**/ ?>