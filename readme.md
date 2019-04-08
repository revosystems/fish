### Installation

```
composer install
php artisan key:generate
# Setup your .env file to match you desired database**
php artisan migrate --seed
```
You can login with:
jordi.p@revo.works / secret

Available pages:
fish.test/thrust/organizations
fish.test/thrust/leads


INFO
 - podràs accedir amb el teu usuari: jordi.p@revo.works i la contrasenya: 123456
 - S’han afegit camps a la taula Lead i a la taula Usuari
 - totes les taules de la base de dades utilitzades en la creació del lead tenen el prefix lead_
 - s’han crear migracions per a totes les taules
 - les migracions tenen registrades la foreign key
 - s’han creat seeds per a totes les taules excepte Proposals i Leads
 - a la carpeta pública hi han els mòduls javascript utilitats ja que laravel.mix donava errors al seu dia. S’ha de revisar
 
 
 ERRORS
 > Error al fer logout, mètode no permès
 > npm run prod ignora certs estils del .css (test a Recursos)
 > CSS revisar menú de navegació .open en mobile. No genera scroll
 
 
 FUTUR
 - revisió maquetació, detecció vertical i landscape en  responsive
 - optimització t’imatges + sprites + retina correcte
 - adaptar la base de dades i models a la convenció eloquent
 - preparar base de dades amb suport multidioma
 - optimitzar css i estructurar
 - segmentar arxius de traduccions
 - refer mètode download a LeadController (eloquent)
 - disseny de correus
 - nova maquetació secció recursos
 - eliminar foreign keys de les migracions i forçar a belons/has + correcte eloquent
 - aplicar polítiques d’usuari