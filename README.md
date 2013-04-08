database-proj
=============

För att kunna använda programmet i första hand måste denna fil inkluderas:

Detta project kräver URL-Rewrite. För att aktivera rewrite modulen så krävs att man lägger till
"LoadModule rewrite_module <absolute path>/mod_rewrite.so" till httpd.conf. (<absolute path> ersätts med den absoluta sökvägen ex. /h/d5/g/dic11xxx/serverroot/mod_rewrite.so)
Det krävs även att man tillåter "AllowOverride" på 3 ställen i httpd.conf genom att sätta "AllowOverride All"; På rad 119, 155, 272.
mod_rewrite.so går att kompilera fram själv, men vi har valt att lägga in en färdig-kompilerad mod_rewrite.so i /conf/ för detta projekt. 
URL-Rewrite används för att kunna ta en url och skicka in den som parameter till en sorts startup fil istället för att hämta php filen som ligger på den platsen.  

Nu kan du starta programmet och utföra följande handlingar:

* Skapa en ny pall.
* Söka efter en pall.
* Blockera en pall.
* Lista alla pallar som är skapade.

*Skapa en ny pall*
=============

Klicka på "Production department"
Klicka på "Create Pallet" som finns på övre delen av fönstret
Välj typ av kaka
Välj vilket företag som ska ha pallen 
Klicka på "Submit"

Klart!

*Söka efter en pall*
=============

Klicka på "Production department"
Du kommer in på alla pallar som finns registrerade
Där kan du klicka på de tomma fälten på den övre delen av fönstret
Välj ett datum, finns förval eller sök efter ditt eget intervall
Skriv sedan in i "Search" vad du vill söka på, du kan söka på:
* Kaktyp
* Plats
* Kund
* OrderId
* Bakdag
* PallId

Du bestämmer själv vad du vill söka på. 

*Blockera en pall*
=============

Klicka på "Production department"
Välj specifik pall
Klicks på Ballens Redigeraknapp, längst ut på pallens rad
Klicka på "Approved"
Knappen blir röd
Återgå till tabellen genom att klicka på "Back to pallet tracking"

*Lista alla pallar som är skapade*
=============

Klicka på "Production department"
Låt fälten för sökning vara tomma
DU får alla pallar listade

