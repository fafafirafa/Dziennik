# Dziennik

# Informacja

Prywatny dziennik banów i timeoutów danych np u danego streamera.
Pomaga to bardzo jeśli ktoś streamuje na YouTube bądź innej platformie na której nie ma logów.
Zostało to zaprojektowane przeze mnie tylko po to, że jeśli ktoś miałby jakieś pytania to aby zobaczyć za co mógł otrzymać wykluczenie.

Nie jest to jakoś ładnie zoptymalizowana strona, natomiast jeden z pierwszych tego typu projektów jak i zastosowanych w nim rzeczy.

# Objaśnienie (?)

Wszystko powinno być jasne, natomiast jeśli chodzi o plik "insert.php" w folderze includes, to służy mi on jedynie do wrzucania spontanicznej informacji do bazy, aby potem była wyświetlana ostatnia wiadomość z większymi zmianami na stronie przy pierwszym wejściu (lub aż wygaśnie ciasteczko).

# INSTALACJA

Aby strona działała to wystarczy jedynie stworzyć w folderze "includes" plik o nazwie "connection.php" gdzie wprowadzimy połączenie z bazą danych (zmienna powinna mieć nazwę "$mysqli".
Oraz utworzenie struktury w bazie danych, plik .sql znajduje się w głównym folderze ;)
Aby widzieć kilka dodatkowych ikon należy wrzucić w nagłówek link ze skryptem do Font Awesome.
