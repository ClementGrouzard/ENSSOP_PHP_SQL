/*
Passord non hashé:
Charles Attens=manager1
John Attens=manger2
Cloris Derry=employe1
Daron Gosnold=emplye2
*/
/*
Password hashés des personnes ci-dessus:
$2y$10$TAKX1SZl.o3bi3jzCcYB5.wtW7iLMoZNE3fLGnwXWUkxu.xjjKSE6
$2y$10$6A6fIk3bqpMIGlRF5JdSFeZyhiqr76nFVoGfJtKBvvJIDj89xtGzS
$2y$10$w9B4BzpfpHi5Sc9e7rukHOC9OaukSMiBp3Y4xb7dTXqdNCpZG/pFO
$2y$10$dIHZw52.beRNkfwtErys4OR.Rv9QIUqAmburwp2nBRruztR4bZCR.
*/

<?php
echo  "<br>";
echo password_hash('manager1', PASSWORD_DEFAULT);
echo  "<br>";
echo password_hash('manager2', PASSWORD_DEFAULT);
echo  "<br>";
echo password_hash('employe1', PASSWORD_DEFAULT);
echo  "<br>";
echo password_hash('employe2', PASSWORD_DEFAULT);
echo  "<br>";
?>
