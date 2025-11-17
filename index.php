<?php
/*
Filtry sprawdzające:
FILTER_VALIDATE_BOOLEAN
FILTER_VALIDATE_EMAIL
FILTER_VALIDATE_FLOAT
FILTER_VALIDATE_INT
FILTER_VALIDATE_IP
FILTER_VALIDATE_REGEXP
FILTER_VALIDATE_MAC
FILTER_VALIDATE_URL


czyszczące:
FILTER_SANITIZE_EMAIL
FILTER_SANITIZE_ENCODED
FILTER_SANITIZE_MAGIC_QUOTES
FILTER_SANITIZE_NUMBER_FLOAT
FILTER_SANITIZE_NUMBER_INT
FILTER_SANITIZE_SPECIAL_CHARS
FILTER_SANITIZE_FULL_SPECIAL_CHARS
FILTER_SANITIZE_STRING
FILTER_SANITIZE_STRIPPED
FILTER_SANITIZE_URL
FILTER_UNSAFE_RAW


$email ='janek.kowalski@gmail.com';
if (filter_var($email, FILTER_VALIDATE_EMAIL))
{
    echo 'Adres jest prawidlowy';
}
else
{
    echo 'Adres jest nieprawidlowy';    
}



//Wyrazenia regularne
$wyrazenie = '/^[a-z]$/';
if(preg_match($wyrazenie, $tekst))
echo("Tekst zawiera tylko male litery bez polskich znakow.");
else
    echo("Tekst zawiera dodatkowe znaki.");

Poprawność imienia:
'/^[A-ZŁŚ]{1}+[a-ząęółśżźćń]+$/';



echo $url="http://www.cosoÃ¥Ã,dedu.com";
echo '<br/>';
echo filter_var($url, FILTER_SANITIZE_URL)



$string = '<a href="adres"> Niebiezpieczny link</a> do <b>strony konkurencji</b>.';
$string_h = htmlspecialchars($string);
echo $string.'<br/>';
echo $string_h.'<br/>';



if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $blad = "zly email";
    }
        */





/*
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Walidacja adresu email z formularza
    $email = $_POST['email'];
    $blad = "";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $blad = "Zły email";
    }

    // Użycie funkcji htmlspecialchars
    $string = '<a href="adres">Niebezpieczny link</a> do <b>strony konkurencji</b>.';
    $string_h = htmlspecialchars($string);
    
    // Generowanie HTML za pomocą echo
    echo '<h1>Formularz</h1>';
    echo '<form method="POST" action="">';
    echo '    <label for="email">Adres e-mail:</label>';
    echo '    <input type="email" name="email" id="email" required>';
    echo '    <input type="submit" value="Wyślij">';
    echo '</form>';

    echo '<br/>Email: ' . htmlspecialchars($email);
    
    if ($blad) {
        echo '<p style="color: red;">' . $blad . '</p>';
    } else {
        echo '<p>Email jest poprawny!</p>';
    }

    echo '<p>Oryginalny tekst: ' . $string . '</p>';
    echo '<p>Bezpieczny tekst (po htmlspecialchars): ' . $string_h . '</p>';

    // Dodany fragment: Przykład URL i jego oczyszczanie
    echo '<br/>Oryginalny URL: ' . $url = "http://www.cosoÃ¥Ã,dedu.com";
    echo '<br/>Oczyszczony URL: ' . filter_var($url, FILTER_SANITIZE_URL);
} else {
    // Formularz wyświetlany jeśli nie został wysłany
    echo '<h1>Formularz</h1>';
    echo '<form method="POST" action="">';
    echo '    <label for="email">Adres e-mail:</label>';
    echo '    <input type="email" name="email" id="email" required>';
    echo '    <input type="submit" value="Wyślij">';
    echo '</form>';
}

// Walidacja stałego emaila
$email = 'janek.kowalski@gmail.com';
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo '<br/>Adres ' . $email . ' jest prawidłowy.';
} else {
    echo '<br/>Adres ' . $email . ' jest nieprawidłowy.';
}

// Sprawdzanie, czy tekst zawiera tylko małe litery (bez polskich znaków)
$tekst = "abcd";  // Przykładowy tekst do sprawdzenia
$wyrazenie = '/^[a-z]+$/';  // Wyrażenie regularne: tylko małe litery a-z

if (preg_match($wyrazenie, $tekst)) {
    echo "<br/>Tekst '$tekst' zawiera tylko małe litery bez polskich znaków.";
} else {
    echo "<br/>Tekst '$tekst' zawiera dodatkowe znaki.";
}
    */


//rozwiazanie chata gpt
/*
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pobranie danych z formularza
    $waga = $_POST['waga'];
    $wzrost = $_POST['wzrost'];
    $blad = "";

    // Walidacja danych
    if (!is_numeric($waga) || !is_numeric($wzrost) || $waga <= 0 || $wzrost <= 0) {
        $blad = "Podaj poprawne wartości liczbowe większe od zera.";
    } else {
        // Obliczanie BMI
        $bmi = $waga / (($wzrost / 100) ** 2);
        $bmi = round($bmi, 2);

        // Określenie kategorii BMI
        if ($bmi < 18.5) {
            $status = "Niedowaga";
        } elseif ($bmi < 25) {
            $status = "Waga prawidłowa";
        } elseif ($bmi < 30) {
            $status = "Nadwaga";
        } else {
            $status = "Otyłość";
        }
    }

    // Wyświetlenie formularza ponownie
    echo '<h1>Kalkulator BMI</h1>';
    echo '<form method="POST" action="">';
    echo '    <label for="waga">Waga (kg):</label>';
    echo '    <input type="number" step="0.1" name="waga" id="waga" required value="' . htmlspecialchars($waga) . '"><br><br>';
    echo '    <label for="wzrost">Wzrost (cm):</label>';
    echo '    <input type="number" step="0.1" name="wzrost" id="wzrost" required value="' . htmlspecialchars($wzrost) . '"><br><br>';
    echo '    <input type="submit" value="Oblicz BMI">';
    echo '</form>';

    if ($blad) {
        echo '<p style="color: red;">' . htmlspecialchars($blad) . '</p>';
    } else {
        echo '<p><strong>Twoje BMI:</strong> ' . htmlspecialchars($bmi) . '</p>';
        echo '<p><strong>Kategoria:</strong> ' . htmlspecialchars($status) . '</p>';
    }

} else {
    // Formularz wyświetlany przy pierwszym załadowaniu strony
    echo '<h1>Kalkulator BMI</h1>';
    echo '<form method="POST" action="">';
    echo '    <label for="waga">Waga (kg):</label>';
    echo '    <input type="number" step="0.1" name="waga" id="waga" required><br><br>';
    echo '    <label for="wzrost">Wzrost (cm):</label>';
    echo '    <input type="number" step="0.1" name="wzrost" id="wzrost" required><br><br>';
    echo '    <input type="submit" value="Oblicz BMI">';
    echo '</form>';
}
*/



//rozwiazanie szoltyska
/*
<!DOCTYPE html>
<html>
<head><title>Kalkulator BMI</title></head>
<body>
<Form method="post">
    Wzrost (cm): <input type="number" name="height"><br>
    Waga (kg): <input type="number" name="weight"><br>
    <input type="submit" value="Oblicz BMI">
</form>
<?php
if ($SERVER['REQUEST_METHOD'] == 'POST') {
    $height = $_POST['height'] / 100;
    $weight = $_POST['weight'];
    $bmi = $weight / 
    kurwa przewinął slajd
}
    */



//quiz
$wynik = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pyt1 = $_POST['pyt1'] ?? '';
    $pyt2 = $_POST['pyt2'] ?? '';
    $pyt3 = trim($_POST['pyt3'] ?? '');

    $wynik = 0;
    if ($pyt1 == "HyperText Markup Language") $wynik++;
    if ($pyt2 == "PHP") $wynik++;
    if (strcasecmp($pyt3, "Cascading Style Sheets") == 0) $wynik++;
}

// Wyświetlanie całego formularza i wyniku w jednym bloku echo
echo '<h1>Quiz o technologiach webowych</h1>';
echo '<form method="POST" action="">';

// Pytanie 1
echo '<p>1. Co oznacza skrót HTML?</p>';
echo '<select name="pyt1" required>';
echo '<option value="">-- wybierz odpowiedź --</option>';
echo '<option value="HyperText Markup Language">HyperText Markup Language</option>';
echo '<option value="Home Tool Markup Language">Home Tool Markup Language</option>';
echo '<option value="Hyperlink and Text Markup Language">Hyperlink and Text Markup Language</option>';
echo '</select>';

// Pytanie 2
echo '<p>2. Który język jest językiem backendowym?</p>';
echo '<label><input type="radio" name="pyt2" value="PHP"> PHP</label><br>';
echo '<label><input type="radio" name="pyt2" value="CSS"> CSS</label>';

// Pytanie 3
echo '<p>3. Co oznacza skrót CSS?</p>';
echo '<input type="text" name="pyt3" required>';

echo '<br><br><input type="submit" value="Sprawdź wynik">';
echo '</form>';

// Wyświetlenie wyniku poniżej formularza
if ($wynik !== null) {
    echo '<hr>';
    echo "<h2>Twój wynik: $wynik / 3</h2>";

    if ($wynik == 3) {
        echo "<p style='color: green;'>Świetnie! Wszystkie odpowiedzi poprawne!</p>";
    } elseif ($wynik == 2) {
        echo "<p style='color: orange;'>Bardzo dobrze! 2 poprawne odpowiedzi.</p>";
    } elseif ($wynik == 1) {
        echo "<p style='color: brown;'>Masz 1 poprawną odpowiedź — spróbuj jeszcze raz.</p>";
    } else {
        echo "<p style='color: red;'>Brak poprawnych odpowiedzi. Spróbuj ponownie!</p>";
    }
}
?>